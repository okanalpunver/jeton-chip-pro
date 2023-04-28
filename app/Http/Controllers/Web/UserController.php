<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/odeme';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->site = app('site');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('web.themes.' . $this->site->theme . '.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $site = app('site');

        $user = User::where('email', $request->email)->where('site_id', $site->id)->first();

        $data = array_merge($request->all(), ['site_id' => $site->id]);

        if (!$user) {
            $this->validator($request->all())->validate();
            event(new Registered($user = $this->create($data)));
        }

        $this->guard()->login($user);

        $cart = session()->get('cart');

        foreach ($cart as $category_id => $item) {
            # code...
            $order = $user->orders()->create([
                'category_id' => $category_id,
                'site_id' => app('site')->id,
                'qty' => $item['qty'],
                'amount' => $item['amount'],
                'facebook_email' => $request->email,
                'facebook_password' => $request->password,
                'phone' => $request->phone,
                'order_type' => $request->order_type,
            ]);
        }

        session()->put('order', $order);

        return redirect()->route('web.payment.create');
        return redirect($this->redirectPath());
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
            'site_id' => $data['site_id'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
