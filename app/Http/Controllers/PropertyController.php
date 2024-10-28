<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
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
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'required|string',
            'description' => 'required|string',
            'area' => 'required|integer',
            'price' => 'required|numeric',
            'icon_id' => 'required|exists:icons,id',
            'latitude' => 'required|numeric', 
            'longitude' => 'required|numeric'
        ]);
    
        $data['coordinates'] = [
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude')
        ];
    
        $property = Property::create($data);
    
        return response()->json($property, 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $comments = Property::with('comments');


        return view('property', compact('property','comments'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
