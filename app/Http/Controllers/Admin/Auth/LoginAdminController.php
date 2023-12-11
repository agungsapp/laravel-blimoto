<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginAdminController extends Controller
{
    public function index()
    {
        // oke
        if (Auth::guard('admin')->check()) {
            return redirect()->to('app/dashboard');
        }

        if (Auth::guard('sales')->check()) {
            return redirect()->to('app/dashboard');
        }
        return view('admin.auth.admin-login');
    }

    public function procesLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('username', 'password');

        // Coba otentikasi menggunakan guard 'admin' jika model 'Admin' ditemukan
        if ($admin = \App\Models\Admin::where('username', $request->username)->first()) {
            if (Auth::guard('admin')->attempt($credentials)) {
                // Redirect ke dashboard admin
                return redirect()->intended('app/dashboard');
            }
        }

        // Coba otentikasi menggunakan guard 'sales' jika model 'Sales' ditemukan
        if ($sales = \App\Models\Sales::where('username', $request->username)->first()) {
            if (Auth::guard('sales')->attempt($credentials)) {
                // Redirect ke dashboard sales
                if ($sales) {
                    // Update status_online menjadi true saat berhasil login
                    $sales->status_online = true;
                    $sales->save();
                }
                return redirect()->intended('app/dashboard');
            }
        }

        return redirect()->back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
}
