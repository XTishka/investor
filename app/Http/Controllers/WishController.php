<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function index()
    {
        $countries = Property::select('country')->distinct()->get();
        return view('wisher', compact('countries'));
    }

    public function getPropertiesByCountry(Request $request)
    {
        $html = '<option value="1">test 1</option>';
        $html .= '<option value="2">test 2</option>';
        $html .= '<option value="3">test 3</option>';
        Debugbar::info($request->country);
        return response()->json(['html' => $html]);
    }
}
