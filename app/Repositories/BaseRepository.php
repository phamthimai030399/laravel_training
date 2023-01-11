<?php

namespace App\Repositories;


abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    protected $limit_default = 5;

    public function getList($params = [])
    {
        $query = $this->model->query();
        foreach ($params as $key => $value) {
            if (!in_array($key, ['orderBy', 'orderDir', 'limit'])) {
                if (is_array($value) && count($value) == 2) {
                    $query->where($key, $value[0], $value[1]);
                } else {
                    $query->where($key, $value);
                }
            }
        }
        return $query->orderBy('id', 'DESC')->paginate($this->limit_default);
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getById($id)
    {
        return $this->model->where('id', $id)->first();
    }
    public function getByField($key, $value)
    {
        return $this->model->where($key, $value)->get();
    }
    public function getOneByField($key, $value)
    {
        return $this->model->where($key, $value)->first();
    }
    public function getOneByParams($params)
    {
        $query = $this->model->query();
        foreach ($params as $key => $value) {
            $query->where($key, $value);
        }
        return $query->first();
    }
    public function create($params)
    {
        return $this->model->create($params);
    }
    public function update($id, $params)
    {
        return $this->model->where('id', $id)->update($params);
    }
    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
