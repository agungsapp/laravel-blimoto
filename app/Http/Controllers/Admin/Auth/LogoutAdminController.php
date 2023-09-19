<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutAdminController extends Controller
{
  public function logout()
  {
    Auth::guard('admin')->logout();

    return redirect()->route('admin.login');
  }
}
