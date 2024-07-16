<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.dashboard');
    }
}
