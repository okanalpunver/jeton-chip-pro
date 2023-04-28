<?php

namespace App\Services\Payment;

use App\Models\Order;
use Illuminate\Support\Facades\App;

class PayTr extends Payment
{
    protected $debug = 1;
    public $test_mode;

    public $payment;

    public $merchant_id;
    public $merchant_key;
    public $merchant_salt;

    public $currency;
    public $no_installment = 0;
    public $max_installment = 0;

    public $timeout_limit = 30;
    public $success_url;
    public $fail_url;


    public function __construct(Order $order)
    {
        $this->order = $order;

        $this->merchant_id = app('site')->paytr_merchant_id;
        $this->merchant_key = app('site')->paytr_merchant_key;
        $this->merchant_salt = app('site')->paytr_merchant_salt;

        $this->test_mode = app('site')->paytr_test_mode ?? 1;

        $this->success_url = 'https://' . app('site')->fqdn . '/success';
        $this->fail_url = 'https://' . app('site')->fqdn . '/fail';

        $this->userBasket = $this->getUserBasket();

        $this->currency = (app('site')->currency == 'TRY') ? 'TL' : 'USD';
        $this->lang = app('site')->lang;
    }

    public function getUserBasket()
    {
        foreach ($this->order->categories as $category) {
            $basket[] = [
                $category->name,
                $this->order->amount / $category->pivot->qty,
                $category->pivot->qty,
            ];
        }

        return base64_encode(json_encode($basket));
    }

    public function getIpAddress()
    {
        if ((App::environment('local'))) {
            return '159.146.18.150';
        }

        return request()->ip();
    }

    public function makeToken()
    {
        $hash = $this->merchant_id .
            $this->getIpAddress() .
            $this->order->id .
            $this->order->user->email .
            $this->order->amount * 1.04 * 100 .
            $this->userBasket .
            $this->no_installment .
            $this->max_installment .
            $this->currency .
            $this->test_mode;

        return base64_encode(hash_hmac('sha256', $hash . $this->merchant_salt, $this->merchant_key, true));
    }

    public function makeEftToken()
    {
        $hash = $this->merchant_id .
            $this->getIpAddress() .
            $this->order->id .
            $this->order->user->email .
            $this->order->amount * 100 .
            'eft'.
            $this->test_mode;

        return base64_encode(hash_hmac('sha256', $hash . $this->merchant_salt, $this->merchant_key, true));
    }

    public function getToken()
    {
        $data = [
            'merchant_id' => $this->merchant_id,
            'user_ip' => $this->getIpAddress(),
            'merchant_oid' => $this->order->id,
            'email' => $this->order->user->email,
            'payment_amount' => $this->order->amount * 1.04 * 100,
            'paytr_token' => $this->makeToken(),
            'user_basket' => $this->userBasket,
            'debug_on' => $this->debug,
            'no_installment' => $this->no_installment,
            'max_installment' => $this->max_installment,
            'user_name' => $this->order->user->name,
            'user_address' => $this->order->user->name,
            'user_phone' => $this->order->user->phone,
            'merchant_ok_url' => $this->success_url,
            'merchant_fail_url' => $this->fail_url,
            'timeout_limit' => $this->timeout_limit,
            'currency' => $this->currency,
            'test_mode' => $this->test_mode,
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = @curl_exec($ch);

        if (curl_errno($ch))
            die("PAYTR IFRAME connection error. err:" . curl_error($ch));

        curl_close($ch);

        $result = json_decode($result, 1);

        if ($result['status'] == 'success') {
            $token = $result['token'];
        } else {
            die("PAYTR IFRAME failed. reason:" . $result['reason']);
        }

        return $token;
    }

    public function getEftToken()
    {
        $data = [
            'merchant_id' => $this->merchant_id,
            'user_ip' => $this->getIpAddress(),
            'merchant_oid' => $this->order->id,
            'email' => $this->order->user->email,
            'payment_amount' => $this->order->amount * 100,
            'payment_type' => 'eft',
            'paytr_token' => $this->makeEftToken(),

            /* 'user_name' => $this->order->user->name,
            'user_phone' => $this->order->user->phone,
            'tc_no_last5' => 73266,
            'bank' => 'isbank', */

            'debug_on' => $this->debug,
            'timeout_limit' => $this->timeout_limit,
            'test_mode' => $this->test_mode,
        ];


        // return $data;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = @curl_exec($ch);

        if (curl_errno($ch))
            die("PAYTR EFT IFRAME connection error. err:" . curl_error($ch));

        curl_close($ch);

        $result = json_decode($result, 1);

        if ($result['status'] == 'success') {
            $token = $result['token'];
        } else {
            die("PAYTR EFT IFRAME failed. reason:" . $result['reason']);
        }

        return $token;
    }
}
