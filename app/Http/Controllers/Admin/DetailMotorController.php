<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestMotor;
use App\Models\ColorModel;
use App\Models\DetailMotor;
use App\Models\Merk;
use App\Models\Motor;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DetailMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $motors = DetailMotor::orderBy('id', 'desc')->get();
        $dataMotor = Motor::all();
        $colors = ColorModel::all();
        return view('admin.detail-motor.index', [
            'motors' => $motors,
            'dataMotor' => $dataMotor,
            'colors' => $colors
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
            'warna-motor' => 'required',
            'model' => 'required',
            'gambar-motor' => 'required|mimes:jpeg,png,jpg,webp',
        ], [
            'gambar-motor.required' => 'gambar tidak boleh kosong !',
            'model.required' => 'motor tidak boleh kosong !',
            'warna-motor.required' => 'warna motor tidak boleh kosong !',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Periksa apakah gambar diunggah
            if ($request->hasFile('gambar-motor')) {
                // Mengambil file gambar yang diunggah
                $gambar = $request->file('gambar-motor');

                // Generate nama unik untuk gambar dengan menggunakan tanggal
                $waktu = Carbon::now();
                $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

                // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/custom/hook/)
                $gambar->move(public_path('assets/images/detail-motor/'), $gambarName);
            }

            $motor = DetailMotor::create([
                'id_color' => $request->input('warna-motor'),
                'gambar' => $gambarName,
                'id_motor' => $request->input('model'),
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
        // $motor = Motor::where('id', $id)->get();
        // $merk_motor = Merk::all();
        // $tipe_motor = Type::all();
        // $kategori_best_motor = BestMotor::all();

        // return view('admin.motor.edit', [
        //     'motor' => $motor,
        //     'merk_motor' => $merk_motor,
        //     'tipe_motor' => $tipe_motor,
        //     'kategori_best_motor' => $kategori_best_motor,
        // ]);
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
            'warna-motor' => 'required',
            'gambar-motor' => 'nullable|mimes:jpeg,png,jpg,webp',
        ], ['gambar-motor.mimes' => 'Format gambar tidak valid!']);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $motor = DetailMotor::findOrFail($id);

            // Periksa apakah ada file gambar yang diunggah
            if ($request->hasFile('gambar-motor')) {
                // Mengambil file gambar yang diunggah
                $gambar = $request->file('gambar-motor');

                // Generate nama unik untuk gambar dengan menggunakan tanggal
                $waktu = Carbon::now();
                $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

                // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/detail-motor/)
                $gambar->move(public_path('assets/images/detail-motor/'), $gambarName);

                // Hapus gambar lama jika ada
                if ($motor->gambar) {
                    // Pastikan Anda menghapus gambar yang lama dari direktori
                    $gambarLama = public_path('assets/images/detail-motor/' . $motor->gambar);
                    if (file_exists($gambarLama)) {
                        unlink($gambarLama);
                    }
                }

                // Update kolom gambar dengan nama gambar yang baru
                $motor->update([
                    'gambar' => $gambarName,
                ]);
            }

            // Update data lainnya
            $motor->update([
                'id_color' => $request->input('warna-motor'),
            ]);

            flash()->addSuccess("Motor $motor->nama berhasil diperbarui");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("Gagal memperbarui data pastikan sudah benar!");
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
        $motor = DetailMotor::findOrFail($id);
        try {
            $gambarLama = public_path('assets/images/detail-motor/' . $motor->gambar);
            if (file_exists($gambarLama)) {
                unlink($gambarLama);
            }
            $motor->delete();
            flash()->addSuccess("Berhasil menghapus motor!");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("$motor->name tidak bisa dihapus karena data digunakan oleh data lain!");
            return redirect()->back();
        }
    }
}
