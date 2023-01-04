<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ProductService;

class ProductController extends Controller

{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
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
        return view('cms.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $result = $this->productService->create($request);
        if ($result['status']) {
            return redirect(route('product.index'))->with('message', $result);
        } else {
            return back()->withInput()->withErrors($result['validate_error'])->with('message', $result);
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
        return view('cms.product.update', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->productService->update($request, $id);
        if ($result['status']) {
            return redirect(route('product.index'))->with('message', $result);
        } else {
            return back()->withInput()->withErrors($result['validate_error'])->with('message', $result);
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
        return back()->with('message', $result);
    }
}
