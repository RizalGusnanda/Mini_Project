<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasPaketRequest;
use App\Http\Requests\StoreModulRequest;
use App\Http\Requests\UpdateKelasPaketRequest;
use App\Http\Requests\UpdateModulRequest;
use App\Models\Modul;
use App\Models\Paket;
use Illuminate\Http\Request;

class IklanPaketTutorPOVController extends Controller
{




// =============================================================================================
//           DIBAWAH INI ADALAH UNTUK CONTROLLER UNTUK:
//         1. IklanPaketTutor.blade.php = menampilkan list paket yang dimiliki tutor
//         2. tambahPaketKelas.blade.php = menampilakan form untuk tutor jika ingin menambah paket
//         3. editPaketKelas.blade.php = menampilkan form jika tutor ingin edit paket
// =============================================================================================

    public function showIklanPaket(Request $request)
{
    $searchQuery = $request->input('search');
    $query = Paket::where('user_id', auth()->user()->id);

    if ($searchQuery) {
        $query->where('nama_paket', 'LIKE', '%' . $searchQuery . '%');
    }

    $pakets = $query->paginate(5);

    return view('layoutUser.iklanPaketTutor', ['pakets' => $pakets, 'searchQuery' => $searchQuery]);
}

    public function create()
    {
        return view('layoutUser.tambahPaketKelas');
    }

    public function store(StoreKelasPaketRequest $request)
    {

        $kelasPaket = new Paket();
        $kelasPaket->user_id = auth()->user()->id;
        $kelasPaket->nama_paket = $request->input('nama_paket');
        $kelasPaket->deskripsi = $request->input('deskripsi');
        $kelasPaket->harga = $request->input('harga');
    $kelasPaket->durasi_start = date('Y-m-d', strtotime($request->input('durasi_start')));
    $kelasPaket->durasi_end = date('Y-m-d', strtotime($request->input('durasi_end')));
        $kelasPaket->save();

        // Redirect atau lakukan tindakan lain setelah penyimpanan data
        return redirect()->route('daftar-paket-iklanTutor');
    }

    public function edit($id)
{
    $kelasPaket = Paket::findOrFail($id);

    return view('layoutUser.editPaketKelas', ['kelasPaket' => $kelasPaket]);
}


    public function update(UpdateKelasPaketRequest $request, $id)
    {
        $kelasPaket = Paket::findOrFail($id);

        $kelasPaket->nama_paket = $request->input('nama_paket');
        $kelasPaket->deskripsi = $request->input('deskripsi');
        $kelasPaket->harga = $request->input('harga');
        $kelasPaket->durasi_start = date('Y-m-d', strtotime($request->input('durasi_start')));
        $kelasPaket->durasi_end = date('Y-m-d', strtotime($request->input('durasi_end')));
        $kelasPaket->save();

        // Redirect atau lakukan tindakan lain setelah pembaruan data
        return redirect()->route('daftar-paket-iklanTutor');
    }

    public function destroy($id)
    {
        $kelasPaket = Paket::findOrFail($id);
        $kelasPaket->delete();

        // Redirect atau lakukan tindakan lain setelah penghapusan data
        return redirect()->route('daftar-paket-iklanTutor');
    }

// =============================================================================================
//           DIBAWAH INI ADALAH UNTUK CONTROLLER UNTUK:
//      1.modulKelasTutor.blade.php = digunakan untuk menampilkan isi modul/materi dari paket yang dipilih
//      2.tambahModulTutor.blade.php = digunakan untuk jika tutor ingin menambah modul/materi
//                                     yang mana akan direct ke halaman modulKelasTutor.blade.php
//      3.editModulTutor.blade.php = digunakan untuk jika tutor akan mengupdate modulnya
// =============================================================================================

public function showModul(Request $request,$id)
    {

        $paket_id=$request -> input('id');
        $paket = Paket::where('id',$paket_id)->get();


        return view('layoutUser.modulKelasTutor',['paket'=>$paket]);
    }

    public function editModul($id)
    {
        $modul = Modul::findOrFail($id);

        return view('layoutUser.editModulTutor', ['modul' => $modul]);
    }

    public function createModul($id)
    {
        $modul = Modul::findOrFail($id);

        return view('layoutUser.tambahModulTutor');
    }
    public function storeModul(StoreModulRequest $request)
    {
        // Validasi data lain yang diperlukan
        $modul = new Modul();
        $modul->user_id = auth()->user()->id;
        $modul->paket_id = $request->input('paket_id');
        $modul->nama_modul = $request->input('nama_modul');
        $modul->deskripsi_modul = strip_tags($request->input('deskripsi_modul'));

        // Pastikan 'paket_id' yang dikirimkan oleh pengguna adalah valid
        if (Paket::where('id', $modul->paket_id)->exists()) {
            $modul->save();

            // Redirect atau lakukan tindakan lain setelah penyimpanan data
            return redirect()->route('modul.daftar');
        } else {
            // Handle kesalahan jika 'paket_id' tidak valid
            return redirect()->back()
                ->with('error', 'Paket yang dipilih tidak valid.');
        }
    }


    public function updateModul(UpdateModulRequest $request, $id)
    {
        $modul = Paket::findOrFail($id);

        $modul->nama_paket = $request->input('nama_paket');
        $modul->deskripsi = $request->input('deskripsi');
        $modul->save();

        // Redirect atau lakukan tindakan lain setelah pembaruan data
        return redirect()->route('modul.daftar');
    }
}
