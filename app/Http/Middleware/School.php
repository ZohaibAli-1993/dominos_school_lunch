<?php

namespace App\Http\Middleware;

use Closure;

class School
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
        if(!\Auth::check()|| \Auth::user()->type != 'school')
        {
            session()->flash('error', 'Permission deny');
            return redirect('/');
        }
        return $next($request);
    }
}
