<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

use function Ramsey\Uuid\v1;

class AdminArtisanController extends Controller
{

    public function index()
    {
        return view('admin.artisan.index');
    }

    public function cache()
    {
        Artisan::call('cache:clear');
        flash()->addSuccess('Cache berhasil dihapus!');
        return redirect()->back();
    }

    public function view()
    {
        Artisan::call('view:clear');
        flash()->addSuccess('Cache view berhasil dihapus!');
        return redirect()->back();
    }

    public function route()
    {
        Artisan::call('route:cache');
        flash()->addSuccess('Cache route berhasil dibuat!');
        return redirect()->back();
    }

    public function config()
    {
        Artisan::call('config:cache');
        flash()->addSuccess('Cache konfigurasi berhasil dibuat!');
        return redirect()->back();
    }

    public function all()
    {
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        flash()->addSuccess('Cache konfigurasi, view, dan route berhasil dihapus!');
        return redirect()->back();
    }

    public function storage()
    {
        Artisan::call('storage:link');
        flash()->addSuccess('Symbolic link storage berhasil dibuat!');
        return redirect()->back();
    }
}
