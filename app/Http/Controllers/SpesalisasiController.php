<?php

namespace App\Http\Controllers;

use App\Models\Spesalisasi;
use App\Http\Requests\StoreSpesialisasiRequest;
use App\Http\Requests\UpdateSpesialisasiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpesalisasiController extends Controller
{
    public function index(Request $request)
    {
        $spesalisasis = DB::table('spesalisasis')
        ->when($request->input('nama_spesialisasi'), function ($query, $nama_spesialisasi) {
            return $query->where('nama_spesialisasi', 'like', '%' . $nama_spesialisasi . '%');
        })
        ->paginate(10);
    return view('pengajaran.spesialisasi.index', compact('spesalisasis'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajaran.spesialisasi.create');
    }

    public function store(StoreSpesialisasiRequest $request)
    {
        Spesalisasi::create([
            'nama_spesialisasi' => $request->nama_spesialisasi,
        ]);
        return redirect()->route('spesialisasi.index')->with('success', 'Data Spesialisasi berhasil ditambahkan.');     
    }

    public function show(Spesalisasi $nama_spesialisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spesalisasi  $nama_spesialisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Spesalisasi $spesialisasi)
    {
        return view('pengajaran.spesialisasi.edit', compact('spesialisasi'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spesalisasi  $nama_spesialisasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpesialisasiRequest $request, Spesalisasi $spesialisasi)
    {
        
        $request->validate([
            'nama_spesialisasi' => 'required|unique:spesalisasis,nama_spesialisasi,' . $spesialisasi->id,
        ]);

        $spesialisasi->update($request->all());

        return redirect()->route('spesialisasi.index')
            ->with('success', 'Data Spesialisasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spesialisasi  $nama_spesialisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spesalisasi $spesialisasi)
    {
        try {
            $spesialisasi->delete();
            return redirect()->route('spesialisasi.index')->with('success', 'Deleted data Spesialisasi successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            $error_code = $e->errorInfo[1];
            if ($error_code == 1451) {
                return redirect()->route('spesialisasi.index')
                    ->with('error', 'Data spesialisasi used in another table');
            } else {
                return redirect()->route('spesialisasi.index')->with('success', 'Deleted data Spesialisasi successfully');
            }
        }
    }
}
