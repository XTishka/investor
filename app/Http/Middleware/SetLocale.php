<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $languages = array_keys(config('app.languages'));
        $route = $request->route();

        if (request('change_language')) {
            session()->put('language', request('change_language'));
            $language = request('change_language');
            if (array_key_exists('locale', $route->parameters) && $route->parameters['locale'] != $language) {
                $route->parameters['locale'] = $language;

                if (in_array($language, $languages)) {
                    app()->setLocale($language);
                }

                return redirect(route($route->getName(), $route->parameters));
            }
        } elseif (session('language')) {
            $language = session('language');

            if (array_key_exists('locale', $route->parameters) && $route->parameters['locale'] != $language && in_array($route->parameters['locale'], $languages)) {
                $language = $route->parameters['locale'];
                session()->put('language', $language);
            }
        } elseif (config('app.locale')) {
            $language = config('app.locale');
        }


        if (isset($language) && in_array($language, $languages)) {
            app()->setLocale($language);
            debug('Set locale: ' . $language);
        }

        if (App::isLocale('en')) {
            debug('Current language: English');
        } elseif (App::isLocale('ua')) {
            debug('Current language: Ukraine');
        }


        return $next($request);
    }
}