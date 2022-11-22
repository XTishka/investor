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

    public function show(Round $round)
    {
        return view('admin.rounds.show', compact('round'));
    }

    public function destroy(Round $round)
    {
        // TODO:Add check for dates and wishes
        $round->delete();
        return redirect()->route('admin.rounds');
    }
}