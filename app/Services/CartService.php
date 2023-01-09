<?php

namespace App\Services;

use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CartService
{
    protected $cartRepository;
    public function __construct(
        CartRepositoryInterface $cartRepository,
    ) {
        $this->cartRepository = $cartRepository;
    }

    public function getCart($userId)
    {
        return $this->cartRepository->getCart($userId);
    }
    public function addCart($productId, $userId)
    {
        $cartItem = $this->cartRepository->getOneByParams([
            'user_id' => $userId,
            'product_id' => $productId,
        ]);
        if ($cartItem) {
            $result = $this->cartRepository->update($cartItem->id, [
                'quantity' => $cartItem->quantity + 1
            ]);
        } else {
            $result = $this->cartRepository->create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }
        return $result;
    }

    public function updateCart($data, $userId)
    {
        DB::beginTransaction();
        try {
            $carts = $this->cartRepository->getCart($userId);
            foreach ($carts as $oldItem) {
                $cartItem = array_filter($data, function ($item) use ($oldItem) {
                    return $item['product_id'] == $oldItem->product_id;
                });
                if (!empty($cartItem[0])) {
                    $this->cartRepository->update($oldItem->id, [
                        'quantity' => $cartItem[0]['quantity']
                    ]);
                } else {
                    $this->cartRepository->delete($oldItem->id);
                }
            }
            foreach ($data as $newItem) {
                $cartItem = array_filter($carts->toArray(), function ($item) use ($newItem) {
                    return $newItem['product_id'] == $item['product_id'];
                });
                if (empty($cartItem[0])) {
                    $this->cartRepository->create([
                        'user_id' => $userId,
                        'product_id' => $newItem['product_id'],
                        'quantity' => $newItem['quantity'],
                    ]);
                }
            }
            $result = true;
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $result = false;
        }
        return $result;
    }
}
