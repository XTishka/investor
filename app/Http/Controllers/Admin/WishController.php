<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdateWishStatusRequest;
use App\Http\Traits\ActiveRoundTrait;
use App\Models\Wish;
use Illuminate\Http\Request;
use App\Models\Priority;
use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Round;

class WishController extends Controller
{
    use ActiveRoundTrait;

    public $timestamp;
    public $roundId;

    public function __construct(Request $request)
    {
        $this->timestamp = now()->timestamp;
        $this->roundId = ($request->round_id) ? $request->round_id : $this->activeRound()->id;
    }

    public function index(): View|Factory|Application
    {
        return view('admin.wishes.index');
    }

    public function edit($id, Priority $priority): View|Factory|Application
    {
        $wish = Wish::find($id);
        return view('admin.wishes.edit', compact('wish', 'priority'));
    }

    public function update(UpdateWishStatusRequest $request, $id): RedirectResponse
    {
        $wish = Wish::find($id);
        $wish->update($request->validated());
        return redirect()->route('admin.dashboard');
    }

    public function destroy(Wish $wish): RedirectResponse
    {
        $wish->delete();
        return redirect()->route('admin.rounds');
    }
}
