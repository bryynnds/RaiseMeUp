<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jumlah_penarikan' => 'required|integer|min:10000',
            'metode_penarikan' => 'required|in:gopay,dana,ovo',
        ]);

        $user = Auth::user();

        if (!$user || !$user->creatorProfile) {
            return back()->with('error', 'Hanya kreator yang dapat melakukan penarikan.');
        }

        $saldo = $user->creatorProfile->total_income;

        if ($request->jumlah_penarikan > $saldo) {
            return back()->with('error', 'Saldo tidak mencukupi.');
        }

        // Kurangi saldo
        $user->creatorProfile->decrement('total_income', $request->jumlah_penarikan);

        // Simpan riwayat penarikan
        Withdrawal::create([
            'creator_id' => $user->id,
            'metode_penarikan' => $request->metode_penarikan,
            'jumlah_penarikan' => $request->jumlah_penarikan,
            'status' => 'settlement',
        ]);

        return redirect(route("profile_creator"))->with('success', 'Penarikan berhasil diajukan.');
    }
}
