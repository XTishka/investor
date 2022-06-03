<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wish;
use Illuminate\Http\Request;

class WishesController extends Controller
{
    public function index()
    {
        $wishes = Wish::all();
        return view('admin.wishes.index', compact('wishes'));
    }
}
