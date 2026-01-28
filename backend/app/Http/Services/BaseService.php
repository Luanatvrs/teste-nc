<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected Model $model;

    public function get()
    {
        return $this->model->orderBy('id', 'desc')->get();
    }

    public function create(array $dados)
    {
        return $this->model->create($dados);
    }

    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(int $id, array $dados)
    {
       $this->model->where('id', $id)->update($dados);
       return $this->model->findOrFail($id);
    }

    public function destroy(int $id)
    {
        return $this->model->where('id', $id)->delete($id);
    }
}
