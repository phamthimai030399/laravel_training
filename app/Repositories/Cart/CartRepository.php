<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Repositories\BaseRepository;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    public function __construct(Cart $cart)
    {
        $this->model = $cart;
    }

    public function getCart($userId)
    {
        $query = $this->model->query()->with('product');
        $query->where('user_id',  $userId);
        return $query->get();
    }
}
