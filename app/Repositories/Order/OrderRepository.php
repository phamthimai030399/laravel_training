<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function createItem($data, $orderId)
    {
        $orderItemModel = new OrderItem();
        foreach ($data as $item) {
            $orderItem = [
                'order_id' => $orderId,
                'product_id' => $item['product_id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ];
            $orderItemModel->insert($orderItem);
        }
    }
}
