<?php

// app/Http/Controllers/DonationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction as MidtransTransaction;


class DonationController extends Controller
{
    public function getSnapToken(Request $request)
    {
        try {
            Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $amount = (int) str_replace(',', '', $request->amount);
            $message = $request->message;
            $creator_id = $request->creator_id;
            $supporter_id = Auth::id(); // ✅ FIXED

            $donation = Donation::create([
                'supporter_id' => $supporter_id,
                'creator_id' => $creator_id,
                'message' => $message,
                'amount' => $amount,
            ]);

            $transactionDetails = [
                'transaction_details' => [
                    'order_id' => 'DONATE-' . $donation->id . '-' . time(),
                    'gross_amount' => $amount,
                ],
                'customer_details' => [
                    'first_name' => $request->user()->name,
                    'email' => $request->user()->email,
                ],
            ];

            $snapToken = Snap::getSnapToken($transactionDetails);

            Transaction::create([
                'donation_id' => $donation->id,
                'snap_token' => $snapToken,
                'status' => 'pending'
            ]);

            return response()->json(['token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function handleSuccessTransaction(Request $request)
    {
        $orderId = $request->input('order_id');
        \Midtrans\Config::$serverKey = 'SB-Mid-server-1poqHyxFVvvR7tbuDBbhK95z';
        \Midtrans\Config::$isProduction = false;

        try {
            // Ambil status dari Midtrans berdasarkan order_id
            $status = MidtransTransaction::status($orderId);

            // Ambil donation_id dari order_id (asumsikan order_id = 'DONATE-{donation_id}-{timestamp}')
            preg_match('/^DONATE-(\d+)-/', $orderId, $matches);
            $donationId = $matches[1] ?? null;

            if (!$donationId) {
                return response()->json(['error' => true, 'message' => 'Invalid order_id format']);
            }

            // Temukan record transaksi
            $transaction = Transaction::where('donation_id', $donationId)->first();

            if (!$transaction) {
                return response()->json(['error' => true, 'message' => 'Transaksi tidak ditemukan']);
            }

            // Update kolom dari data Midtrans
            $transaction->midtrans_transaction_id = $status->transaction_id;
            $transaction->payment_method = $status->payment_type;
            $transaction->status = $status->transaction_status;
            $transaction->save();

            return response()->json(['success' => true, 'message' => 'Transaksi berhasil diupdate']);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Gagal mengambil status Midtrans']);
        }
    }
}
