<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    protected $productRepository;
    public function __construct(
        ProductRepositoryInterface $productRepository,
    ) {
        $this->productRepository = $productRepository;
    }

    public function getProduct($params)
    {
        return $this->productRepository->getList($params);
    }
    public function create($request)
    {
        $rules = [
            'product_code' => 'required|unique:products',
            'product_name' => 'required',
            'price' => 'required|alpha_num',
        ];
        $messages = [
            'product_code.*' => 'Mã sản phẩm không hợp lệ',
            'product_name.*' => 'Vui lòng nhập tên sản phẩm',
            'price.*' => 'Gía sản phẩm không hợp lệ',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $result = [
                'type' => 'error',
                'status' => false,
                'content' => 'Thêm sản phẩm không thành công.',
                'validate_error' => $validator->errors()->first(),
            ];
        } else {
            $data = $request->only('product_code', 'product_name', 'price', 'is_delete');
            $data['category_id'] = 1; 
            $product =  $this->productRepository->create($data); 
            if ($product) {
                $result = [
                    'type' => 'success',
                    'status' => true,
                    'content' => 'Thêm sản phẩm thành công.'
                ];
            } else {
                $result = [
                    'type' => 'error',
                    'status' => false,
                    'content' => 'Thêm sản phẩm không thành công.'
                ];
            }
        }
        return $result;
    }

    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'product_code' => 'required|unique:products,product_code,'. $id,
            'product_name' => 'required',
            'price' => 'required|alpha_num',
        ];
        $messages = [
            'product_code.*' => 'Mã sản phẩm không hợp lệ',
            'product_name.*' => 'Vui lòng nhập tên sản phẩm',
            'price.*' => 'Gía sản phẩm không hợp lệ',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $result = [
                'type' => 'error',
                'status' => false,
                'content' => 'Update sản phẩm không thành công.',
                'validate_error' => $validator->errors()->first(),
            ];
        } else {
            $data = $request->only('category_code', 'category_name', 'is_delete');
            $data = $this->productRepository->update($id, $data);
            if ($data) {
                $result = [
                    'type' => 'success',
                    'status' => true,
                    'content' => 'Update sản phẩm thành công.'
                ];
            } else {
                $result = [
                    'type' => 'error',
                    'status' => false,
                    'content' => 'Update sản phẩm không thành công.'
                ];
            }
        }
        return $result;
    }

    public function delete($id){
        $data = $this->productRepository->delete($id);
        if ($data) {
            $result = [
                'type' => 'success',
                'status' => true,
                'content' => 'Xóa sản phẩm không thành công.'
            ];
        } else {
            $result = [
                'type' => 'error',
                'status' => false,
                'content' => 'Xóa sản phẩm thành công.'
            ];
        }
        return $result;
    }
}
