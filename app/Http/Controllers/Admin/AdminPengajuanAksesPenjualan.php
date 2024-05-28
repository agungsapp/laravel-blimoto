<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AksesPenjualanModel;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminPengajuanAksesPenjualan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'judulHalaman' => 'Pengajuan Akses Edit',
            'pengajuans' => AksesPenjualanModel::all(),
        ];

        return view('admin.pengajuan-akses.index', $data);
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

    public function setuju(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $pengajuanAkses = AksesPenjualanModel::findOrFail($id);
            $pengajuanAkses->status = 'setuju';
            $pengajuanAkses->save();

            $idPenjualan = $pengajuanAkses->id_penjualan;
            $penjualan = Penjualan::findOrFail($idPenjualan);
            $penjualan->is_edit = true;
            $penjualan->save();
            DB::commit();
            flash()->addSuccess('berhasil memberikan akses edit pada sales.');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info('gagal setuju akses edit ! : ', ['pesan' => $th]);
            //throw $th;
            flash()->addError("Terjadi kesalahan pada server !");
            return redirect()->back();
        }
    }

    public function tolak(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $pengajuanAkses = AksesPenjualanModel::findOrFail($id);
            $pengajuanAkses->status = 'tolak';
            $pengajuanAkses->save();

            $idPenjualan = $pengajuanAkses->id_penjualan;
            $penjualan = Penjualan::findOrFail($idPenjualan);
            $penjualan->is_edit = false;
            $penjualan->save();

            DB::commit();
            flash()->addSuccess('berhasil menolak akses edit pada sales.');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info('gagal tolak akses edit ! : ', ['pesan' => $th]);
            //throw $th;
            flash()->addError("Terjadi kesalahan pada server !");
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = [
        //     'message' => 'halo sambutan ini haha',
        //     'data' => $request->all(),
        // ];

        $request->validate([
            'tujuan' => 'required',
            'id_penjualan' => 'required',
            'catatan' => 'required',
        ]);

        try {

            $cekData = AksesPenjualanModel::where('id_penjualan', $request->id_penjualan)->where('status', '!=', 'done')->get();
            if ($cekData->count() > 0) {
                return response()->json(['message' => 'Pengajuan sebelumnya masih dalam proses'], 401);
            }

            AksesPenjualanModel::create([
                'id_penjualan' => $request->id_penjualan,
                'tujuan' => json_encode($request->tujuan),
                'catatan' => $request->catatan,
            ]);
            return response()->json(['message' => 'pengajuanmu sedang di proses.'], 200);
        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(['message' => 'data pengajuan gagal, Terjadi kesalahan pada server. !' . $th], 500);
        }


        // return response()->json($request->all(), 200);
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
        //
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
