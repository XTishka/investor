<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyAvailabiltyController;
use App\Http\Controllers\Admin\RoundController;
use App\Http\Controllers\Admin\StockholderController;
use App\Http\Controllers\Admin\WishesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishController;
use App\Actions\StockholderPriorityUpAction;
use App\Actions\StockholderPriorityDownAction;
use App\Http\Controllers\Admin\AdministratorController;

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/no_rounds', [WishController::class, 'noRounds'])->name('no_rounds');

    Route::group(['middleware' => 'active_round'], function () {
        Route::get('/', [WishController::class, 'index'])->name('wisher');
        Route::post('/store_wish', [WishController::class, 'store'])->name('wishes.store');
        Route::delete('/delete_wish/{id}', [WishController::class, 'delete'])->name('wishes.delete');
        Route::get('/get_by_country', [WishController::class, 'getPropertiesByCountry'])->name('wisher.countries');
        Route::get('/get_weeks', [WishController::class, 'getWeeksOptionsList'])->name('wisher.weeks');
        Route::get('/get_wishes_qty', [WishController::class, 'getWishesQtyByWeekNumber'])->name('wisher.wish_qty');
    });
    
    Route::group(['middleware' => 'is_admin'], function () {
        
        Route::prefix('admin')->group(function () {
            
            Route::resource('administrators', AdministratorController::class)->name('index', 'admin.administrators');
            Route::resource('rounds', RoundController::class)->name('index', 'admin.rounds');

            Route::controller(PropertyController::class)->group(function () {
                Route::get('/properties', 'index')->name('admin.properties');
                Route::get('/properties/create', 'create')->name('admin.properties.create');
                Route::post('/properties/store', 'store')->name('admin.properties.store');
                Route::get('/properties/show/{property}/{round}', 'show')->name('admin.properties.show');
                Route::get('/properties/edit/{property}', 'edit')->name('admin.properties.edit');
                Route::put('/properties/update/{property}', 'update')->name('admin.properties.update');
                Route::post('/properties/delete/{property}', 'destroy')->name('admin.properties.delete');
                Route::post('/properties/import', 'import')->name('admin.properties.import');
            });

            Route::group(['middleware' => 'active_round'], function () {
                Route::controller(DashboardController::class)->group(function () {
                    Route::get('/dashboard', 'index')->name('admin.dashboard');
                    Route::get('/dashboard/export', 'export')->name('admin.dashboard.export');
                    Route::get('/dashboard/distribute/{round}', 'distribute')->name('admin.dashboard.distribute');
                });

                Route::resource('stockholders', StockholderController::class)->name('index', 'admin.stockholders');
                Route::post('stockholders/import', [StockholderController::class, 'import'])->name('admin.stockholders.import');
                Route::resource('wish_index', WishesController::class)->name('index', 'admin.wish_index');

                Route::controller(PropertyAvailabiltyController::class)->group(function () {
                    Route::get('/availability_disable/{week_id}/{property_id}', 'store')->name('admin.disable_week');
                    Route::get('/availability_enable/{week_id}/{property_id}', 'destroy')->name('admin.enable_week');
                });

                Route::get('/priorities/up', StockholderPriorityUpAction::class)->name('admin.priority_up');
                Route::get('/priorities/down', StockholderPriorityDownAction::class)->name('admin.priority_down');
            });
            
            


        });

    });
});


