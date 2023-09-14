<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Http\Requests\StoreModulRequest;
use App\Http\Requests\UpdateModulRequest;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $moduls = Modul::all(); // Mengambil semua data modul dari database

        return view('layoutUser.modulTambah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Tampilkan form untuk membuat modul baru
        return view('layoutUser.editModulTutor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModulRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModulRequest $request)
{
    // Validasi data yang dikirim oleh form
    $validator = Validator::make($request->all(), [
        'nama_modul' => 'required',
        'deskripsi_modul' => 'required',
        // tambahkan validasi lain sesuai kebutuhan
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Menggunakan strip_tags untuk membersihkan HTML tags dari deskripsi_modul
    $deskripsiModul = strip_tags($request->input('deskripsi_modul'));
    $namaPaket = $request->input('id');
    $paket = Paket::where('id', $namaPaket)->firstOrFail();
    // Simpan data modul ke dalam database
    Modul::create([
        'user_id' => auth()->user()->id,
        'paket_id' => $paket->id,
        'nama_modul' => $request->input('nama_modul'),
        'deskripsi_modul' => $deskripsiModul, // Menggunakan deskripsi_modul yang sudah dibersihkan
        // tambahkan field lain sesuai kebutuhan
    ]);

    // Redirect ke halaman yang sesuai setelah menyimpan modul
    return view('layoutUser.editModulTutor');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function show(Modul $modul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Tampilkan form untuk mengedit modul berdasarkan ID
        $modul = Modul::findOrFail($id); // Sesuaikan dengan cara Anda mengambil data modul
        return view('modul.edit', compact('modul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModulRequest  $request
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModulRequest $request, $id)
    {
        // Validasi data yang dikirim oleh form
        $request->validate([
            'nama_modul' => 'required',
            'deskripsi_modul' => 'required',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        // Perbarui data modul berdasarkan ID
        $modul = Modul::findOrFail($id); // Sesuaikan dengan cara Anda mengambil data modul

            $modul->nama_modul = $request->input('nama_modul');
            $modul->deskripsi_modul = $request->input('deskripsi_modul');

            // tambahkan field lain sesuai kebutuhan

        // Redirect ke halaman yang sesuai setelah memperbarui modul
        return redirect('/modul')->with('success', 'Modul berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modul $modul)
    {
        //
    }
}


