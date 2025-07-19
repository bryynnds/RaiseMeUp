<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // cek role admin
            if (Auth::guard('admin')->user()->role === 'admin') {
                return redirect()->intended('/admin');
            } else {
                Auth::guard('admin')->logout();
                return back()->withErrors(['email' => 'Anda bukan admin.']);
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
