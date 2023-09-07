<?php

namespace App\Http\Controllers;


use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;// Sesuaikan dengan model yang Anda gunakan

class PaketController extends Controller
{
    public function showPaketPage(Request $request)
    {
        $user_id = $request->input('id_user');

        $pakets = Paket::where('user_id', $user_id)->paginate(3);

        return view('layoutUser.paketPage', ['pakets' => $pakets]);
    }

    public function selectPaket(Request $request)
    {
        $paket_id = $request->input('paket_id');

        // Simpan id_paket yang dipilih dalam sesi
        Session::put('selected_paket', $paket_id);

        // Tambahkan pesan log
        \Log::info('Selected Paket ID: ' . $paket_id);
        // Redirect langsung ke halaman riwayat
        return redirect()->route('reservasi-paket');
    }




}

