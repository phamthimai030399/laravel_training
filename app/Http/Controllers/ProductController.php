<?php

namespace App\Http\Controllers;

use App\Helpers\Message;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ProductService;

class ProductController extends Controller

{
    protected $productService;
    protected $categoryService;
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['condition'] = $request->only('keyword', 'status');
        $data['listItem'] = $this->productService->getProduct($data['condition']);
        return view('cms.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['categories'] = $this->categoryService->getAllCategories();
        return view('cms.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     * @return Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->only('category_id','product_code', 'product_name', 'price', 'image', 'is_delete');
        $result = $this->productService->create($data);
        if ($result) {
            return redirect(route('admin.product.index'))->with('message', Message::success('Thêm sản phẩm thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Thêm sản phẩm không thành công'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product['item'] = $this->productService->getProductById($id);
        $product['categories'] = $this->categoryService->getAllCategories();
        return view('cms.product.update', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->only('category_id','product_code', 'product_name', 'price', 'image', 'is_delete');
        $result = $this->productService->update($data, $id);
        if ($result) {
            return redirect(route('admin.product.index'))->with('message', Message::success('Update sản phẩm thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Update sản phẩm không thành công'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $result = $this->productService->delete($id);
        $message = $result ? Message::success('Xóa sản phẩm thành công') : Message::error('Xóa sản phẩm không thành công');
        return back()->with('message', $message);
    }
}
