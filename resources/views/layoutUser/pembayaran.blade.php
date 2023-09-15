@extends('layoutUser.layout.index')
@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>

    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <a href="{{ route('daftar-paket', ['id_user' => $tutor->user->id]) }}" class="pembayaran-back-icon"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-11">
                    <div class="pembayaran-card-search-pem">
                        <div class="card-body">
                            <h5 class="pembayaran-card-title-search">Pembayaran</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pembayaran-sertifikat">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="pembayaran-card">
                        @php
                            $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                        @endphp
                        @if (file_exists(public_path($profileImagePath)))
                            <img class="profile-pic" src="{{ asset($profileImagePath) }}" alt="">
                        @else
                            <img class="profile-pic" src="{{ asset('path/to/default/image.jpg') }}" alt="">
                        @endif

                        <h2 class="pembayaran-name">{{ $tutor->user->name }}</h2>
                        <p class="pembayaran-profession">{{ $tutor->spesialisasi->nama_spesialisasi }}</p>
                        <div class="stars">
                            @php
                                $fullStars = floor($avg);
                                $halfStar = $avg - $fullStars >= 0.5 ? 1 : 0;
                                $emptyStars = 5 - $fullStars - $halfStar;
                            @endphp

                            <!-- Full stars -->
                            @for ($i = 1; $i <= $fullStars; $i++)
                                <i class="fas fa-star yellow-star"></i>
                            @endfor

                            <!-- Half star -->
                            @if ($halfStar)
                                <i class="fas fa-star-half-alt yellow-star"></i>
                            @endif

                            <!-- Empty stars -->
                            @for ($i = 1; $i <= $emptyStars; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="pembayaran-card-ringkasan">
                        <h3 class="pembayaran-ringkasan-title" style="margin-left: 3px;">RINGKASAN PRODUK</h3>
                        <div class="pembayaran-ringkasan-content">
                            <div class="pembayaran-paket-section">
                                <div class="pembayaran-label-bold" style="margin-left: -10px">Paket Belajar</div>
                                <div class="pembayaran-harga">Harga</div>
                            </div>
                            <div class="row">
                                <div class="value-section">
                                    <div class="pembayaran-value">{{ $paket->nama_paket }}</div>
                                    <div class="pembayaran-price">Rp.{{ number_format($paket->harga, 0, ',', '.') }} </div>
                                </div>
                                <hr>
                                <div class="pembayaran-price-section">
                                    <div class="pembayaran-label-bold" style="text-align: center">Pilih Metode Pembayaran
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach ($channels as $channel)
                                    <div class="col-md-3 mb-2">
                                        <form action="{{ route('PembayaranUser.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $paket->id }}">
                                            <input type="hidden" name="method" value="{{ $channel->code }}">
                                            <div class="card">
                                                <img src="{{ asset('assets/img/bank/' . $channel->code . '.png') }}" class="card-img-top equal-image" alt="{{ $channel->name }}">
                                                <div class="card-body text-center">
                                                    <p class="card-text" style="color: #ccc; font-size: 14px">Pay with {{ $channel->name }}</p>
                                                    <button type="submit" class="btn btn-primary" style="margin-top: 20px">Pay</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endforeach
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
