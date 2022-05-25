<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreStockholderRequest;
use App\Http\Requests\admin\UpdateStockholderRequest;
use App\Models\Property;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class StockholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $stockholders = User::all();
        return view('admin.stockholders.index', compact('stockholders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.stockholders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStockholderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreStockholderRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admin.stockholders');
    }

    /**
     * Display the specified resource.
     *
     * @param User $stockholder
     * @return Application|Factory|View
     */
    public function show(User $stockholder): Application|Factory|View
    {
        $properties = Property::all();
        return view('admin.stockholders.show', compact('stockholder', 'properties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $stockholder
     * @return Application|Factory|View
     */
    public function edit(User $stockholder): View|Factory|Application
    {
        return view('admin.stockholders.edit', compact('stockholder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStockholderRequest $request
     * @param User $stockholder
     * @return RedirectResponse
     */
    public function update(UpdateStockholderRequest $request, User $stockholder): RedirectResponse
    {
        $stockholder->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('stockholders.show', $stockholder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $stockholder
     * @return RedirectResponse
     */
    public function destroy(User $stockholder): RedirectResponse
    {
        $stockholder->delete();

        return redirect()->route('admin.stockholders');
    }
}
