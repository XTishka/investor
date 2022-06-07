<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wish;
use Illuminate\Http\Request;
use App\Models\Priority;

class WishesController extends Controller
{
    public function index()
    {
        $wishes = Wish::all();
        $priorities = Priority::all();
        return view('admin.wishes.index', compact('wishes', 'priorities'));
    }
}
