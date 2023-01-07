<?php

namespace App\Http\Controllers;

use App\Helpers\Message;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CategoryService;

class CategoryController extends Controller

{
    protected $categoryService;
    
    public function __construct(CategoryService $categoryService)
    {
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
        $data['listItem'] = $this->categoryService->getCategories($data['condition']);
        return view('cms.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cms.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     * @return Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->only('category_code', 'category_name', 'is_active');
        $result = $this->categoryService->create($data);
        if ($result) {
            return redirect(route('admin.category.index'))->with('message', Message::success('Thêm danh mục thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Thêm danh mục thất bại'));
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
        $category['item'] = $this->categoryService->getCategoryById($id);
        return view('cms.category.update', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->only('category_code', 'category_name', 'is_active');
        $result = $this->categoryService->update($data, $id);
        if ($result) {
            return redirect(route('admin.category.index'))->with('message', Message::success('Xóa danh mục thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Update danh mục không thành công'));
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
        $result = $this->categoryService->delete($id);
        $message = $result ? Message::success('Xóa danh mục thành công') : Message::error('Xóa danh mục không thành công');
        return back()->with('message', $message);
    }
}
