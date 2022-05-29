<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\RoundController;
use App\Http\Controllers\Admin\StockholderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishController;

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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/wisher', [WishController::class, 'index'])->name('wisher');

    Route::group(['middleware' => 'is_admin'], function () {

        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
            Route::resource('stockholders', StockholderController::class)->name('index', 'admin.stockholders');
            Route::resource('properties', PropertyController::class)->name('index', 'admin.properties');
            Route::resource('rounds', RoundController::class)->name('index', 'admin.rounds');
        });

    });
});


