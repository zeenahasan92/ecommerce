<?php

namespace App\Http\Middleware;
use Auth;
use App\User;
use Closure;
class CheckUser
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
        if(!Auth::user()->admin)
return redirect('/');
        return $next($request);
    }
}
