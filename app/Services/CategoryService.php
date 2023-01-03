<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class CategoryService
{
    protected $categoryRepository;
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
    }
    public function getCategories($params)
    {
        return $this->categoryRepository->getList($params);
    }
    public function create($request)
    {
        $rules = [
            'category_code' => 'required|unique:category',
            'category_name' => 'required',
        ];
        $messages = [
            'category_code.*' => 'Mã danh mục không hợp lệ',
            'category_name.*' => 'Vui lòng nhập tên danh mục',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $result = [
                'type' => 'error',
                'status' => false,
                'content' => 'Thêm danh mục không thành công.',
                'validate_error' => $validator->errors()->first(),
            ];
        } else {
            $data = $request->only('category_code', 'category_name', 'is_active');
            $category =  $this->categoryRepository->create($data);
            if ($category) {
                $result = [
                    'type' => 'success',
                    'status' => true,
                    'content' => 'Thêm danh mục thành công.'
                ];
            } else {
                $result = [
                    'type' => 'error',
                    'status' => false,
                    'content' => 'Thêm danh mục không thành công.'
                ];
            }
        }
        return $result;
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'category_code' => 'required|unique:category,category_code,'. $id,
            'category_name' => 'required',
        ];
        $messages = [
            'category_code.unique' => 'Mã danh mục đã tồn tại',
            'category_code.required' => 'Mã danh mục là bắt buộc',
            'category_name.*' => 'Vui lòng nhập tên danh mục',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $result = [
                'type' => 'error',
                'status' => false,
                'content' => 'Update danh mục không thành công.',
                'validate_error' => $validator->errors()->first(),
            ];
        } else {
            $data = $request->only('category_code', 'category_name', 'is_active');
            $data = $this->categoryRepository->update($id, $data);
            if ($data) {
                $result = [
                    'type' => 'success',
                    'status' => true,
                    'content' => 'Update danh mục thành công.'
                ];
            } else {
                $result = [
                    'type' => 'error',
                    'status' => false,
                    'content' => 'Update danh mục không thành công.'
                ];
            }
        }
        return $result;
    }

    public function delete($id){
        $data = $this->categoryRepository->delete($id);
        if ($data) {
            $result = [
                'type' => 'success',
                'status' => true,
                'content' => 'Xóa danh mục không thành công.'
            ];
        } else {
            $result = [
                'type' => 'error',
                'status' => false,
                'content' => 'Xóa danh mục thành công.'
            ];
        }
        return $result;
    }
}
