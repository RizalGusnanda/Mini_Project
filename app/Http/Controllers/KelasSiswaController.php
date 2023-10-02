<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paket;
use DB;

class KelasSiswaController extends Controller
{

    public function showKelas(Request $request, $id)
    {
        // $moduls = Modul::all(); 

        $paketId = $request->input('paket_id');

        $paket = Paket::find($paketId);

        $modules = DB::table('moduls')
            ->select(
                'moduls.id as moduls_Id',
                'moduls.user_id',
                'moduls.nama_modul',
                'moduls.paket_id',
                'moduls.*',
                'moduls.deskripsi_modul',
                'pakets.id',
                'pakets.nama_paket',
                'users.id',
                'users.name'
            )
            ->leftJoin('pakets', 'moduls.paket_id', '=', 'pakets.id')
            ->leftJoin('users', 'moduls.user_id', '=', 'users.id')
            ->where('moduls.user_id', auth()->user()->id)
            ->where('moduls.paket_id', $paket)
            ->get();

        $modules3 = DB::table('moduls')
            ->select(
                'moduls.id as moduls_Id',
                'moduls.user_id',
                'moduls.nama_modul',
                'moduls.paket_id',
                'moduls.*',
                'moduls.deskripsi_modul',
                'pakets.id',
                'pakets.nama_paket',
                'users.id',
                'users.name'
            )
            ->leftJoin('pakets', 'moduls.paket_id', '=', 'pakets.id')
            ->leftJoin('users', 'moduls.user_id', '=', 'users.id')
            // ->where('moduls.user_id', auth()->user()->id)
            ->where('moduls.paket_id', $paket->id)
            ->get();

            // dd($modules3);
            // dd($paket->id);


        $modules1 = DB::table('moduls')
            ->select(
                'moduls.id as moduls_Id',
                'moduls.user_id',
                'moduls.nama_modul',
                'moduls.paket_id',
                'moduls.*',
                'pakets.durasi_start as durasi_mulai',
                'pakets.durasi_end as durasi_berhenti',
                'moduls.deskripsi_modul',
                'pakets.id',
                'pakets.nama_paket',
                'users.id',
                'users.name'
            )
            // ->leftJoin('pakets as pakets1', 'pakets1.id', 'moduls.paket_id')
            // ->leftJoin('pembayarans', 'pembayarans.user_id', 'pakets1.user_id')
            ->leftJoin('pakets', 'moduls.paket_id', '=', 'pakets.id')
            ->leftJoin('users', 'moduls.user_id', '=', 'users.id')
            ->where('moduls.id', $id)
            ->first();

        //   dd($modules1);
        // Mengambil semua modul dari tabel


        $nextModule = Modul::where('id', '>', $id)
        ->where('paket_id', $paketId) 
        ->orderBy('id')
        ->first();

        $previousModule = Modul::where('id', '<', $id)
          ->where('paket_id', $paketId)
          ->orderByDesc('id')
          ->first();

        return view('layoutUser.kelasSiswa', ([
            'paket' => $paket,
            'modules' => $modules,
            'modules1' => $modules1,
            'modules3' => $modules3,
            'nextModule' => $nextModule,
            'previousModule' => $previousModule
        ]));
    }
}