<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getList($params = [])
    {
        $query = $this->model->query();
        if (!empty($params['keyword']) && isset($params['status'])){
            $query->where('product_name', 'LIKE', '%' . $params['keyword'] . '%')->where('is_delete' ,  $params['status']);
        } elseif (!empty($params['keyword'])) {
            $query->where('product_name', 'LIKE', '%' . $params['keyword'] . '%');
        } elseif ( isset($params['status'])){
            $query->where('is_delete' ,  $params['status']);
        }
        return $query->paginate($this->limit_default);
    }
}
