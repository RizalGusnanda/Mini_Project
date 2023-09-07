<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Http\Requests\StoreModulRequest;
use App\Http\Requests\UpdateModulRequest;
use Illuminate\Support\Facades\Session;
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
        $moduls = Modul::where('user_id', auth()->user()->id)->get();
        return view('layoutUser.modulIndex', compact('moduls'));
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

        // Ambil data sub-modul yang sudah ada dari database
        $userModuls = Modul::where('user_id', auth()->user()->id)
            ->get()
            ->groupBy(['minggu', 'pertemuan']) // Kelompokkan berdasarkan 'minggu' dan 'pertemuan'
            ->toArray();

        return view('layoutUser.modulTambah', compact('mingguLabels', 'pertemuanLabels', 'userModuls'));
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModulRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModulRequest $request)
    {
        $mingguLabels = ["Minggu 1", "Minggu 2", "Minggu 3", "Minggu 4"];
        $pertemuanLabels = ["Pertemuan 1", "Pertemuan 2", "Pertemuan 3"];

        $rules = [];

        // Validasi data yang dikirimkan oleh pengguna
        foreach ($mingguLabels as $mingguIndex => $minggu) {
            foreach ($pertemuanLabels as $index => $pertemuan) {
                $inputName = 'pertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);
                $textareaId = 'Summernotepertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);

                // Hanya tambahkan aturan validasi jika input atau textarea tidak kosong
                if ($request->filled($inputName) || $request->filled($textareaId)) {
                    $rules[$inputName] = 'required|string|max:255';
                    $rules[$textareaId] = 'required|string|max:500';
                }
            }
        }

        $validatedData = $request->validate($rules);

        // Simpan data yang telah berhasil disimpan ke dalam session
        $existingModuls = session()->get('savedModulData', []);

        foreach ($mingguLabels as $mingguIndex => $minggu) {
            foreach ($pertemuanLabels as $index => $pertemuan) {
                $inputName = 'pertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);
                $textareaId = 'Summernotepertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);

                $namaModul = $request->input($inputName);
                $deskripsiModul = $request->input($textareaId);

                // Periksa apakah data untuk sub-modul ini sudah ada dalam session
                $existingModulData = $existingModuls[$minggu][$index] ?? [];

                if (!empty($namaModul) || !empty($deskripsiModul)) {
                    // Periksa apakah sub-modul dengan nama yang sama ada di "Minggu" dan "Pertemuan" yang sama
                    $existingModul = Modul::where([
                        'user_id' => auth()->user()->id,
                        'nama_modul' => $namaModul,
                        'deskripsi_modul' => $deskripsiModul,
                    ])->first();

                    if (!$existingModul) {
                        // Jika tidak ada, buat catatan baru
                        Modul::create([
                            'user_id' => auth()->user()->id,
                            'nama_modul' => $namaModul,
                            'deskripsi_modul' => $deskripsiModul,
                        ]);
                    } else {
                        // Jika ada, perbarui deskripsi sub-modul yang ada
                        $existingModul->update(['deskripsi_modul' => $deskripsiModul]);
                    }
                }

                // Periksa apakah data sub-modul ini sudah ada dalam session
                if (!empty($namaModul) || !empty($deskripsiModul)) {
                    // Jika sudah ada, perbarui data yang ada dalam session
                    $existingModulData['nama_modul'] = $namaModul;
                    $existingModulData['deskripsi_modul'] = $deskripsiModul;
                } else {
                    // Jika belum ada, tambahkan data baru ke dalam session
                    $existingModuls[$minggu][$index] = [
                        'nama_modul' => $namaModul,
                        'deskripsi_modul' => $deskripsiModul,
                    ];
                }
            }
        }

        // Simpan data yang telah diperbarui ke dalam session
        session()->put('savedModulData', $existingModuls);

        // Simpan data yang telah berhasil disimpan ke dalam session (juga ke dalam userModuls)
        $userModuls = Modul::where('user_id', auth()->user()->id)
            ->get()
            ->groupBy(['minggu', 'pertemuan']) // Kelompokkan berdasarkan 'minggu' dan 'pertemuan'
            ->toArray();

        session()->put('userModuls', $userModuls);

        // Redirect kembali ke halaman modulTambah
        return redirect()->route('modul.create')
            ->with('success', 'Modul berhasil ditambahkan');
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
