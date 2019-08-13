<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!\Auth::check()|| \Auth::user()->type != 'admin')
        {
            session()->flash('error', 'Permission deny');
            return redirect('/');
        }
        return $next($request);
    }
}
