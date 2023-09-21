<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class RiwayatPembayaranController extends Controller
{
    public function index(Request $request)
{
    $user_id = auth()->id();
    
    $query = Pembayaran::with(['user', 'paket'])->where('user_id', $user_id);

    $status = $request->input('status');

    if ($status) {
        if ($status !== 'all') {
            $query->where('status', $status);
        }
      
    }

    $pembayaranList = $query->paginate(5);

    return view('layoutUser.riwayatPembayaran', compact('pembayaranList'));
}


}
