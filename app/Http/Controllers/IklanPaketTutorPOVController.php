<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasPaketRequest;
use App\Http\Requests\UpdateKelasPaketRequest;
use App\Models\Paket;
use Illuminate\Http\Request;

class IklanPaketTutorPOVController extends Controller
{
    public function showIklanPaket(Request $request)
{
    $searchQuery = $request->input('search');
    $query = Paket::query();

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
        $kelasPaket->nama_paket = $request->input('nama_paket');
        $kelasPaket->deskripsi = $request->input('deskripsi');
        $kelasPaket->harga = $request->input('harga');
        $kelasPaket->durasi = $request->input('durasi');
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
        $kelasPaket->durasi = $request->input('durasi');
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
}
