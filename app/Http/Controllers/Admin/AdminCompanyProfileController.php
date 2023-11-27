<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfille;
use App\Models\Hook;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminCompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'com' => CompanyProfille::all()
        ];

        return view('admin.company-profile.index', $data);
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
            'nama' => 'required|string|max:255',
            'alamat' => 'required|max:255',
            'no' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        try {
            $gambar = $request->file('logo');
            $waktu = Carbon::now();
            $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('assets/images/logo/'), $gambarName);

            CompanyProfille::create([
                'nama_perusahaan' => $request->input('nama'),
                'no_wa' => $request->input('no'),
                'alamat' => $request->input('alamat'),
                'logo' => $gambarName,
            ]);

            flash()->addSuccess("Data company profile ditambah");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("Data gagal di tambah");
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
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|max:255',
            'no' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        try {
            $company = CompanyProfille::find($id);

            if ($request->hasFile('logo')) {

                $gambarLama = public_path('assets/images/logo/' . $company->logo);
                if (file_exists($gambarLama)) {
                    unlink($gambarLama);
                }
                $gambar = $request->file('logo');

                $waktu = Carbon::now();
                $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

                $gambar->move(public_path('assets/images/logo/'), $gambarName);
                $company->logo = $gambarName;
            }

            $company->nama_perusahaan = $request->input('nama');
            $company->alamat = $request->input('alamat');
            $company->no_wa = $request->input('no');

            $company->save();

            flash()->addSuccess("Data berhasil diupdate");
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError("Data gagal di update");
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
        $company = CompanyProfille::findOrFail($id);
        try {
            $gambarLama = public_path('assets/images/logo/' . $company->logo);
            if (file_exists($gambarLama)) {
                unlink($gambarLama);
            }
            $company->delete();
            flash()->addSuccess("Berhasil menghapus data!");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("$company->name_perusahaan tidak bisa dihapus karena data digunakan oleh data lain!");
            return redirect()->back();
        }
    }
}
