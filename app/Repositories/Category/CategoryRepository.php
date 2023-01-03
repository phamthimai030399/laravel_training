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
        $query = $this->model;
        if (!empty($params['keyword'])) {
            $query->where('category_name', 'LIKE', '%' . $params['keyword'] . '%');
        }
        return $query->paginate($this->limit_default);
    }
}
