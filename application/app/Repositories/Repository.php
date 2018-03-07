<?php

namespace App\Repositories;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class Repository implements RepositoryInterface{

    public $model;

    function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function find($id, $with = [])
    {
        return $this->model->with($with)->findOrFail($id);
    }
    public function pluck($name = "name", $key = "id")
    {
        return $this->model->pluck($name, $key);
    }
    public function update($id, $data)
    {
        $model= $this->model->findOrFail($id);
        $model->update($data);
        return $model;
    }
    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();
    }
    public function count()
    {
        return $this->model->count();
    }


}