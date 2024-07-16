<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        // return view('admin.auth.register');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(StoreRequest $request)
    {
        //
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified user in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
