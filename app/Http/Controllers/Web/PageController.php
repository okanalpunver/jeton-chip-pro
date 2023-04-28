<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\PaymentRequest;
use App\Models\News;
use App\Models\Payment;

class PageController extends BaseController
{
    public function home()
    {
        return view('web.themes.' . $this->site->theme . '.home', [
            'transparent' =>  true
        ]);
    }

    public function outOfStock()
    {
        return view('web.themes.' . $this->site->theme . '.out_of_stock');
    }

    public function getAllNews()
    {
        $news = $this->site->news;
        return view('web.themes.' . $this->site->theme . '.news', compact('news'));
    }

    public function getNews(News $news)
    {
        return view('web.themes.' . $this->site->theme . '.news-show', compact('news'));
    }


    public function bankAccount()
    {
        return view('web.themes.' . $this->site->theme . '.bank-account');
    }

    public function about()
    {
        return view('web.themes.' . $this->site->theme . '.about');
    }

    public function contact()
    {
        return view('web.themes.' . $this->site->theme . '.contact');
    }

    public function products()
    {
        return $this->site->products()->orderBy('price')->get();
    }

    public function payment()
    {
        if (!session()->has('order')) {
            return redirect()->route('web.home');
        }

        $order = session()->get('order');

        return view('web.themes.' . $this->site->theme . '.payment', compact('order'));
    }

    public function paymentStore(PaymentRequest $request)
    {
        $order = session()->pull('order');

        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $order->amount,
            'name' => $request->name,
            'tc_no' => $request->tc_no,
            'phone' => $request->phone,
        ]);

        session()->put('payment', $payment);

        return redirect()->route('web.thanks');
    }

    public function thanks()
    {
        return view('web.themes.' . $this->site->theme . '.thanks');
    }
}
