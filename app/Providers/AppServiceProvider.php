<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Models\Round;
use App\Http\Traits\ActiveRoundTrait;

class AppServiceProvider extends ServiceProvider
{
    use ActiveRoundTrait;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('RoundIsset', function () {
            return $this->roundsIsset();
        });
    }
}
