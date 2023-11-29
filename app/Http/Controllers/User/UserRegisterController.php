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
        //
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

        $otp = $this->generateOTP();

        User::create([
            'nama' => $request->nama,
            'nomor_hp' => $request->nohp,
            'kode_otp' => $otp,
            'is_verified' => 0,
        ]);

        $data = [
            'nomor' => $request->nohp,
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
        $nomor = $request->nomor;
        $otp = $request->otp;

        $user = User::where('nomor_hp', $nomor)->first();

        if ($user && $user->otp == $otp) {
            $user->verified = 1;
            $user->kode_otp = 0000;
            $user->save();

            Auth::login($user); // Log in the user



            return redirect()->to(route('home.index'));
        } else {
            return redirect()->to(route('register.store'))->withErrors(['otp' => 'Masukan OTP dengan benar.']);
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
}
