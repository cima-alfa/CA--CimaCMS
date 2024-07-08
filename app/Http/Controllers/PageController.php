<?php

namespace App\Http\Controllers;

use App\Components\Forms\CreatePageForm;
use App\Http\Requests\Page\StoreRequest;
use App\Http\Requests\Page\UpdateRequest;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.page.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreatePageForm $createPageForm)
    {   bdump($createPageForm->get());
        return view('admin.page.create', ['createPageForm' => $createPageForm]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('page');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        //
    }
}
