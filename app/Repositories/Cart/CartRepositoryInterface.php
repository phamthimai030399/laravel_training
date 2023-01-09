<?php

namespace App\Repositories\Cart;

interface CartRepositoryInterface
{
    public function getCart();
    public function putCart($data);
}
