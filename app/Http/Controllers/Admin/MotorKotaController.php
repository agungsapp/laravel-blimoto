<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Motor;
use App\Models\MotorKota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotorKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motorKotaData = MotorKota::join('kota', 'motor_kota.id_kota', '=', 'kota.id')
            ->join('motor', 'motor_kota.id_motor', '=', 'motor.id')
            ->select('motor_kota.*', 'kota.nama as kota_nama', 'motor.nama as motor_nama')
            ->orderByDesc('motor_kota.id')
            ->get();

        $kota = Kota::all();
        $motor = Motor::all();

        return view('admin.motor-kota.index', [
            'motor_kotas' => $motorKotaData,
            'motor' => $motor,
            'kota' => $kota,
        ]);
    }

    // THSFK - perbaikan pencarian
    public function getMotorKotaData()
    {
        $motorKotaData = MotorKota::join('kota', 'motor_kota.id_kota', '=', 'kota.id')
            ->join('motor', 'motor_kota.id_motor', '=', 'motor.id')
            ->select('motor_kota.*', 'kota.nama as kota_nama', 'motor.nama as motor_nama')
            ->orderByDesc('motor_kota.id')
            ->get();

        $kota = Kota::all();
        $motor = Motor::all();

        return response()->json($kota, $motor);
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
        $validator = Validator::make($request->all(), [
            'kota' => 'required',
            'motor' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $existingRecord = MotorKota::where([
                'id_kota' => $request->input('kota'),
                'id_motor' => $request->input('motor'),
                'harga_otr' => $request->input('harga'),
            ])->first();

            if ($existingRecord) {
                flash()->addError("Data motor dan kota sudah ada!");
                return redirect()->back()->withInput();
            }

            MotorKota::firstOrCreate([
                'id_kota' => $request->input('kota'),
                'id_motor' => $request->input('motor'),
            ]);

            flash()->addSuccess("Motor berhasil ditambahkan ke kota");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("Gagal membuat data, pastikan sudah benar!");
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
        $validator = Validator::make($request->all(), [
            'kota' => 'required',
            'motor' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $motorKota = MotorKota::findOrFail($id);
            $motorKota->id_kota = $request->input('kota');
            $motorKota->id_motor = $request->input('motor');
            $motorKota->harga_otr = $request->input('harga');
            $motorKota->save();
            flash()->addSuccess("Berhasil merubah data!");
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError("Gagal merubah data!");
            return redirect()->back()->withErrors($validator)->withInput();
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
        try {
            $motorKota = MotorKota::findOrFail($id);
            $motorKota->delete();
            flash()->addSuccess("Berhasil menghapus data!");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("$motorKota->name tidak bisa dihapus karena data digunakan oleh data lain!");
            return redirect()->back();
        }
    }
}
