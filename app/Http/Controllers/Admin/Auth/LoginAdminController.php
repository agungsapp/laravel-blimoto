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
        $guards = ['admin', 'sales', 'ceo', 'manager'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect()->to('app/dashboard');
            }
        }

        return view('admin.auth.admin-login');
    }


    public function procesLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('username', 'password');
        $roles = [
            'admin' => \App\Models\Admin::class,
            'ceo' => \App\Models\Ceo::class,
            'manager' => \App\Models\Manager::class,
            'area_manager' => \App\Models\AreaManager::class,
            'sales' => \App\Models\Sales::class,
        ];

        foreach ($roles as $guard => $model) {
            if (Auth::guard($guard)->attempt($credentials)) {
                if ($guard === 'sales') {
                    // Hanya untuk role 'sales', update status_online
                    $salesUser = $model::where('username', $request->username)->first();
                    if ($salesUser) {
                        $salesUser->status_online = true;
                        $salesUser->save();
                    }
                }
                return redirect()->intended('app/dashboard');
            }
        }

        return redirect()->back()->withErrors(['error' => 'The provided credentials do not match our records.']);
    }
}
