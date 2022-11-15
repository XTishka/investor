<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Round;
use Carbon\Factory;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class RoundController extends Controller
{
    public function index()
    {
        return view('admin.rounds.index');
    }

    public function create()
    {
        return view('admin.rounds.create');
    }

    public function edit(Round $round)
    {
        return view('admin.rounds.edit', compact('round'));
    }
}
