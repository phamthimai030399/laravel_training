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
    public function create($data)
    {
        return $this->productRepository->create($data);
    }

    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function update($data, $id)
    {
        return $this->productRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}
