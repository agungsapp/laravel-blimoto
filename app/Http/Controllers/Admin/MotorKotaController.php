<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Motor;
use App\Models\MotorKota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class MotorKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dataTable(Request $request)
    {
        // Ambil parameter filter dari request
        $filterKota = $request->input('kota');
        $filterTenor = $request->input('motor');

        // Mulai query
        $motorKotaQuery = MotorKota::with(['motor', 'kota'])
            ->orderBy('id', 'desc');

        // Terapkan filter jika tersedia
        if (!empty($filterKota)) {
            $motorKotaQuery->whereHas('lokasi', function ($query) use ($filterKota) {
                $query->where('nama', $filterKota);
            });
        }

        if (!empty($filterTenor)) {
            $motorKotaQuery->where('motor', $filterTenor);
        }

        // Dapatkan hasil query
        $motorKota = $motorKotaQuery->get();

        // Ubah format
        $motorKota->map(function ($d) {
            $d->lokasi = $d->kota->nama;
            $d->harga_otr = Str::rupiah($d->harga_otr);
            $d->diskon_cash = Str::rupiah($d->diskon_cash);
        });

        // Kirim data ke DataTables
        return DataTables::of($motorKota)
            ->filter(function ($instance) use ($request) {
                if (!empty($request->get('search')['value'])) {
                    $search = $request->get('search')['value'];
                    $instance->collection = $instance->collection->filter(function ($row) use ($search) {
                        Log::info($row);
                        return (strpos(Str::lower($row['motor']['nama']), Str::lower($search)) !== false)
                            || (strpos(Str::lower($row['kota']['nama']), Str::lower($search)) !== false);
                    });
                }
            })
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('admin.motor-kota.tombol', compact('data'));
            })
            ->make(true);
    }


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
            'diskon_cash' => 'required',
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
                'diskon_cash' => $request->input('diskon_cash'),
            ])->first();

            if ($existingRecord) {
                flash()->addError("Data motor dan kota sudah ada!");
                return redirect()->back()->withInput();
            }

            MotorKota::firstOrCreate([
                'id_kota' => $request->input('kota'),
                'id_motor' => $request->input('motor'),
                'harga' => $request->input('harga'),
                'diskon_cash' => $request->input('diskon_cash'),
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
        try {
            $motorKota = MotorKota::findOrFail($id);
            return response()->json($motorKota, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'error saat mengambil data id tidak ditemukan'], 401);
        }
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
            'diskon_cash' => 'required',
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
            $motorKota->diskon_cash = $request->input('diskon_cash');
            $motorKota->save();
            flash()->addSuccess("Berhasil merubah data!");
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError("Gagal merubah data!");
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    // THSFK - 
    public function storeCustom(Request $request)
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

    // THSFK
    public function updateCustom(Request $request, $id)
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
            return response()->json(['message' => 'berhasil'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error'], 400);
        }
    }
}
