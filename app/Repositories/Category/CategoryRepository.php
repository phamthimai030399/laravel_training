<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getList($params = [])
    {
        $query = $this->model->query();
        if (!empty($params['keyword']) && isset($params['status'])){
            $query->where('category_name', 'LIKE', '%' . $params['keyword'] . '%')->where('is_active' ,  $params['status']);
        } elseif (!empty($params['keyword'])) {
            $query->where('category_name', 'LIKE', '%' . $params['keyword'] . '%');
        } elseif ( isset($params['status'])){
            $query->where('is_active' ,  $params['status']);
        }
        return $query->paginate($this->limit_default);
    }
}
