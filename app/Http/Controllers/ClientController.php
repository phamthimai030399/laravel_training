<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\ProductService;

class ClientController extends Controller
{
    protected $categoryService;
    protected $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index()
    {
        $data['categories'] = $this->categoryService->getHomeCategories();
        return view('web.home', $data);
    }

    public function category($id)
    {
        $data['category'] = $this->categoryService->getListInCategory($id);
        return view('web.category', $data);
    }

    public function product($id)
    {
        $data['product'] = $this->productService->getProductById($id);
        return view('web.product', $data);
    }

   
}
