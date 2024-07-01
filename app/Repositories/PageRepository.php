<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\Page;

class PageRepository extends Repository 
{
    public function model(): Page {
        return new Page;
    }
}