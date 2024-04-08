<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManualTransferModel;
use App\Models\PengajuanRefundModel;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminManualRefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $penjualan = Penjualan::with('motor', 'leasing', 'hasil', 'kota', 'sales', 'manual')
            ->where('status_pembayaran_dp', '=', 'success')
            ->orderBy('id', 'desc')
            ->get();

        $data = [
            'judulHalaman' => 'Refund dana manual transfer',
            'penjualan' => $penjualan
        ];

        return view('admin.refund.manual.index', $data);
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
        // dd("test debug data ", $request->all());

        $validator = Validator::make($request->all(), [
            'konsumen' => 'required',
            'bank' => 'required',
            'norek' => 'required',
            'nominal' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        // Cek apakah sudah ada pengajuan refund untuk penjualan ini
        $cekPengajuan = PengajuanRefundModel::where('id_penjualan', $request->idp)->first();
        if ($cekPengajuan) {
            flash()->addError("Data refund sudah ada dan masih dalam status " . $cekPengajuan->status_pengajuan . "!");
            return redirect()->back()->withInput();
        }
        $cekManual = ManualTransferModel::where('id_penjualan', $request->idp)->first();
        if ($cekManual) {
            flash()->addError("Data refund sudah ada !");
            return redirect()->back()->withInput();
        }

        DB::beginTransaction();
        try {
            $pengajuan = PengajuanRefundModel::create([
                'id_penjualan' => $request->idp,
                'nominal' => $request->nominal,
                'metode_pembayaran' => 'bank_transfer',
                'status_pengajuan' => 'menunggu',
                'catatan' => $request->catatan,
            ]);

            $manual = ManualTransferModel::create([
                'id_penjualan' => $request->idp,
                'id_pengajuan' => $pengajuan->id,
                'nama_rekening' => $request->konsumen,
                'kode' => $request->bank,
                'norek' => $request->norek,

            ]);

            DB::commit();
            flash()->addSuccess("Berhasil  membuat data pengajuan refund !");
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            flash()->addError("Terjadi kesalahan saat menyimpan data!");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'penjualan' => Penjualan::find($id),
            'judulHalaman' => 'Form Data Bank Konsumen'
        ];
        // dd($data);
        return view('admin.refund.manual.show', $data);
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
