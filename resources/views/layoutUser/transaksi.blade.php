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
                <li class="breadcrumb-item active"><a href="#">Pembayaran</a></li>
            </ol>
        </nav>
    </div>
</section>

<section class="pembayaran">
<section class="header">
    <div class="container">
        <div class="row">
            <div class="col-1">
                <a href="#" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="col-11">
                <div class="card-search-pem">
                    <div class="card-body">
                        <h5 class="card-title-search">Pembayaran</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img class="profile-pic" src="assets/img/tutor1.jpeg" alt="Profile Picture">
                    <h2 class="name">Camilla Bele</h2>
                    <p class="profession">UI/UX Design</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-ringkasan">
                    <h3 class="ringkasan-title" style="margin-left: 3px;">Ringkasan Produk</h3>
                    <div class="ringkasan-content">
                        <div class="paket-section">
                            <a href="tautan_anda_di_sini" style="margin-left: -10px;">
                                <div class="label-bold">Edit Paket</div>
                            </a>
                            <div class="harga">Harga</div>
                        </div>
                        <div class="row">
                            <div class="label-bold">Paket Belajar</div>
                            <div class="value-section">
                                <div class="value">Basic</div>
                                <div class="price">Rp 380.000</div>
                            </div>
                            <hr>
                            <div class="price-section">
                                <div class="label-bold">Total Harga:</div>
                                <div class="total-price">Rp 380.000</div>
                            </div>
                            <div class="payment-button">
                                <button>Pembayaran</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
