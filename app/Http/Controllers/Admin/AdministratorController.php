<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class AdministratorController extends Controller
{
    public function index()
    {
        $administrators = User::where('is_admin', 1)->orderBy('name')->paginate(10);
        return view('admin.administrators.index', compact('administrators'));
    }


    public function create()
    {
        return view('admin.administrators.create');
    }


    public function show($id)
    {
        return redirect(route('admin.administrators.edit', $id));
    }


    public function edit($id)
    {
        $administrator = User::find($id);
        return view('admin.administrators.edit', compact('administrator'));
    }

    public function destroy($id): RedirectResponse
    {
        $superadminEmail = 'takhir.berdyiev@gmail.com';
        $administrator = User::query()->findOrFail($id);
        if ($administrator->email == $superadminEmail) return redirect()->route('admin.administrators');
        $administrator->delete();
        return redirect()->route('admin.administrators');
    }
}
