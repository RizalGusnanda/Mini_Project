<?php

namespace App\Http\Controllers;

use App\Models\Spesialisasi;
use Illuminate\Http\Request;

class SpesalisasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:spesialisasi.index')->only('index');
        $this->middleware('permission:spesialisasi.create')->only('create', 'store');
        $this->middleware('permission:spesialisasi.edit')->only('edit', 'update');
        $this->middleware('permission:spesialisasi.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('pengajaran.spesialisasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spesialisasi  $spesialisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Spesialisasi $spesialisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spesialisasi  $spesialisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Spesialisasi $spesialisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spesialisasi  $spesialisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spesialisasi $spesialisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spesialisasi  $spesialisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spesialisasi $spesialisasi)
    {
        //
    }
}
