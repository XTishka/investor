<?php

namespace App\Http\Middleware;

use App\Models\Round;
use Barryvdh\Debugbar\Facades\Debugbar;
use Closure;
use Illuminate\Http\Request;

class ActiveRound
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
        $route = $request->route();

        if (request('change_round')) {

            if (request('change_round') == 'all') {
                $request->session()->remove('active_round');
                return redirect(route($route->getName(), $route->parameters));
            }

            if (Round::query()->findOrFail(request('change_round'))) {
                $request->session()->put('active_round', request('change_round'));
            }

            return redirect(route($route->getName(), $route->parameters));
        }

        return $next($request);
    }
}
