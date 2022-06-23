<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreAdministratorRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\User;
use App\Http\Requests\admin\StoreStockholderRequest;
use App\Http\Requests\admin\UpdateAdministratorRequest;
use Hash;
use Illuminate\Support\Str;

class AdministratorController extends Controller
{
    public function index(): Application|Factory|View
    {
        $administrators = User::where('is_admin', 1)->get();
        return view('admin.administrators.index', compact('administrators'));
    }

    public function create(): Application|Factory|View
    {
        $random_password = Str::random(8);
        return view('admin.administrators.create', compact('random_password'));
    }

    public function store(StoreAdministratorRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'created_at' => date(now()),
            'updated_at' => date(now()),
            'is_admin' => 1,
        ]);
        return redirect()->route('admin.administrators');
    }

    public function edit(User $administrator): Application|Factory|View
    {
        return view('admin.administrators.edit', compact('administrator'));
    }

    public function update(UpdateAdministratorRequest $request, User $administrator): RedirectResponse
    {
        $administrator->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        return redirect()->route('admin.administrators', $administrator);
    }

    public function destroy(User $administrator): RedirectResponse
    {
        $administrator->delete();
        return redirect()->route('admin.administrators');
    }
}
