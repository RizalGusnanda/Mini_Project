@extends('layoutUser.layout.index')
@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
    <section class="breadcrumb">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active"><a href="#">Paket</a></li>
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
                    @if(isset($pakets) && count($pakets) > 0)
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
                                      <p><span class="harga">Rp.{{ number_format($paket->harga, 0, ',', '.') }} / </span> bulan</p>
                                  </div>
                                  
                                  <p>{{ $paket->deskripsi }}</p>
                                    <a href="#" class="btn btn-price">Daftar</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Debug: No Pakets -->
                        <p>No Pakets available.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
