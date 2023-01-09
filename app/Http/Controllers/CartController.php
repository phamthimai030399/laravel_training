<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    
    public function cart()
    {
        $data['carts'] = $this->cartService->getCart() ?? [];
        return view('web.cart', $data);
    }

    public function addCart(Request $request)
    {
        $productId = $request['product_id'];
        $result = $this->cartService->addCart($productId);
        if ($result) {
            $res = [
                'message' => 'Thêm giỏ hàng thành công.',
                'success' => true
            ];
        } else {
            $res = [
                'message' => 'Thêm giỏ hàng không thành công.',
                'success' => false
            ];
        }
        return response()->json($res, 200);
    }

    public function updateCart(Request $request)
    {
        $data = $request['cart'];
        $result = $this->cartService->updateCart($data);
        if ($result) {
            $message = 'Update giỏ hàng thành công';
        } else {
            $message = 'Update giỏ hàng không thành công';
        }
        return redirect(route('client.cart'))->with('message', $message);
    }
}
