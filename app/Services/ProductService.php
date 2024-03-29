<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;

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
        $data['image'] = $this->storeImage($data['image']);
        $data['image_detail'] = $this->storeImage($data['image_detail']);
        return $this->productRepository->create($data);
    }

    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function update($data, $id)
    {
        if (empty($data['image'])) {
            unset($data['image']);
        } else {
            $data['image'] = $this->storeImage($data['image']);
        }
        if (empty($data['image_detail'])) {
            unset($data['image_detail']);
        } else {
            $data['image_detail'] = $this->storeImage($data['image_detail']);
        }
        return $this->productRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }

    public function storeImage($file)
    {
        if ($file) {
            // cach 1
            // $result = $file->store('product');
            // cach 2: duoi thu muc luu tru mac dinh
            // $result = Storage::build([
            //     'driver' => 'local',
            //     'root' => storage_path('app/public'),
            //     'throw' => false,
            // ],)->put('product', $file);
            $result = Storage::put('product', $file);
        } else {
            $result = '';
        }
        return $result;
    }
}
