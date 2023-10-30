<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdminOrSales
{
  public function handle($request, Closure $next)
  {
    if (Auth::guard('admin')->check() || Auth::guard('sales')->check()) {
      return $next($request);
    }

    return redirect('app/login'); // Sesuaikan dengan rute login Anda
  }
}
