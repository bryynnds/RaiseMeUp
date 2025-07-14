<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\OtpMail;
use App\Models\User;
use App\Models\CreatorProfile;

class CreatorRegisterController extends Controller
{
    /* --------------------------------------------------------
     | 1.  TAMPILKAN FORM REGISTER CREATOR
     * --------------------------------------------------------*/
    public function showForm()
    {
        return view('public.creator');   // resources/views/public/creator.blade.php
    }

    /* --------------------------------------------------------
     | 2.  KIRIM OTP & REDIRECT KE HALAMAN OTP (POST)
     * Route: POST /register/creator  → name: creator.register.otp
     * --------------------------------------------------------*/
    public function sendOtp(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'job'      => 'nullable|string|max:255',
            
        ]);
        
        $data['role'] = 'kreator'; // tambahkan


        /* generate 6‑digit OTP */
        // semula
        // $otp = rand(100000, 999999);
        $otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);


        /* kirim email OTP */
        Mail::to($data['email'])->send(new OtpMail($otp, $data['username']));

        /* simpan semua data ke SESSION sampai OTP diverifikasi */
        session([
            'pending_user' => $data,          // data form
            'pending_otp'  => $otp,           // kode otp
            'otp_expires'  => now()->addMinutes(5),
        ]);

        return redirect()->route('creator.otp.form')
            ->with('status', 'OTP telah dikirim ke email Anda.');
    }

    /* --------------------------------------------------------
     | 3.  TAMPILKAN FORM OTP
     * Route: GET /register/otp → name: otp.form
     * --------------------------------------------------------*/
    public function showOtpForm()
    {
        // Kalau tidak ada session pending, balik ke form register
        if (!session()->has('pending_user')) {
            return redirect()->route('creator.register.form');
        }

        return view('public.otp');       // resources/views/public/otp.blade.php
    }

    /* --------------------------------------------------------
     | 4.  VERIFIKASI OTP & SIMPAN USER
     * Route: POST /register/otp → name: otp.verify
     * --------------------------------------------------------*/
    /* Ganti seluruh method verifyOtp dengan yang baru */
    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        /* ---------- SESSION MASIH ADA? ---------- */
        if (!session()->has('pending_user')) {
            return $this->jsonOrRedirect(
                ['status' => 'no_session'],
                route('creator.register.form'),
                'Session OTP tidak ditemukan.'
            );
        }

        /* ---------- OTP EXPIRED? ---------- */
        if (now()->gt(session('otp_expires'))) {
            session()->forget(['pending_otp', 'otp_expires']);   // biarkan pending_user agar bisa resend
            return $this->jsonOrRedirect(
                ['status' => 'expired'],
                url()->previous(),
                'Kode OTP kadaluarsa.'
            );
        }

        /* ---------- OTP SALAH? ---------- */
        if (! hash_equals((string) session('pending_otp'), (string) $request->otp)) {
            return $this->jsonOrRedirect(
                ['status' => 'incorrect'],
                url()->previous(),
                'Kode OTP salah.'
            );
        }



        /* ---------- OTP VALID ---------- */
        $data = session('pending_user');

        $user = User::create([
            'name'     => $data['username'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'kreator',
        ]);

        $user->assignRole('kreator');

        CreatorProfile::create([
            'creator_id' => $user->id,
            'job'        => $data['job'],
        ]);

        // bersihkan semua session OTP
        session()->forget(['pending_user', 'pending_otp', 'otp_expires']);

        return $this->jsonOrRedirect(
            ['status' => 'success', 'redirect' => route('login')],
            route('login'),
            'Registrasi berhasil! Silakan login.'
        );
    }


    /* --------------------------------------------------------
 | 5.  KIRIM ULANG OTP  (AJAX dari halaman OTP)
 * Route: POST /register/otp/resend → name: otp.resend
 * --------------------------------------------------------*/
    public function resendOtp(Request $request)
    {
        if (!session()->has('pending_user')) {
            return response()->json(['message' => 'Session OTP tidak ditemukan.'], 422);
        }

        $data = session('pending_user');

        /* ganti rand() → string 6‑digit */
        $otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        Mail::to($data['email'])->send(new OtpMail($otp, $data['username']));

        session([
            'pending_otp' => $otp,                 // ⬅️ string
            'otp_expires' => now()->addMinutes(5),
        ]);

        return response()->json(['message' => 'Kode OTP baru telah dikirim ✨']);
    }


    // Tambahkan helper kecil di dalam class (letakkan di bawah function resendOtp atau di mana saja)
    private function jsonOrRedirect(array $json, string $redirectUrl, string $flashMsg)
    {
        /*  Kalau request‑nya AJAX / expectsJson → balas JSON
        Kalau bukan, pakai alur lama (redirect + flash error)   */
        return request()->expectsJson()
            ? response()->json($json)
            : redirect($redirectUrl)->withErrors($flashMsg);
    }
}
