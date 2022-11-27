<?php

use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\RoundController;
use App\Http\Livewire\Admin\Users\IndexAdministrators;
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

        // Rounds
        Route::controller(RoundController::class)->group(function () {
            Route::get('/rounds', 'index')->name('admin.rounds');
            Route::get('/rounds/create', 'create')->name('admin.rounds.create');
            Route::get('/rounds/edit/{round}', 'edit')->name('admin.rounds.edit');
            Route::get('/rounds/show/{round}', 'show')->name('admin.rounds.show');
            Route::delete('/rounds/delete/{round}', 'destroy')->name('admin.rounds.delete');
        });

        // Administrators
        Route::controller(AdministratorController::class)->group(function () {
            Route::get('/administrators', 'index')->name('admin.administrators');
            Route::get('/administrators/create', 'create')->name('admin.administrators.create');
            Route::get('/administrators/show/{id}', 'show')->name('admin.administrators.show');
            Route::get('/administrators/edit/{id}', 'edit')->name('admin.administrators.edit');
            Route::delete('/administrators/delete/{id}', 'destroy')->name('admin.administrators.delete');
        });
    });
});