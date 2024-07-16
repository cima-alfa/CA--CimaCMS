<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\Repository as RepositoryContract;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryContract
{
    protected Model $model;

    public function __construct()
    {
        $this->model = $this->model();
    }

    public function all(array $columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*'])
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function find(mixed $id, array $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function findBy(mixed $field, mixed $value, array $columns = ['*'])
    {
        return $this->model->whereAny((array) $field, '=', $value)->first($columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(mixed $id, array $data)
    {
        return $this->model->whereId($id)->update($data);
    }

    public function delete(mixed $id)
    {
        return $this->model->destroy($id);
    }
}
