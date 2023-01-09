<?php

namespace App\Services;

use App\Jobs\SendEmail;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CartService
{
    protected $cartRepository;
    protected $productRepository;
    protected $orderRepository;
    public function __construct(
        CartRepositoryInterface $cartRepository,
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository,
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function getCart()
    {
        return $this->cartRepository->getCart();
    }
    public function addCart($productId)
    {
        try {
            $product = $this->productRepository->getById($productId);
            //doạn này không check product tồn tại không để giả gà nhé
            $carts = $this->cartRepository->getCart() ?? [];
            $check = false;
            foreach($carts as $cartItem) {
                if ($cartItem['product_id'] == $productId) {
                    $check = true;
                    $cartItem['quantity']++;
                }
            }
            if (!$check) {
                $carts[] = [
                    'product_id' => $product->id,
                    'product_code' => $product->product_code,
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'quantity' => 1,
                ];
            }
            
            $this->cartRepository->putCart($carts);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function updateCart($data)
    {
        try {
            $this->cartRepository->putCart($data);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function payment($data) {
        $carts = $this->cartRepository->getCart();
        $dataOrder = [
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ];
        DB::beginTransaction();
        try {
            $orderId = $this->orderRepository->create($dataOrder);
            $this->orderRepository->createItem($carts, $orderId);
            $this->cartRepository->emptyCart();
            SendEmail::dispatch($orderId)->onQueue(SendEmail::QUEUE_ORDER_NOTIFY);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
