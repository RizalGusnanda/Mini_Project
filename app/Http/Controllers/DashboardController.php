<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\PencairanSaldo;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['role:super-admin|user-pengajar']);
        $this->middleware('permission:dashboard.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalSiswa = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->count();

        $namaRole = auth()->user()->roles->pluck('name')->first();

        $totalTutor = User::whereHas('roles', function ($query) {
            $query->where('name', 'user-pengajar');
        })->count();

        $userId = Auth::user()->id;
        $saldoAkhir = PencairanSaldo::where('id_users', $userId)->where('status', '=', 'disetujui')->sum('jumlah');
        $uangAwalAdmin = DB::table('dompets')
            ->where('id_users', $userId)
            ->sum('saldo');
        $uang = $uangAwalAdmin - $saldoAkhir;
        $uangAwalPengajar = DB::table('dompets')
            ->where('id_users', $userId)
            ->sum('saldo');
        $uangPengajar = $uangAwalPengajar - $saldoAkhir;

        $paketTerjual = DB::table('pembayarans')
            ->join('pakets', 'pembayarans.paket_id', '=', 'pakets.id')
            ->select('pakets.nama_paket', DB::raw('count(*) as total_terjual'))
            ->where('pakets.user_id', $userId)
            ->groupBy('pakets.nama_paket')
            ->orderBy('total_terjual', 'desc')
            ->get();

        $toturTerjual = DB::table('pembayarans')
            ->join('pakets', 'pembayarans.paket_id', '=', 'pakets.id')
            ->join('users', 'pakets.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('count(*) as total_penjual'))
            ->groupBy('users.name')
            ->orderBy('total_penjual', 'desc')
            ->get();

        $siswas = User::role('user')
            ->addSelect([
                'latest_transaction' => Pembayaran::select('created_at')
                    ->whereColumn('user_id', 'users.id')
                    ->latest()
                    ->limit(1)
            ])
            ->withCount('pembayarans')
            ->orderByDesc('latest_transaction')
            ->take(10)
            ->get();

        $currentYear = now()->year;

        // Mendefinisikan nama-nama bulan
        $months = [
            '01' => 'January', '02' => 'February', '03' => 'March',
            '04' => 'April', '05' => 'May', '06' => 'June',
            '07' => 'July', '08' => 'August', '09' => 'September',
            '10' => 'October', '11' => 'November', '12' => 'December',
        ];

        $dataFromDb = Pembayaran::select(
            DB::raw('SUM(total_amount) as sum'),
            DB::raw("MONTH(created_at) as month")
        )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->get()
            ->keyBy(function ($item) {
                return str_pad($item->month, 2, '0', STR_PAD_LEFT); // Mengubah "9" menjadi "09"
            });

        // Menyiapkan data untuk setiap bulan
        $monthlySum = collect($months)->map(function ($name, $number) use ($dataFromDb, $currentYear) {
            $monthYear = "$name $currentYear";
            $entry = $dataFromDb->get($number);
            return [
                'month_year' => $monthYear,
                'sum' => $entry ? $entry['sum'] : 0,
            ];
        });
        // dd($monthlySum);
        return view('home', [
            'toturTerjual' => $toturTerjual,
            'uangPengajar' => $uangPengajar,
            'totalSiswa' => $totalSiswa,
            'totalTutor' => $totalTutor,
            'uang' => $uang,
            'paketTerjual' => $paketTerjual,
            'siswas' => $siswas,
            'namaRole' => $namaRole,
            'monthlySum' => $monthlySum,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
