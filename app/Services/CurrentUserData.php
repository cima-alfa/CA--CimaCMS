<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Contracts\Auth\Authenticatable;

class CurrentUserData extends UserData
{
    public function __construct(?Authenticatable $user)
    {
        if (! $user) {
            return;
        }

        parent::__construct($user);
    }
}
