<?php

namespace App\Http\Middleware;

use App\Http\Traits\ActiveRoundTrait;
use App\Models\Round;
use Closure;
use Illuminate\Http\Request;

class ActiveRound
{
    use ActiveRoundTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->roundsIsset() === false) {
            if(auth()->user()->is_admin) return redirect()->route('admin.rounds');
            return redirect()->route('no_rounds');
        }
        if(!$this->activeRound()) return redirect()->route('no_rounds');
        return $next($request);
    }
}
