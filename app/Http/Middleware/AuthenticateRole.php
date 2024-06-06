<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @param  mixed  ...$roles
   * @return mixed
   */
  public function handle($request, Closure $next, ...$roles)
  {
    foreach ($roles as $role) {
      if (Auth::guard($role)->check()) {
        return $next($request);
      }
    }
    return redirect('app/login');
  }
}
