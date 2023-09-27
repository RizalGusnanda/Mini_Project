<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasPaketRequest;
use App\Http\Requests\StoreModulRequest;
use App\Http\Requests\UpdateKelasPaketRequest;
use App\Http\Requests\UpdateModulRequest;
use App\Models\Modul;
use App\Models\Paket;
use App\Models\Profile;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IklanPaketTutorPOVController extends Controller
{




    // =============================================================================================
    //           DIBAWAH INI ADALAH UNTUK CONTROLLER UNTUK:
    //         1. IklanPaketTutor.blade.php = menampilkan list paket yang dimiliki tutor
    //         2. tambahPaketKelas.blade.php = menampilakan form untuk tutor jika ingin menambah paket
    //         3. editPaketKelas.blade.php = menampilkan form jika tutor ingin edit paket
    // =============================================================================================


    public function showIklanPaket(Request $request)
    {
        $nama_paket = $request->input('search'); // Change 'nama_paket' to 'search'

        $pakets = DB::table('pakets')
            ->select(
                'pakets.id as paket_Id',
                'pakets.user_id',
                'pakets.nama_paket',
                'pakets.deskripsi',
                'pakets.harga',
                'pakets.total_harga',
                'pakets.*',
                'users.name'
            )
            ->leftJoin('users', 'pakets.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->when($nama_paket, function ($query, $nama_paket) {
                return $query->where('nama_paket', 'LIKE', '%' . $nama_paket . '%');
            })
            ->paginate(5);

        return view('layoutUser.iklanPaketTutor')->with(['pakets' => $pakets, 'nama_paket' => $nama_paket]);
    }


    public function create()
    {
        return view('layoutUser.tambahPaketKelas');
    }

    public function store(StoreKelasPaketRequest $request)
    {

        $kelasPaket = new Paket();
        $kelasPaket->user_id = auth()->user()->id;
        $kelasPaket->nama_paket = $request->input('nama_paket');
        $kelasPaket->deskripsi = $request->input('deskripsi');
        $kelasPaket->harga = $request->input('harga');
        $kelasPaket->total_harga = $request->input('totalharga');
        $kelasPaket->durasi_start = date('Y-m-d', strtotime($request->input('durasi_start')));
        $kelasPaket->durasi_end = date('Y-m-d', strtotime($request->input('durasi_end')));
        $kelasPaket->save();

        // Redirect atau lakukan tindakan lain setelah penyimpanan data
        return redirect()->route('daftar-paket-iklanTutor');
    }

    public function edit(Paket $paket, $id)
    {
        $kelasPaket = Paket::findOrFail($id);

 

        return view('layoutUser.editPaketKelas', ['kelasPaket' => $kelasPaket]);
    }


    public function update(UpdateKelasPaketRequest $request, $id)
    {
        $kelasPaket = Paket::findOrFail($id);

        $kelasPaket->nama_paket = $request->input('nama_paket');
        $kelasPaket->deskripsi = $request->input('deskripsi');
        $kelasPaket->harga = $request->input('harga');
        $kelasPaket->durasi_start = date('Y-m-d', strtotime($request->input('durasi_start')));
        $kelasPaket->durasi_end = date('Y-m-d', strtotime($request->input('durasi_end')));
        $kelasPaket->save();

        // Redirect atau lakukan tindakan lain setelah pembaruan data
        return redirect()->route('daftar-paket-iklanTutor');
    }

    public function destroy($id)
    {
        $kelasPaket = Paket::findOrFail($id);
        $kelasPaket->delete();

        // Redirect atau lakukan tindakan lain setelah penghapusan data
        return redirect()->route('daftar-paket-iklanTutor');
    }

    // =============================================================================================
    //           DIBAWAH INI ADALAH UNTUK CONTROLLER UNTUK:
    //      1.modulKelasTutor.blade.php = digunakan untuk menampilkan isi modul/materi dari paket yang dipilih
    //      2.tambahModulTutor.blade.php = digunakan untuk jika tutor ingin menambah modul/materi
    //                                     yang mana akan direct ke halaman modulKelasTutor.blade.php
    //      3.editModulTutor.blade.php = digunakan untuk jika tutor akan mengupdate modulnya
    // =============================================================================================
    public function showModul($id)
    {

        $paket = DB::table('pakets')
            ->select(
                'pakets.id as paket_Id',
                'pakets.user_id',
                'pakets.nama_paket',
                'pakets.deskripsi',
                'pakets.harga',
                'pakets.total_harga',
                'pakets.id',
            )
            ->leftJoin('users', 'pakets.user_id', '=', 'users.id')
            ->where('pakets.id', $id)->first();

        if (!$paket) {

            return abort(404);
        }

        $modules = DB::table('moduls')
            ->select(
                'moduls.id as moduls_Id',
                'moduls.user_id',
                'moduls.nama_modul',
                'moduls.deskripsi_modul',
                'moduls.*',
                'pakets.id',
                'pakets.nama_paket',
                'users.id',
                'users.name'
            )
            ->leftJoin('pakets', 'moduls.paket_id', '=', 'pakets.id')
            ->leftJoin('users', 'moduls.user_id', '=', 'users.id')
            ->where('moduls.paket_id', $id)
            ->get();

        $modules1 = DB::table('moduls')
            ->select(
                'moduls.id as moduls_Id',
                'moduls.user_id',
                'moduls.nama_modul',
                'moduls.deskripsi_modul',
                'moduls.*',
                'pakets.id',
                'pakets.nama_paket',
                'users.id',
                'users.name'
            )
            ->leftJoin('pakets', 'moduls.paket_id', '=', 'pakets.id')
            ->leftJoin('users', 'moduls.user_id', '=', 'users.id')
            ->where('moduls.user_id', auth()->user()->id)
            ->first();

        // dd($modules);

        if ($modules->isEmpty()) {

            return view('layoutUser.modulKelasTutor', ['paket' => $paket, 'modules' => $modules, 'modules1' => $modules1, 'nama_modul' => '', 'deskripsi_modul' => 'No modules found for this package.']);
        }


        $firstModule = $modules->first();

        return view('layoutUser.modulKelasTutor', ['paket' => $paket, 'modules' => $modules, 'modules1' => $modules1, 'nama_modul' => $firstModule->nama_modul, 'deskripsi_modul' => $firstModule->deskripsi_modul]);
    }

    // tampilan sebenrannya 
    public function tampilanModul(Request $request, $id)
    {

        $modules = DB::table('moduls')
            ->select(
                'moduls.id as moduls_Id',
                'moduls.user_id',
                'moduls.nama_modul',
                'moduls.deskripsi_modul',
                'moduls.*',
                'pakets.id',
                'pakets.nama_paket',
                'users.id',
                'users.name'
            )
            ->leftJoin('pakets', 'moduls.paket_id', '=', 'pakets.id')
            ->leftJoin('users', 'moduls.user_id', '=', 'users.id')
            ->where('moduls.user_id', auth()->user()->id)
            ->get();

        $modules1 = Modul::where('moduls.id', $id)
            ->select(
                'moduls.id as moduls_Id',
                'moduls.user_id',
                'moduls.nama_modul',
                'moduls.deskripsi_modul',
                'moduls.*',
                'pakets.id',
                'pakets.nama_paket',
                'users.id',
                'users.name'
            )
            ->leftJoin('pakets', 'moduls.paket_id', '=', 'pakets.id')
            ->leftJoin('users', 'moduls.user_id', '=', 'users.id')
            ->where('moduls.user_id', auth()->user()->id)
            ->first();

        // dd($modules1);

        $nextModule = Modul::where('id', '>', $id)->orderBy('id')->first();
        $previousModule = Modul::where('id', '<', $id)->orderByDesc('id')->first();

        // dd($modules);

        return view('layoutUser.modulTampilanKelasTutor')->with(['modules' => $modules, 'modules1' => $modules1, 'nextModule' => $nextModule,  'previousModule' =>  $previousModule]);
    }



    public function createModul($id)
    {
        $modul = Paket::findOrFail($id);

        return view('layoutUser.tambahModulTutor', ['modul' => $modul]);
    }
    public function storeModul(StoreModulRequest $request)
    {

        $modul = new Modul();
        $modul->user_id = auth()->user()->id;
        $paket = json_decode($request->input('paket_id'));
        $modul->paket_id = $paket->id;
        $modul->nama_modul = $request->input('nama_modul');
        $modul->deskripsi_modul = ($request->input('deskripsi_modul'));

        if ($request->hasFile('image')) {
            if ($modul->deskripsi_modul) {
                Storage::disk('public')->delete($modul->deskripsi_modul);
            }
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $modul->deskripsi_modul = $imagePath;
            $modul->save();
        }


        if (Paket::where('id', $modul->paket_id)->exists()) {
            $modul->save();


            return redirect()->route('modul.daftar', ['id' => $paket->id]);
        } else {

            return redirect()->back()
                ->with('error', 'Paket yang dipilih tidak valid.');
        }
    }

    public function editModul($id)
    {
        $modul = Modul::find($id);
        return view('layoutUser.editModulTutor', ['modul' => $modul]);
    }

    public function updateModul(UpdateModulRequest $request, $id)
    {
        $modul = Modul::findOrFail($id);


        $modul->nama_modul = $request->input('nama_modul');
        $modul->deskripsi_modul = $request->input('deskripsi_modul');


        $modul->save();

        if ($request->hasFile('image')) {
            if ($modul->deskripsi_modul) {
                Storage::disk('public')->delete($modul->deskripsi_modul);
            }
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $modul->deskripsi_modul = $imagePath;
            $modul->save();
        }


        return redirect()->route('modultampilan.daftar', ['modul_id' => $modul->id]);
    }

    public function getDeskripsiModul()
    {
        // $modul = Modul::find($id);

        $modul = DB::table('moduls')
            ->select(
                'moduls.id as moduls_Id',
                'moduls.user_id',
                'moduls.nama_modul',
                'moduls.deskripsi_modul',
                'moduls.*',
                'pakets.id',
                'pakets.nama_paket',
                'users.id',
                'users.name'
            )
            ->leftJoin('pakets', 'moduls.paket_id', '=', 'pakets.id')
            ->leftJoin('users', 'moduls.user_id', '=', 'users.id')
            ->where('moduls.user_id', auth()->user()->id)
            ->first();
        // dd( $modul);

        if (!$modul) {
            return response()->json(['deskripsi_modul' => 'Modul not found'], 404);
        }

        return response()->json(['deskripsi_modul' => $modul->deskripsi_modul, 'id' => $modul->moduls_Id,  'nama_modul' => $modul->nama_modul]);
    }

    public function getIdModul()
    {
        $modul = DB::table('moduls')
            ->select(
                'moduls.id as moduls_Id',
                'moduls.user_id',
                'moduls.nama_modul',
                'moduls.deskripsi_modul',
                'moduls.*',
                'pakets.id',
                'pakets.nama_paket',
                'users.id',
                'users.name'
            )
            ->leftJoin('pakets', 'moduls.paket_id', '=', 'pakets.id')
            ->leftJoin('users', 'moduls.user_id', '=', 'users.id')
            ->where('moduls.user_id', auth()->user()->id)
            ->first();
        // dd( $modul);

        if (!$modul) {
            return response()->json(['deskripsi_modul' => 'Modul not found'], 404);
        }

        return response()->json(['deskripsi_modul' => $modul->deskripsi_modul, 'id' => $modul->moduls_Id,  'nama_modul' => $modul->nama_modul]);
    }
}
