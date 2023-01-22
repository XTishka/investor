<?php

use App\Http\Controllers\Admin\AdministratorController;
// use App\Http\Controllers\Admin\RoundController;
use App\Http\Controllers\RoundController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\StockholderController;
use App\Models\Stockholder;
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

Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Cabinet
    Route::controller(CabinetController::class)->group(function () {
        Route::get('/cabinet', 'cabinet')->name('cabinet');
        Route::get('/cabinet/profile', 'profile')->name('profile');
    });

    Route::group(['middleware' => 'is_admin'], function () {

        Route::prefix('admin')->group(function () {

            // Dashboard
            Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');

            // Stockholders
            Route::get('/stockholders', function () {
                return view('admin.stockholders');
            })->name('admin.stockholders');

            // Wishes
            Route::get('/wishes', function () {
                return view('admin.wishes');
            })->name('admin.wishes');

            // Properties
            Route::controller(PropertyController::class)->group(function () {
                Route::get('/properties', 'index')->name('admin.properties');
                Route::get('/properties/create', 'create')->name('admin.properties.create');
                Route::get('/properties/edit/{property}', 'edit')->name('admin.properties.edit');
                Route::get('/properties/show/{property}', 'show')->name('admin.properties.show');
                Route::delete('/properties/delete/{property}', 'destroy')->name('admin.properties.delete');
                Route::get('/properties/import', 'import')->name('admin.properties.import');
                Route::get('/properties/export', 'export')->name('admin.properties.export');
            });

            // Rounds
            Route::get('/rounds', RoundController::class)->name('admin.rounds');

            // Administrators
            Route::controller(AdministratorController::class)->group(function () {
                Route::get('/administrators', 'index')->name('admin.administrators');
                Route::get('/administrators/create', 'create')->name('admin.administrators.create');
                Route::get('/administrators/show/{id}', 'show')->name('admin.administrators.show');
                Route::get('/administrators/edit/{id}', 'edit')->name('admin.administrators.edit');
                Route::delete('/administrators/delete/{id}', 'destroy')->name('admin.administrators.delete');
                Route::get('/administrators/trash', 'trash')->name('admin.administrators.trash');
                Route::get('/administrators/restore/{id}', 'restore')->name('admin.administrators.restore');
                Route::get('/administrators/delete/{id}', 'delete')->name('admin.administrators.delete');
            });

            // Logs
            Route::get('/logs', LogController::class)->name('admin.logs');
        });
    });
});
