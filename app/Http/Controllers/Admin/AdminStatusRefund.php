<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanRefundModel;
use Illuminate\Http\Request;

class AdminStatusRefund extends Controller
{
    public function index()
    {

        $data = [
            'refunds' => PengajuanRefundModel::all()
        ];

        return view('admin.refund.status.index', $data);
    }
}
