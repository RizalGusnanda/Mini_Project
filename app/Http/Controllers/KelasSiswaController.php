<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class KelasSiswaController extends Controller
{

    public function showKelas(Request $request, $id)
    {
        // $moduls = Modul::all(); 

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
            ->where('moduls.paket_id', $id)
            ->get();

  

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
            ->where('moduls.paket_id', $id)
            ->first();

                //   dd($modules1);
        // Mengambil semua modul dari tabel


        $nextModule = Modul::where('id', '>', $id)->orderBy('id')->first();
        $previousModule = Modul::where('id', '<', $id)->orderByDesc('id')->first();

        return view('layoutUser.kelasSiswa', ([
            'modules' => $modules,
            'modules1' => $modules1,
            'nextModule' => $nextModule,
            'previousModule' => $previousModule
        ]));
    }
}