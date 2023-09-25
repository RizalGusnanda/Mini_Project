<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use App\Http\Requests\StoreDompetRequest;
use App\Http\Requests\UpdateDompetRequest;

class DompetController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDompetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDompetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function show(Dompet $dompet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function edit(Dompet $dompet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDompetRequest  $request
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDompetRequest $request, Dompet $dompet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dompet $dompet)
    {
        //
    }
}
