<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.properties.index');
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function edit(Property $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    public function show(Property $property)
    {
        return view('admin.properties.show', compact('property'));
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties');
    }
}
