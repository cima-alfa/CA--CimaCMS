<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\User;

class UserRepository extends Repository 
{
    public function model(): User {
        return new User;
    }
}