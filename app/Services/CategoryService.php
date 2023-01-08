<?php

namespace App\Services;

use App\Http\Requests\StoreCategoryRequest;
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
    public function getCategories($params = [])
    {
        return $this->categoryRepository->getList($params);
    }
    public function getHomeCategories()
    {
        return $this->categoryRepository->getListInHome();
    }
    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }
    public function create($data)
    {
        return $this->categoryRepository->create($data);
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function update($data, $id)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }
}
