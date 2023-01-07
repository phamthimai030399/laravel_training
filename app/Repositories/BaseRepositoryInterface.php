<?php
namespace App\Repositories;

interface BaseRepositoryInterface {
    public function getList($params = []);
    public function getAll();
    public function getById($id);
    public function getByField($key, $value);
    public function getOneByField($key, $value);
    public function create($params);
    public function update($id, $params);
    public function delete($id);
}