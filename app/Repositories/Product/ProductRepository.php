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
        $query = $this->model->query()->with('category');
        if (!empty($params['keyword'])) {
            $query->where('product_name', 'LIKE', '%' . $params['keyword'] . '%');
        } 
        if ( isset($params['status'])){
            $query->where('is_delete' ,  $params['status']);
        }
        return $query->orderBy($params['orderBy'] ?? 'id', $params['orderDir'] ?? 'DESC')->paginate($params['limit'] ?? $this->limit_default);
    }
}
