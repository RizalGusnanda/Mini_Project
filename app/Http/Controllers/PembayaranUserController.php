<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Paket;
use App\Models\Profile;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class PembayaranUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request, Paket $pakets)
        {
            $user_id = $request->input('user_id');
            $paket_id = $request->input('id');
        
            // Ambil pembayaran berdasarkan user_id
            $pembayaran = Pembayaran::with('user')->where('user_id', $user_id)->first();
            $tutor = Profile::with('user')->where('user_id', $user_id)->first();
            $paket = Paket::where('id', $paket_id)->first();
            $averageRating = Testimoni::where('id_users', $tutor->user->id)->avg('rating');
            // dd($paket);
        
            return view('layoutUser.pembayaran')->with(['pembayaran' => $pembayaran, 'tutor' => $tutor, 'avg' => $averageRating, 'paket' => $paket]);
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
     * @param  \App\Http\Requests\StorePembayaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembayaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembayaranRequest  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
