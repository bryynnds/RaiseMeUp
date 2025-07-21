<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Donation;
use App\Models\Transaction;
use Carbon\Carbon;

class SupporterController extends Controller
{
    private function fakeGradient()
    {
        $gradients = [
            'from-purple-500 to-pink-500',
            'from-blue-500 to-cyan-500',
            'from-indigo-500 to-violet-500',
        ];
        return $gradients[array_rand($gradients)];
    }

    public function profile()
    {
        $user = Auth::user();

        // Ambil data profil kreator (pastikan relasi supporterProfile tersedia)
        $supporter = $user->supporterProfile;

        $riwayatDonasi = Donation::with(['creator.creatorProfile', 'transactions'])
            ->where('supporter_id', $user->id)
            ->whereHas('transactions', function ($query) {
                $query->where('status', 'settlement');
            })
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($item) {
                return [
                    'nama' => $item->creator->creatorProfile->nickname ?? 'Tanpa Nama',
                    'username' => '@' . $item->creator->name,
                    'tanggal' => Carbon::parse($item->created_at)->translatedFormat('d F Y'),
                    'jam' => Carbon::parse($item->created_at)->format('H:i') . ' WIB',
                    'amount' => 'Rp ' . number_format($item->amount, 0, ',', '.'),
                    'gradient' => $this->fakeGradient(),
                    'pp_url' => $item->creator->creatorProfile->pp_url ?? null,
                    'pesan' => $item->message ?? '-',
                ];
            });


        return view('supporter.profile', compact('supporter', 'riwayatDonasi'));
    }
}
