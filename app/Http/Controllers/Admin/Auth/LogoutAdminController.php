<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutAdminController extends Controller
{
  public function logout()
  {
    $guards = ['admin', 'ceo', 'sales', 'manager'];
    $user = null;
    $loggedOut = false;

    foreach ($guards as $guard) {
      if (Auth::guard($guard)->check()) {
        $user = Auth::guard($guard)->user();
        if ($guard == 'sales') {
          $user->update(['status_online' => false]);
        }

        Auth::guard($guard)->logout();
        $loggedOut = true;
        break;
      }
    }

    if (!$loggedOut) {
      return redirect()->route('admin.login');
    }

    return redirect()->route('admin.login');
  }
}
