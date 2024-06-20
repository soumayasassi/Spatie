<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifAge
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
        // Supposons que l'âge est passé dans les paramètres de la requête (par exemple, ?age=18)
        $age = $request->input('age');

        if ($age < 18) {
            return redirect('/');
        }

        return $next($request);
    }
}
