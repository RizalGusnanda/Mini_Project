@extends('layoutUser.layout.index')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <style>
        body {
            background-color: white;
        }

        .tambah {
            background-color: #4CAF50;
            /* Warna latar belakang */
            border: none;
            /* Tanpa border */
            color: white;
            /* Warna teks */
            padding: 10px 20px;
            /* Padding di dalam tombol */
            text-align: center;
            /* Teks di tengah */
            text-decoration: none;
            /* Tanpa dekorasi teks */
            display: inline-block;
            /* Tampilan inline */
            font-size: 16px;
            /* Ukuran teks */
            margin: 4px 2px;
            /* Margin */
            cursor: pointer;
            /* Kursor berubah saat diarahkan ke tombol */
            margin-bottom: 50px;
            margin-top: -50px;
        }

        /* CSS untuk tautan navigasi halaman */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            color: #4CAF50;
            border: 1px solid #4CAF50;
            padding: 5px 10px;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination .page-item.active .page-link {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
    </style>
    <section class="breadcrumb">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none; color: #ccc">Beranda</a></li>
                    <li class="breadcrumb-item active"><a href="#"
                            style="text-decoration: none; color: #1F3C88">Paket</a></li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="header">
        <div class="container">
            <div class="card-search">
                <div class="card-body">
                    <h5 class="card-title-search">Pilihan Paket Belajar</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="price-section-paket">
        <div class="background-container">
            <div class="container">
                <div class="row">
                    @if (isset($pakets) && count($pakets) > 0)
                        <!-- Debug: Number of Pakets -->
                        @foreach ($pakets as $paket)
                            <div class="col-md-4">
                                <div class="price-card">
                                    <div class="card-body">
                                        <h2>{{ $paket->nama_paket }}</h2>
                                        <div class="line-container">
                                            <div class="line"></div>
                                        </div>
                                        <div class="price-harga">
                                            <p><span class="harga">Rp.{{ number_format($paket->harga, 0, ',', '.') }} /
                                                </span> bulan</p>
                                        </div>
                                        <p class="black-text">{!! $paket->deskripsi !!}</p>
                                        <div class="durasiKelas">
                                            @php
                                                $formattedDurasiStart = Carbon::parse($paket->durasi_start)->format('j F Y');
                                                $formattedDurasiEnd = Carbon::parse($paket->durasi_end)->format('j F Y');
                                            @endphp
                                            <p style="color: black; font-size: 15px; margin-left: 5px; margin-right: 5px;">
                                                <span class="durasiKelas">{{ $formattedDurasiStart }} -
                                                    {{ $formattedDurasiEnd }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    {{-- <a href="{{ url('/testimoni?id_user=' . $paket->user_id) }}"
                                        class="btn btn-price">Daftar</a> --}}
                                    {{-- <a href="{{ route('pembayaran', ['id' => $paket->user_id, 'nama_paket' => $paket->nama_paket, 'harga' => $paket->harga]) }}"
                                        class="btn btn-price">Daftar</a> --}}

                                    <a href="{{ route('PembayaranUser.index', ['user_id' => $paket->user_id, 'id' => $paket->id]) }}"
                                        class="btn btn-price">Daftar</a>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Debug: No Pakets -->
                        <p>No Pakets available.</p>
                    @endif
                </div>
                {{ $pakets->appends(request()->input())->links() }}
            </div>
        </div>
    </section>
@endsection
