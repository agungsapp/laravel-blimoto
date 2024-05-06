<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
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
        return view('user.auth.login');
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
        return  "ini store";
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function requestOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nohp' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $nomor = $this->formatNohp($request->input('nohp'));

        // dd($nomor);



        $otp = $this->generateOTP();
        // dd($nomor);
        try {
            //code...
            $user = User::firstOrNew([
                'nomor_hp' => $nomor,
            ]);

            if (!$user->exists) {
                // User already exists with the provided phone number
                // You can handle this situation, for example, by redirecting back with an error message
                return redirect()->back()->withErrors(['nohp' => 'User dengan nomor ini belum terdaftar']);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        // Save OTP to user record in the database
        $user = User::where('nomor_hp', $nomor)->first();
        if (!$user) {
            return redirect()->back();
        }
        $user->update([
            'kode_otp' => $otp,
            'otp_expire' => now()->addMinutes(5),
        ]);

        // Send OTP to the user (using Twilio as an example)
        // $this->sendOTP($nomor, $otp);
        Session::put('verified_nomor', $nomor);
        return view('user.auth.verifikasi_login', [
            'otp' => $otp,
            'nomor' => $nomor
        ]);
    }

    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp_user' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $nomor = $this->formatNohp(Session::get('verified_nomor'));
        $otp = $request->input('otp_user');

        // Retrieve the user by phone number and OTP
        $user = User::where('nomor_hp', $nomor)
            ->where('kode_otp', $otp)
            ->where('otp_expire', '>', now())
            ->first();

        if (!$user) {
            // Invalid OTP or expired
            return redirect()->back()->withErrors(['otp_user' => 'Invalid OTP or expired.'])->withInput();
        }

        // Log in the user
        Auth::login($user);

        // Clear the OTP-related fields in the user record
        $user->update([
            'kode_otp' => null,
            'otp_expire' => null,
        ]);

        // Redirect to the dashboard or any desired page after successful login
        return redirect()->route('/');
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

    private function formatNohp($nohp)
    {
        // Check if the phone number starts with '08'
        if (substr($nohp, 0, 2) === '08') {
            return '62' . substr($nohp, 1);
        }
        // Check if the phone number starts with '8'
        elseif (substr($nohp, 0, 1) === '8') {
            return '62' . $nohp;
        }
        // Check if the phone number starts with '0'
        elseif (substr($nohp, 0, 1) === '0') {
            return '62' . substr($nohp, 1);
        }
        // If it doesn't start with '0', '08', or '8', assume it's already in the correct format
        return $nohp;
    }
}
