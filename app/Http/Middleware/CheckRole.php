<?php

namespace delivery\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    { //se a role do usuário autenticado bate com a $role que passamos
      if (!Auth::check()) {
          return redirect('/auth/login');
      }

      if (Auth::user()->role <> $role) {
           return redirect('/auth/login');

       }

        return $next($request);
    }
}
