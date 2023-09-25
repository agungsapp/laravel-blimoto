<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestMotor;
use App\Models\Merk;
use App\Models\Motor;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $motors = DB::table('motor')
            ->join('merk', 'motor.id_merk', '=', 'merk.id')
            ->join('type', 'motor.id_type', '=', 'type.id')
            ->select('motor.id', 'motor.nama', 'merk.nama as merk_nama', 'type.nama as type_nama', 'motor.harga')
            ->get();

        $merk_motor = Merk::all();
        $tipe_motor = Type::all();
        $kategori_best_motor = BestMotor::all();
        return view('admin.motor.index', [
            'motors' => $motors,
            'merk_motor' => $merk_motor,
            'tipe_motor' => $tipe_motor,
            'kategori_best_motor' => $kategori_best_motor,
        ]);
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
            'nama' => 'required',
            'berat' => 'required',
            'power' => 'required',
            'harga' => 'required',
            'deskripsi-motor' => 'required',
            'fitur-motor' => 'required',
            'merk-motor' => 'required',
            'tipe-motor' => 'required',
        ]);

        $kategori_best_motor = $request->input('kategori-best-motor') || 1;

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $motor = Motor::create([
                'nama' => $request->input('nama'),
                'berat' => $request->input('berat'),
                'power' => $request->input('power'),
                'harga' => $request->input('harga'),
                'deskripsi' => $request->input('deskripsi-motor'),
                'fitur_utama' => $request->input('fitur-motor'),
                'id_merk' => $request->input('merk-motor'),
                'id_type' => $request->input('tipe-motor'),
                'id_best_motor' => $kategori_best_motor,
            ]);
            flash()->addSuccess("Motor $motor->nama berhasil dibuat");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("Gagal membuat data pastikan sudah benar!");
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
        $motor = Motor::where('id', $id)->get();
        $merk_motor = Merk::all();
        $tipe_motor = Type::all();
        $kategori_best_motor = BestMotor::all();

        // dd($motor);

        return view('admin.motor.edit', [
            'motor' => $motor,
            'merk_motor' => $merk_motor,
            'tipe_motor' => $tipe_motor,
            'kategori_best_motor' => $kategori_best_motor,
        ]);
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
            'nama' => 'required',
            'berat' => 'required',
            'power' => 'required',
            'harga' => 'required',
            'deskripsi_motor' => 'required',
            'fitur_motor' => 'required',
            'merk_motor' => 'required',
            'tipe_motor' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        $kategori_best_motor = $request->input('kategori-best-motor') || 1;
        $motor = Motor::findOrFail($id);
        $motor->nama = $request->nama;
        $motor->berat = $request->berat;
        $motor->power = $request->power;
        $motor->harga = $request->harga;
        $motor->deskripsi = $request->deskripsi_motor;
        $motor->fitur_utama = $request->fitur_motor;
        $motor->id_merk = $request->merk_motor;
        $motor->id_type = $request->tipe_motor;
        $motor->id_best_motor = $kategori_best_motor;

        $motor->save();
        flash()->addSuccess("Berhasil merubah motor!");
        return redirect()->to(route('admin.motor.index'));
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
            $motor = Motor::findOrFail($id);
            $motor->delete();
            flash()->addSuccess("Berhasil menghapus motor!");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("$motor->name tidak bisa dihapus karena data digunakan oleh data lain!");
            return redirect()->back();
        }
    }
}
