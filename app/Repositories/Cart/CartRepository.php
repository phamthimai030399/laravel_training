<?php

namespace App\Repositories\Cart;

use Illuminate\Support\Facades\Session;

class CartRepository implements CartRepositoryInterface
{

    public function getCart()
    {
        return Session::get('cart');
    }
    public function putCart($data)
    {
        return Session::put('cart', $data);
    }
    public function emptyCart()
    {
        Session::destroy('cart');
    }
}
