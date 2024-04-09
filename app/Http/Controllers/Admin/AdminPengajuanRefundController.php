<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanRefundModel;
use Illuminate\Http\Request;

class AdminPengajuanRefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'refunds' => PengajuanRefundModel::all()
        ];

        // dd($data['refunds'][0]->pembayaran->metode_pembayaran);

        return view('admin.refund.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $refund = PengajuanRefundModel::find($id);

        try {
            $refund->status_pengajuan = $request->status_pengajuan;
            $refund->save();

            flash()->addSuccess("Berhasil melakukan update status pengajuan menjadi " . $request->status_pengajuan);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            flash()->addError("Update status pengajuan gagal, terjadi kesalahan di server.");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
