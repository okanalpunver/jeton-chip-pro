<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class ProductController extends BaseController
{
    public function addToCart($id, Float $amount)
    {
        $category = $this->site->categories()->find($id);

        if (!$category) {
            abort(404);
        }

        $product = $category->products->filter(function ($product) use ($amount) {
            return $product->price <= $amount;
        })->last();

        $price = $product->price / $product->qty;

        $qty = round($amount / $price);

        $cart = session()->get('cart');

        $cart = [
            $id => [
                "name" => $category->name,
                "qty" => $qty,
                "amount" => $amount,
                'photo' => $category->photo,
            ]
        ];

        session()->put('cart', $cart);

        return redirect()->route('web.siparis');
    }
}
