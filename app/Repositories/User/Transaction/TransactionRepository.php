<?php

namespace App\Repositories\User\Transaction;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class TransactionRepository
{
    public function all()
    {
        return Transaction::all();
    }

    public function searchByName($name, $perPage)
    {
        return Transaction::select('transactions.*', 'users.name as user_name', 'memberships.name as membership_name')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('memberships', 'transactions.membership_id', '=', 'memberships.id')
            ->where('users.name', 'like', "%$name%")
            ->orWhere('memberships.name', 'like', "%$name%")
            ->paginate($perPage);
    }

    public function findOrFail($id)
    {
        return Transaction::findOrFail($id);
    }

    public function create(array $data)
    {
        // $start_date = Carbon::now();
        // $finish_date = $start_date->copy()->addDays(29);
        // $membership_active = !$finish_date->isPast();
        $user = Auth::user();

        $transaction = Transaction::create([
            // 'start_date' => $start_date,
            // 'finish_date' => $finish_date,
            'user_id' => $user->id,
            'membership_id' => $data['membership_id'],
            'status' => 'pending',
            // 'membership_active' => $membership_active
        ]);

        $snapToken = $this->generateSnapToken($transaction);

        $transaction->update(['snap_token' => $snapToken]);

        return $transaction;
    }

    public function generateSnapToken(Transaction $transaction)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $snapToken = \Midtrans\Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => $transaction->membership->price,
            ],
            'item_details' => [
                [
                    'id' => $transaction->membership->id,
                    'price' => $transaction->membership->price,
                    'quantity' => 1,
                    'name' => $transaction->membership->name
                ]
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
                'phone' => $transaction->user->phone
            ],
        ]);

        return $snapToken;
    }

    public function handleCallback($request)
    {
        $serverKey = config('midtrans.serverKey');

        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $start_date = Carbon::now();
                $finish_date = $start_date->copy()->addDays(29);
                $membership_active = !$finish_date->isPast();

                $transaksi = Transaction::find($request->order_id);

                $transaksi->update(['status' => 'success', 'start_date' => $start_date, 'finish_date' => $finish_date, 'membership_active' => $membership_active]);

                $roleName = 'Member-' . $transaksi->membership->name;
                $role = Role::where('name', $roleName)->first();
                if ($role) {
                    $transaksi->user->assignRole($roleName);
                }
            } elseif ($request->transaction_status == 'deny' || $request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
                $transaksi = Transaction::find($request->order_id);
                $transaksi->update(['status' => 'failed']);
            }
        }
    }

    public function update(array $data, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update($data);
        return $transaction;
    }


    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        if ($transaction->membership_active) {
            $roleName = 'Member-' . $transaction->membership->name;
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $transaction->user->removeRole($roleName);
            }
        }
        $transaction->delete();
        return $transaction;
    }

    public function nonActiveMembership($id){
        $transaction = Transaction::find($id);

        return $transaction->update(['membership_active' => false]);
    }
}
