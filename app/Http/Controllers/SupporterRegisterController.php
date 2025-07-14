<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\OtpMail;
use App\Models\User;
use App\Models\SupporterProfile;

class SupporterRegisterController extends Controller
{
    public function showForm()
    {
        return view('public.supporter');
    }

    public function sendOtp(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $data['role'] = 'supporter'; // tambahkan


        $otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        Mail::to($data['email'])->send(new OtpMail($otp, $data['username']));

        session([
            'pending_user' => $data,
            'pending_otp'  => $otp,
            'otp_expires'  => now()->addMinutes(5),
            'register_as'  => 'supporter',
        ]);

        return redirect()->route('supporter.otp.form')->with('status', 'OTP telah dikirim ke email Anda.');
    }

    public function showOtpForm()
    {
        // Kalau tidak ada session pending, balik ke form register
        if (!session()->has('pending_user')) {
            return redirect()->route('supporter.register.form');
        }

        return view('public.otp');       // resources/views/public/otp.blade.php
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        if (!session()->has('pending_user')) {
            return $this->jsonOrRedirect(
                ['status' => 'no_session'],
                route('supporter.register.form'),
                'Session OTP tidak ditemukan.'
            );
        }

        if (now()->gt(session('otp_expires'))) {
            session()->forget(['pending_otp', 'otp_expires']);
            return $this->jsonOrRedirect(
                ['status' => 'expired'],
                url()->previous(),
                'Kode OTP kadaluarsa.'
            );
        }

        if (! hash_equals((string) session('pending_otp'), (string) $request->otp)) {
            return $this->jsonOrRedirect(
                ['status' => 'incorrect'],
                url()->previous(),
                'Kode OTP salah.'
            );
        }

        $data = session('pending_user');

        $user = User::create([
            'name'     => $data['username'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'supporter',
        ]);

        $user->assignRole('supporter');

        SupporterProfile::create([
            'supporter_id' => $user->id,
        ]);

        session()->forget(['pending_user', 'pending_otp', 'otp_expires', 'register_as']);

        return $this->jsonOrRedirect(
            ['status' => 'success', 'redirect' => route('login')],
            route('login'),
            'Registrasi berhasil! Silakan login.'
        );
    }

    public function resendOtp()
    {
        if (!session()->has('pending_user')) {
            return response()->json(['message' => 'Session OTP tidak ditemukan.'], 422);
        }

        $data = session('pending_user');

        $otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        Mail::to($data['email'])->send(new OtpMail($otp, $data['username']));

        session([
            'pending_otp' => $otp,
            'otp_expires' => now()->addMinutes(5),
        ]);

        return response()->json(['message' => 'Kode OTP baru telah dikirim ✨']);
    }

    private function jsonOrRedirect(array $json, string $redirectUrl, string $flashMsg)
    {
        return request()->expectsJson()
            ? response()->json($json)
            : redirect($redirectUrl)->withErrors($flashMsg);
    }
}
