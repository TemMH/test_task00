<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use Illuminate\Http\Request;

class IconController extends Controller
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
    public function store(Request $request)
    {
    //     $request->validate([

    //         'name' => 'required|string|max:50',
    //         'description' => 'required|string|max:255',

    //    ]);
    
    Icon::create([
        'name' => $request->input('name'),
        'url' => $request->input('url'),
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Icon $icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Icon $icon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Icon $icon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Icon $icon)
    {
        //
    }
}
