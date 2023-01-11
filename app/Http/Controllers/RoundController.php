<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function __invoke()
    {
        return view('admin.rounds');
    }
}
