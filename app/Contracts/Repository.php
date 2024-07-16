<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function model(): Model;

    public function all(array $columns = ['*']);

    public function paginate(int $perPage = 15, array $columns = ['*']);

    public function find(mixed $id, array $columns = ['*']);

    public function findBy(mixed $field, mixed $value, array $columns = ['*']);

    public function create(array $data);

    public function update(mixed $id, array $data);

    public function delete(mixed $id);
}
