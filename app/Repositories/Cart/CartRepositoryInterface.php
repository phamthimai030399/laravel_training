<?php

namespace App\Repositories\Cart;

use App\Repositories\BaseRepositoryInterface;

interface CartRepositoryInterface extends BaseRepositoryInterface
{
    public function getCart($userId);
}
