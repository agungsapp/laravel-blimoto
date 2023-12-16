<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestMotor;
use App\Models\Merk;
use App\Models\Motor;
use App\Models\MtrBestMotor;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $motors = DB::table('motor')
                ->join('merk', 'motor.id_merk', '=', 'merk.id')
                ->join('type', 'motor.id_type', '=', 'type.id')
                ->leftJoin('mtr_motor_best', 'motor.id', '=', 'mtr_motor_best.id_motor')
                ->leftJoin('best_motor', 'best_motor.id', '=', 'mtr_motor_best.id_best_motor')
                ->select('motor.id', 'motor.stock', 'motor.nama', 'merk.nama as merk_nama', 'type.nama as type_nama', 'motor.harga', 'best_motor.nama as best_motor_name', 'mtr_motor_best.id_best_motor')
                ->get();

            return DataTables::of($motors)
                ->addColumn('action', function ($motor) {
                    return '<div class="d-flex justify-content-between">
                                <a href="' . route('admin.motor.edit', ['motor' => $motor->id, 'id_best_motor' => $motor->id_best_motor]) . '" class="btn btn-warning">Edit</a>
                                <form action="' . route('admin.motor.destroy', $motor->id) . '" method="post">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <input type="hidden" name="id_best_motor" value="' . (isset($motor->mtr_motor_best) ? $motor->mtr_motor_best->id_best_motor : '') . '">
                                    <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                </form>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $merk_motor = Merk::all();
        $tipe_motor = Type::all();
        $kategori_best_motor = BestMotor::all();
        return view('admin.motor.index', [
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
            'harga' => 'required',
            'deskripsi-motor' => 'required',
            'fitur-motor' => 'required',
            'bonus-motor' => 'required',
            'merk-motor' => 'required',
            'tipe-motor' => 'required',
        ]);

        $kategori_best_motor = $request->input('kategori-best-motor') ?? 1;
        $stock = $request->input('stock-motor') ?? 1;

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $motor = Motor::create([
                'nama' => $request->input('nama'),
                'harga' => $request->input('harga'),
                'deskripsi' => $request->input('deskripsi-motor'),
                'fitur_utama' => $request->input('fitur-motor'),
                'bonus' => $request->input('bonus-motor'),
                'id_merk' => $request->input('merk-motor'),
                'id_type' => $request->input('tipe-motor'),
                'stock' => $stock,
            ]);

            MtrBestMotor::create([
                'id_motor' => $motor->id,
                'id_best_motor' => $kategori_best_motor,
            ]);

            flash()->addSuccess("Motor $motor->nama berhasil dibuat");
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
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
        $motor = Motor::where('motor.id', $id)->get();
        $merk_motor = Merk::all();
        $tipe_motor = Type::all();
        $kategori_best_motor = BestMotor::all();
        $id_best_motor = intval(request('id_best_motor'));

        return view('admin.motor.edit', [
            'motor' => $motor,
            'merk_motor' => $merk_motor,
            'tipe_motor' => $tipe_motor,
            'kategori_best_motor' => $kategori_best_motor,
            'id_best_motor' => $id_best_motor,
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
            'harga' => 'required',
            'deskripsi_motor' => 'required',
            'fitur_motor' => 'required',
            'bonus_motor' => 'required',
            'merk_motor' => 'required',
            'tipe_motor' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        $kategori_best_motor = $request->input('kategori-best-motor') ?? 1;
        $stock = $request->input('stock-motor') ?? 1;
        try {
            $motor = Motor::findOrFail($id);
            $kategoriBestMotor = MtrBestMotor::where('id_motor', $id)->firstOrFail();
    
            $motor->nama = $request->nama;
            $motor->harga = $request->harga;
            $motor->deskripsi = $request->deskripsi_motor;
            $motor->fitur_utama = $request->fitur_motor;
            $motor->bonus = $request->bonus_motor;
            $motor->id_merk = $request->merk_motor;
            $motor->id_type = $request->tipe_motor;
            $motor->stock = $stock;
            $kategoriBestMotor->id_best_motor = $kategori_best_motor;
    
            $motor->save();
            $kategoriBestMotor->save();
            flash()->addSuccess("Berhasil merubah motor!");
            return redirect()->to(route('admin.motor.index'));
        } catch (\Exception $e) {
            flash()->addSuccess("Gagal merubah data silahkan cek kembali inputan!");
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
        try {
            $kategoriBestMotor = MtrBestMotor::where('id_motor', $id)->firstOrFail();
            $kategoriBestMotor->delete();
            $motor = Motor::findOrFail($id);
            $motor->delete();
            flash()->addSuccess("Berhasil menghapus motor!");
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError("Tidak bisa dihapus karena data digunakan oleh data lain!");
            return redirect()->back();
        }
    }

    public function getHarga($id)
    {
        try {
            $motor = Motor::findOrFail($id);
            return response()->json([
                'message' => 'success',
                'data' => $motor
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'fail motor not found',
            ], 404);
        }
    }
}
