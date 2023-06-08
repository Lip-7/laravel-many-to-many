<?php

namespace App\Http\Controllers\Admin;

use App\Models\Framework;
use App\Http\Requests\StoreFrameworkRequest;
use App\Http\Requests\UpdateFrameworkRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class FrameworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFrameworkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Framework $framework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Framework $framework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrameworkRequest $request, Framework $framework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Framework $framework)
    {
        //
    }
}
