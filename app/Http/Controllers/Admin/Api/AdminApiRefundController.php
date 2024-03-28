<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminApiRefundController extends Controller
{
    public function pengajuanRefund(Request $request, $id)
    {
        return response()->json(['message' => $request->all()], 200);
    }
}
