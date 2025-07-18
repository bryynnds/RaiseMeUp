<?php

// app/Http/Controllers/DonationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;

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
}
