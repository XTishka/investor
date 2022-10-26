<?php

use App\Http\Controllers\Admin\AdministratorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');

        Route::controller(AdministratorController::class)->group(function () {
            Route::get('/administrators', 'index')->name('admin.administrators');
        });
    });
});