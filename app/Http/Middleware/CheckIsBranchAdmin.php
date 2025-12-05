<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsBranchAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        if (!auth()->user()) {
          return redirect('/login');
        }

        if(auth()->user()->role != 'branch_admin') {
          return redirect('/login');
        }

        return $next($request);
    }

}
