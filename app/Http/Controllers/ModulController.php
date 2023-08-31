<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Http\Requests\StoreModulRequest;
use App\Http\Requests\UpdateModulRequest;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mingguLabels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
    $pertemuanLabels = ['Pertemuan 1', 'Pertemuan 2', 'Pertemuan 3'];

    return view('layoutUser.modulTambah', compact('mingguLabels', 'pertemuanLabels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModulRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mingguLabels = ["Minggu 1", "Minggu 2", "Minggu 3", "Minggu 4"];
        $pertemuanLabels = ["Pertemuan 1", "Pertemuan 2", "Pertemuan 3"];

        $rules = [];
        foreach ($mingguLabels as $mingguIndex => $minggu) {
            foreach ($pertemuanLabels as $index => $pertemuan) {
                $inputName = 'pertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);
                $textareaId = 'Summernotepertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);

                $rules[$inputName] = 'required|string|max:255';
                $rules[$textareaId] = 'required|string|max:500';
            }
        }

        $validatedData = $request->validate($rules);

        foreach ($mingguLabels as $mingguIndex => $minggu) {
            foreach ($pertemuanLabels as $index => $pertemuan) {
                $inputName = 'pertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);
                $textareaId = 'Summernotepertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);

                $namaModul = $request->input($inputName); // Ambil nilai dari input
                $deskripsiModul = $request->input($textareaId); // Ambil nilai dari textarea

                // Simpan data ke dalam database
                Modul::create([
                    'user_id' => auth()->user()->id,
                    'nama_modul' => $namaModul, // Simpan nilai nama modul
                    'deskripsi_modul' => $deskripsiModul, // Simpan nilai deskripsi modul
                ]);
            }
        }

        return redirect()->back()->with('success', 'Modul berhasil ditambahkan');
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
    public function edit(Modul $modul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModulRequest  $request
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModulRequest $request, Modul $modul)
    {
        //
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
