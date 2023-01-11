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
        if (!empty($params['keyword'])) {
            $query->where('category_name', 'LIKE', '%' . $params['keyword'] . '%');
        }
        if (isset($params['status'])) {
            $query->where('is_active',  $params['status']);
        }
        return $query->orderBy('id', 'DESC')->paginate($this->limit_default);
    }
    public function getListInHome()
    {
        $query = $this->model->query();
        $query->whereHas('products', function ($q) {
            $q->where('is_delete', 0);
        });
        $query->where('is_active', 1);
        return $query->get() 
            ->map(function ($cate) {
                $cate->setRelation('products', $cate->products->where('is_delete', 0)->take(4));
                return $cate;
            });
    }
    public function getListInCategory($id)
    {
        $query = $this->model->query();
        $query->where(['is_active'=> 1, 'id'=> $id]);
        $query->whereHas('products', function ($q) {
            $q->where('is_delete', 0);
        });
        return $query->get() 
            ->map(function ($cate) {
                $cate->setRelation('products', $cate->products->where('is_delete', 0));
                return $cate;
            });
    }
}
