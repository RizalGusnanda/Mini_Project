<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasPaketRequest;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function showPaketPage(Request $request)
{
    $user_id = $request->input('id_user');
   
    $pakets = DB::table('pakets')->select(
        'pakets.*',
    )->where('user_id', $user_id)->paginate(3);


    return view('layoutUser.paketPage', ['pakets' => $pakets]);
}

}

