<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('user.auth.register');
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
        // Validate request data as needed

        $otp = $this->generateOTP();

        $nohp = $this->formatNohp($request->nohp);

        $valid = $request->validate([
            'nama' => 'required|string',
            'nohp' => 'required|numeric|unique:users,nomor_hp|min:10', // Add unique validation for the 'nomor_hp' column in the 'users' table
        ], [
            'nama.required' => 'nama tidak boleh kosong !',
            'nama.string' => 'nama harus berupa huruf !',
            'nohp.required' => 'nomor hp tidak boleh kosong !',
            'nohp.unique' => 'nomor yang anda masukan sudah pernah terdaftar',
            'nohp.min' => 'nomor harus memiliki panjang minimal 10 angka'
        ]);

        try {
            $user = User::firstOrNew([
                'nomor_hp' => $nohp,
            ]);

            if ($user->exists) {
                // User already exists with the provided phone number
                // You can handle this situation, for example, by redirecting back with an error message
                return redirect()->back()->with('error', 'User dengan nomor ini sudah terdaftar.');
            }

            // Set or update other user attributes
            $user->nama = $request->nama;
            $user->kode_otp = $otp;
            $user->is_verified = 0;
            $user->save();
        } catch (\Throwable $th) {
            // Handle exceptions if needed
            return redirect()->back()->with('error', 'Maaf, Terjadi kesalahan pada server.');
        }

        $data = [
            'nomor' => $nohp,
            'otp' => $otp,
        ];

        return view('user.auth.verifikasi', $data);
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
    public function edit()
    {
        return view('user.auth.verifikasi');
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


    public function verifikasi(Request $request)
    {
        $nomor = $request->input('nomor');
        $otp_user = intval($request->input('kode_otp'));

        $user = User::where('nomor_hp', $nomor)->first();

        // $kebenaran = $user->kode_otp == $otp_user;
        if ($user && $user->kode_otp == $otp_user) {
            $user->is_verified = 1;
            $user->kode_otp = 0000;
            $user->save();

            Auth::login($user); // Log in the user

            // Mengirim respons JSON dengan status code 200 (OK)
            return response()->json(['success' => true, 'message' => 'Token',], 200);
        } else {
            // Mengirim respons JSON dengan status code 422 (Unprocessable Entity)
            return response()->json(['success' => false, 'message' => 'Masukkan OTP dengan benar'], 422);
        }
    }

    private function generateOTP($length = 4)
    {
        $digits = '0123456789';
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= $digits[rand(0, strlen($digits) - 1)];
        }
        return $otp;
    }

    // Helper function to format the phone number
    private function formatNohp($nohp)
    {
        // Check if the phone number starts with '0'
        if (substr($nohp, 0, 1) === '0') {
            // Remove the leading '0' and add '62'
            return '62' . substr($nohp, 1);
        }

        // If it doesn't start with '0', assume it's already in the correct format
        return $nohp;
    }
}
