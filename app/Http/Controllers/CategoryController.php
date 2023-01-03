<?php

namespace App\Http\Controllers;

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
        $data['condition'] = $request->only('keyword');
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
    public function store(Request $request)
    {
        $result = $this->categoryService->create($request);
        if ($result['status']) {
            return redirect(route('category.index'))->with('message', $result);
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
    public function update(Request $request, $id)
    {
        $result = $this->categoryService->update($request, $id);
        if ($result['status']) {
            return redirect(route('category.index'))->with('message', $result);
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
       $result = $this->categoryService->delete($id);
        return back()->with('message', $result);
    }
}
