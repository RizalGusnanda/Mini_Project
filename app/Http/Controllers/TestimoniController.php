<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Http\Requests\StoreTestimoniRequest;
use App\Http\Requests\UpdateTestimoniRequest;
use App\Models\Paket;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
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
    public function create($id_pembayaran)
    {
        $pembayaran = Pembayaran::find($id_pembayaran);

        // Pastikan pembayaran ditemukan
        if (!$pembayaran) {
            return redirect()->back()->with('error', 'Pembayaran tidak ditemukan.');
        }

        $paket = $pembayaran->paket;

        return view('layoutUser.testimoni', ['paket' => $paket]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimoniRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimoniRequest $request)
    {


        $testimoni = new Testimoni;
        $testimoni->id_users = $request->input('user_id');
        $testimoni->nama = Auth::user()->name;
        $testimoni->user_testimoni = Auth::id();
        $testimoni->testimoni = $request->input('testimoni');
        $testimoni->rating = $request->input('rating');
        $testimoni->save();

        $pembayaran_id = $request->input('pembayaran_id');

        $pembayaran = Pembayaran::find($pembayaran_id);
        if ($pembayaran) { // cek apakah pembayaran ditemukan
            $pembayaran->has_testimoni = true;
            $pembayaran->save();
        }

        return redirect()->route('tutor.search')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $testimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestimoniRequest  $request
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimoniRequest $request, Testimoni $testimoni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        //
    }
}
