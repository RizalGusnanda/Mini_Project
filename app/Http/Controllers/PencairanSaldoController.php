<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use App\Models\PencairanSaldo;
use DB;
use Illuminate\Http\Request;


class PencairanSaldoController extends Controller
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

    public function buatPencairan(Request $request)
    {
        $jumlah = $request->input('jumlah');

        $dompet = Dompet::where('id_users', auth()->user()->id)->first();
        if ($dompet->saldo < $jumlah) {
            return response()->json(['error' => 'Saldo tidak cukup']);
        }

        PencairanSaldo::create([
            'id_users' => auth()->user()->id,
            'jumlah' => $jumlah,
            'status' => 'menunggu_verifikasi',
        ]);

        return response()->json(['success' => 'Permintaan pencairan berhasil dibuat']);
    }

    public function verifikasiPencairan($id, $status)
    {
        if (auth()->user()->role !== 'super-admin') {
            return response()->json(['error' => 'Akses ditolak']);
        }

        $pencairan = PencairanSaldo::find($id);
        if (!$pencairan) {
            return response()->json(['error' => 'Pencairan tidak ditemukan']);
        }

        DB::beginTransaction();
        try {
            $pencairan->status = $status;
            $pencairan->save();

            if ($status === 'disetujui') {
                $dompet = Dompet::where('id_users', $pencairan->id_users)->first();
                $dompet->saldo -= $pencairan->jumlah;
                $dompet->save();
            }
            DB::commit();
            return response()->json(['success' => 'Verifikasi berhasil']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Terjadi kesalahan']);
        }
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
     * @param  \App\Models\PencairanSaldo  $pencairanSaldo
     * @return \Illuminate\Http\Response
     */
    public function show(PencairanSaldo $pencairanSaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PencairanSaldo  $pencairanSaldo
     * @return \Illuminate\Http\Response
     */
    public function edit(PencairanSaldo $pencairanSaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PencairanSaldo  $pencairanSaldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PencairanSaldo $pencairanSaldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PencairanSaldo  $pencairanSaldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PencairanSaldo $pencairanSaldo)
    {
        //
    }
}