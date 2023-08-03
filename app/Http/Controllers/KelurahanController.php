<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Http\Requests\StoreKelurahanRequest;
use App\Http\Requests\UpdateKelurahanRequest;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kecamatans = Kecamatan::all();
        $kelurahanName = $request->input('kelurahan');
        $kecamatanIds = $request->input('kecamatan');
        $kelurahan = $request->input('kelurahan');

        $query = Kelurahan::select('kelurahans.id', 'kelurahans.id_kecamatan', 'kelurahans.kelurahan', 'kecamatans.kecamatan')
            ->leftJoin('kecamatans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
            ->when($request->input('kelurahan'), function ($query, $kelurahan) {
                return $query->where('kelurahans.kelurahan', 'like', '%' . $kelurahan . '%');
            })
            ->when($request->input('kecamatan'), function ($query, $kecamatan) {
                return $query->whereIn('kelurahans.id_kecamatan', $kecamatan);
            })
            ->orderBy('kelurahans.id_kecamatan', 'asc')
            ->paginate(10);
        $kecamatanSelected = $request->input('kecamatan');

        $query->appends(['kelurahan' => $kelurahanName, 'kecamatan' => $kecamatanIds]);

        return view('daerah.kelurahan.index')->with([
            'kelurahans' => $query,
            'kecamatans' => $kecamatans,
            'kelurahanName' => $kelurahanName,
            'kecamatanIds' => $kecamatanIds,
            'kecamatanSelected' => $kecamatanSelected,
            'kelurahan' => $kelurahan,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('daerah.kelurahan.create')->with(['kecamatans' => $kecamatans]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelurahanRequest $request)
    {
        Kelurahan::create([
            'kelurahan' => $request->kelurahan,
            'id_kecamatan' => $request->id_kecamatan,
        ]);

        return redirect()->route('kelurahan.index')
            ->with('success', 'Create data successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        $kecamatans = Kecamatan::all();
        return view('daerah.kelurahan.edit')->with(
            [
                'kelurahan' => $kelurahan,
                'kecamatans' => $kecamatans
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKelurahanRequest $request, Kelurahan $kelurahan)
    {
        $kelurahan->update($request->all());

        return redirect()->route('kelurahan.index')
            ->with('success', 'Updated data successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan)
    {
        try {
            $kelurahan->delete();
            return redirect()->route('kelurahan.index')->with('success', 'Deleted data Kelurahan successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            $error_code = $e->errorInfo[1];
            if ($error_code == 1451) {
                return redirect()->route('kelurahan.index')
                    ->with('error', 'Data kelurahan used in another table');
            } else {
                return redirect()->route('kelurahan.index')->with('success', 'Deleted data Kelurahan successfully');
            }
        }
    }
}
