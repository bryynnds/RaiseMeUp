<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->email;
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Email tidak ditemukan'], 404);
        }

        $otp = rand(100000, 999999);

        DB::table('password_otps')->updateOrInsert(
            ['email' => $email],
            [
                'otp' => $otp,
                'expired_at' => now()->addMinutes(5),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // Kirim OTP ke email
        Mail::raw("Kode OTP Anda: $otp", function ($message) use ($email) {
            $message->to($email)
                ->subject('Kode OTP Reset Password');
        });

        return response()->json(['status' => 'success', 'message' => 'OTP telah dikirim']);
    }

    public function showChangeForm(Request $request)
    {
        $email = $request->query('email');
        return view('public.change', compact('email'));
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        $otpRecord = DB::table('password_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$otpRecord) {
            return response()->json(['status' => 'error', 'message' => 'OTP tidak cocok'], 401);
        }

        if (Carbon::parse($otpRecord->expired_at)->isPast()) {
            return response()->json(['status' => 'error', 'message' => 'OTP sudah kadaluarsa'], 410);
        }

        // OTP valid
        return response()->json(['status' => 'success', 'message' => 'OTP valid, silakan ganti password']);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
            'password' => 'required|min:6|confirmed',
        ]);

        $otpRecord = DB::table('password_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$otpRecord || Carbon::parse($otpRecord->expired_at)->isPast()) {
            return response()->json(['status' => 'error', 'message' => 'OTP tidak valid atau kadaluarsa'], 401);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User tidak ditemukan'], 404);
        }

        // Ganti password
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus OTP
        DB::table('password_otps')->where('email', $request->email)->delete();

        return response()->json(['status' => 'success', 'message' => 'Password berhasil diubah']);
    }
}
