<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailUserModel;
use App\Models\Kota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user = auth()->user();

        // Menggunakan metode with untuk menggabungkan relasi 'detailUser'
        $userWithDetails = User::with('detailUser')->find($user->id);

        // dd($userWithDetails);
        $data = [
            'userDetail' => $userWithDetails,
            'kota' => Kota::all(),
        ];

        return view('user.profile.index', $data);
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
        $id = auth()->user()->id;

        // Validasi request untuk memastikan file yang diunggah adalah gambar
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan jenis gambar yang diizinkan dan ukuran maksimum yang diinginkan
        ]);

        $user = User::find($id);

        // Mengambil file foto yang diunggah oleh pengguna
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->path_image) {
                $oldPhotoPath = public_path('assets/images/profile/' . $user->path_image);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $photo = $request->file('photo');

            // Generate nama unik untuk file foto
            $photoName = 'profil_' . $request->name . time() . '.' . $photo->getClientOriginalExtension();

            // Menyimpan file foto ke dalam direktori public/assets/images/profil
            $photo->move(public_path('assets/images/profile'), $photoName);

            // Update kolom 'foto' dalam database dengan nama foto yang baru
            $user->path_image = $photoName;
        }

        // Update data pengguna lainnya
        $user->nama = $request->name;
        $user->lokasi = $request->kota;
        $user->email = $request->email;
        $user->alamat = $request->alamat;

        if ($user->update()) {
            return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui profil');
        }


        // User::find()
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
        // Validasi request
        $validatedData = $request->validate([
            'nomor_hp' => 'required',
            'email' => 'required|email',
            'jk' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            // validasi lain jika diperlukan
        ]);

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            // Update nomor HP jika berbeda
            if ($user->nomor_hp != $request->nomor_hp) {
                $user->nomor_hp = $request->nomor_hp;
            }

            // Handle upload gambar
            if ($request->hasFile('photo')) {
                // Hapus gambar lama jika ada
                if ($user->path_image && file_exists(public_path('assets/images/profile/') . $user->path_image)) {
                    unlink(public_path('assets/images/profile/') . $user->path_image);
                }

                $gambar = $request->file('photo');
                $randomString = Str::random(10);
                $gambarName = $randomString . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('assets/images/profile/'), $gambarName);

                $user->path_image = $gambarName;
            }

            $user->save();

            $data = [
                'id_kota' => $request->kota,
                'email' => $request->email,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
            ];

            // Menggunakan updateOrCreate untuk mengupdate atau membuat DetailUser
            DetailUserModel::updateOrCreate(
                ['id_user' => $id], // Kunci pencarian
                $data               // Data untuk update atau create
            );

            DB::commit();

            return redirect()->to(route('profil.index'))->with('success', 'Profil berhasil diperbarui');
        } catch (\Throwable $th) {
            DB::rollBack();
            // Handle error, misalnya dengan redirect dan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui profil');
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
