<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserHasStoreMiddleware
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
        if(auth()->user()->store()->count()){
            flash('Você já possui uma loja')->warning();
            return redirect()->route('admin.stores.index');
        }
        return $next($request);
    }
}
