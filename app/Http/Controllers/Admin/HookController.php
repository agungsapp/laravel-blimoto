<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hook;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class HookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'hooks' => Hook::all()
        ];


        return view('admin.hook.index', $data);
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
        //
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'required|url|max:255',
            'caption' => 'required|string|max:255',
            'warna' => 'required|string|max:7', // Sesuaikan dengan panjang HEX
            'warna_teks' => 'required|string|max:7', // Sesuaikan dengan panjang HEX
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Sesuaikan dengan jenis dan ukuran gambar
        ], [
            'nama.required' => 'Kolom Nama harus diisi.',
            'link.required' => 'Kolom Link harus diisi dengan URL yang valid.',
            'caption.required' => 'Kolom Teks Tombol harus diisi.',
            'warna.required' => 'Kolom Warna Background harus diisi dengan format HEX.',
            'warna_teks.required' => 'Kolom Warna Teks harus diisi dengan format HEX.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);



        try {
            // Periksa apakah gambar diunggah
            if ($request->hasFile('gambar')) {
                // Mengambil file gambar yang diunggah
                $gambar = $request->file('gambar');

                // Generate nama unik untuk gambar dengan menggunakan tanggal
                $waktu = Carbon::now();
                $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

                // Pindahkan gambar ke direktori yang sesuai (misalnya, public/assets/images/custom/hook/)
                $gambar->move(public_path('assets/images/custom/hook/'), $gambarName);

                // Perbarui nama gambar di kolom 'gambar' pada model Anda
                $hook = Hook::find($id);
                $hook->gambar = $gambarName;
                $hook->save();
            }

            // Perbarui data lainnya
            $hook = Hook::find($id);
            $hook->nama = $request->input('nama');
            $hook->link = $request->input('link');
            $hook->caption = $request->input('caption');
            $hook->warna = $request->input('warna');
            $hook->warna_teks = $request->input('warna_teks');
            $hook->save();

            flash()->addSuccess("Data hook berhasil diupdate");
            return redirect()->route('admin.hook.index');
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError("Data hook gagal di update");
            return redirect()->route('admin.hook.index');
        }



        // Redirect atau tampilkan pesan sukses sesuai kebutuhan

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
