<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\PencairanSaldo;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    public function penarikan()
    {
        $userId = Auth::user()->id;
        $statusPenarikan = PencairanSaldo::select(
            'users.name',
            'pencairan_saldo.status',
            'pencairan_saldo.jumlah',
            'pencairan_saldo.id'
        )
            ->leftJoin('users', 'pencairan_saldo.id_users', 'users.id')
            ->get();
        $statusPenarikanUser = PencairanSaldo::select(
            'users.name',
            'pencairan_saldo.status',
            'pencairan_saldo.jumlah',
            'pencairan_saldo.id'
        )
            ->where('pencairan_saldo.id_users', $userId)
            ->leftJoin('users', 'pencairan_saldo.id_users', 'users.id')
            ->get();
        return view('pembayaran.penarikan')
            ->with([
                'statusPenarikan' => $statusPenarikan,
                'statusPenarikanUser' => $statusPenarikanUser,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_users' => 'required|exists:users,id',
            'jumlah' => 'required|integer|min:400000',
        ]);

        PencairanSaldo::create([
            'id_users' => $request->id_users,
            'jumlah' => $request->jumlah,
        ]);

        return response()->json(['success' => true]);
    }

    public function editStatus(Request $request, $id)
    {
        try {
            $statusPenarikan = PencairanSaldo::find($id);
            $uangAwalPengajar = DB::table('dompets')
                ->where('id_users', $statusPenarikan->id_users)
                ->sum('saldo');

            $uangPengajar = $uangAwalPengajar;

            if ($statusPenarikan->jumlah <= $uangPengajar) {
                return response()->json(['success' => false, 'message' => 'Pencairan melebihi saldo yang tersedia.'], 400);
            }

            $statusPenarikan->status = $request->status;
            $statusPenarikan->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}
