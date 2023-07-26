<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Illuminate\View\View;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerRenderHook(
                'global-search.end',
                fn(): View => $this->getLanguageSwitcherView()
            );
        });
    }

    private function getLanguageSwitcherView(): View
    {
        $currentLanguage = session('language') ?? config('app.locale');
        $languages = config('app.languages');

        return view('filament.language-switcher', [
            'languages' => $languages,
            'currentLanguage' => $languages[$currentLanguage],
        ]);
    }
}