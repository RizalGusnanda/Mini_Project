<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Http\Requests\StoreTestimoniRequest;
use App\Http\Requests\UpdateTestimoniRequest;
use Illuminate\Http\Request;

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
    public function create(Request $request)
    {
        $user_id = $request->input('id_user');
        $testimoni = Testimoni::where('id_users', $user_id)->latest()->first();
        return view('layoutUser.testimoni', ['user_id' => $user_id, 'testimoni' => $testimoni]);
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
        $testimoni->id_users = $request->input('user_id');  // Gantikan 'user_id' dengan 'id_users'
        $testimoni->nama = $request->input('nama');
        $testimoni->testimoni = $request->input('testimoni');
        $testimoni->rating = $request->input('rating');
        $testimoni->save();

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
