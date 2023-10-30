<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Sales;
use Illuminate\Support\Facades\Auth;

class LogoutAdminController extends Controller
{
  public function logout()
  {
    // Mendapatkan guard yang sedang digunakan
    $user = Auth::user();
    $isAdmin = Auth::guard('admin')->check() ? true : false;

    if (!$isAdmin) {
      $user = Auth::guard('sales')->user();
      $user->update(['status_online' => false]);
    }
    Auth::guard('sales')->logout();
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
  }
}
