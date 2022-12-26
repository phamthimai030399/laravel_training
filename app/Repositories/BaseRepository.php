<?php

namespace App\Repositories;


abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function getList($params = [])
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
