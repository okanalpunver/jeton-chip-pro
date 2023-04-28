<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\Payment\PayTr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Events\PaymentReceived;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class PaymentController extends BaseController
{
    public function addToCart($id, Float $amount)
    {
        $category = $this->site->categories()->find($id);

        if (!$category) {
            abort(404);
        }

        /* $product = $category->products->filter(function ($product) use ($amount) {
            return $product->price <= $amount;
        })->last(); */

        $product = $category->products()->where('price', '<=', $amount)->orderBy('price', 'desc')->first();

        if (!$product) {
            # code...
            Log::error('site_id: ' . $this->site->id . ' amount:' . $amount . 'product not found');
            return redirect('/');
        }

        $price = $product->price / $product->qty;

        $qty = round($amount / $price);

        $cart = session()->get('cart', []);

        $cart[$id] = [
            "name" => $category->name,
            "qty" => $qty,
            "price" => $price,
        ];

        session()->put('cart', $cart);

        return redirect()->route('web.cart.show');
    }

    public function removeFromCart(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }
        }

        return redirect() - back();
    }


    public function cart()
    {
        return view('web.themes.' . $this->site->theme . '.cart');
    }

    public function orderCreate()
    {
        return view('web.themes.' . $this->site->theme . '.order');
    }

    public function getIpAddress()
    {
        if ((App::environment('local'))) {
            return '31.223.6.152';
        }

        return request()->ip();
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'site_id' => $data['site_id'],
            'password' => Hash::make('password'),
        ]);
    }

    public function orderStore(Request $request)
    {
        if (!$request->session()->has('cart')) {
            # code...
            return redirect('/');
        }

        Validator::make($request->all(), [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:16'],
            'payment_type' => ['required'],
        ])->validate();

        $site = app('site');

        if (!Auth::check()) {
            // The user is logged in...
            $user = User::where('email', $request->email)->where('site_id', $site->id)->first();

            if (!$user) {

                $data = [
                    'name' => strstr($request->email, '@', true),
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'site_id' => $site->id
                ];

                event(new Registered($user = $this->create($data)));
            } else {
                $user->update([
                    // 'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email
                ]);
            }

            $this->guard()->login($user);
        } else {
            $user = Auth::user();
        }

        $cart = collect(session()->get('cart'));

        $amount = $cart->sum(function ($item) {
            return $item['qty'] * $item['price'];
        });

        $order = $user->orders()->create([
            'site_id' => app('site')->id,
            'ip_address' => $this->getIpAddress(),
            'amount' => round($amount, 2),
        ]);

        foreach ($cart as $category_id => $item) {
            $order->categories()->attach($category_id, [
                'qty' => $item['qty'],
                'price' => $item['price'],
                'extra' => [
                    'facebook_email' => $request->email,
                    'facebook_password' => $request->password,
                ]
            ]);
        }

        session()->put('order', $order);
        session()->put('payment_type', $request->payment_type);

        return redirect()->route('web.payment.create');
    }

    public function checkout()
    {
        if (!session()->has('order')) {
            return redirect('/');
        }

        $order = session()->get('order');

        $order = Order::findOrFail($order['id']);

        $paymentType = session()->get('payment_type', 'card');

        session()->forget('cart');
        session()->forget('order');
        session()->forget('payment_type');

        $payment = new PayTr($order);

        if ($paymentType == 'eft') {
            # code...
            $token = $payment->getEftToken();
        } else {
            $token = $payment->getToken();
        }

        return view('web.themes.' . $this->site->theme . '.checkout', compact('token', 'paymentType'));
    }

    public function success(Request $request)
    {
        return view('web.themes.' . $this->site->theme . '.success');
    }

    public function fail(Request $request)
    {
        return view('web.themes.' . $this->site->theme . '.fail');
    }

    public function webhook(Request $request)
    {
        $merchant_key     = app('site')->paytr_merchant_key;
        $merchant_salt    = app('site')->paytr_merchant_salt;

        $str = $request->merchant_oid .
            $merchant_salt .
            $request->status .
            $request->total_amount;

        $hash = base64_encode(hash_hmac('sha256', $str, $merchant_key, true));

        

        if ($hash != $request->hash) {
            Log::notice(json_encode([
                'message' => 'PAYTR notification failed: bad hash',
                'request' => $request->all()
            ]));
            die('PAYTR notification failed: bad hash');
        } else {
            Log::info(json_encode([
                'message' => 'success',
                'request' => $request->all()
            ]));
        }

        $order = Order::find($request->merchant_oid);

        info('------');
        info($request->status);
        info($order);

        if ($request->status == 'success') {
            ## BURADA YAPILMASI GEREKENLER
            ## 1) Siparişi onaylayın.
            $order->status = 1;
            $order->save();

            info($order->status);
            info('end---');

            $order->payment()->create([
                'site_id' => $order->site_id,

                'name' => $order->user->name,
                'email' => $order->user->email,
                'phone' => $order->user->phone,

                'ip_address' => $order->ip_address,

                'hash' => $request->hash,
                'total_amount' => $request->total_amount / 100,
                'payment_amount' => $request->payment_amount / 100,

                'payment_type' => $request->payment_type,
                'currency' => $request->currency,
                'test_mode' => $request->test_mode == 0,

                'response' => $request->all(),
            ]);

            // event(new PaymentReceived($order));

            try {
                //code...
                broadcast(new PaymentReceived($order))->toOthers();
            } catch (\Exception $e) {
                //throw $th;
                info($e->getMessage());
            }


            ## 2) Eğer müşterinize mesaj / SMS / e-posta gibi bilgilendirme yapacaksanız bu aşamada yapmalısınız.
            ## 3) 1. ADIM'da gönderilen payment_amount sipariş tutarı taksitli alışveriş yapılması durumunda
            ## değişebilir. Güncel tutarı $post['total_amount'] değerinden alarak muhasebe işlemlerinizde kullanabilirsiniz.

        } else { ## Ödemeye Onay Verilmedi

            ## BURADA YAPILMASI GEREKENLER
            ## 1) Siparişi iptal edin.
            $order->status = 2;
            ## 2) Eğer ödemenin onaylanmama sebebini kayıt edecekseniz aşağıdaki değerleri kullanabilirsiniz.
            ## $post['failed_reason_code'] - başarısız hata kodu
            ## $post['failed_reason_msg'] - başarısız hata mesajı

        }

        $order->save();


        ## Bildirimin alındığını PayTR sistemine bildir.
        return "OK";
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
