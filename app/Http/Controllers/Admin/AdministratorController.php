<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdministratorController extends Controller
{
    public function index()
    {
        $administrators = User::where('is_admin', 1)->get();
        return view('admin.administrators.index', compact('administrators'));
    }
}
