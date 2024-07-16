<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    public function model(): User
    {
        return new User;
    }
}
