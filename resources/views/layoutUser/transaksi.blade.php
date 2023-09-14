@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>

    <section class="transaksi">
        <section class="header">
            <div class="container">
                <div class="row">
                    <div class="col-1 d-flex align-items-center">
                        <a href="#" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-11">
                        <div class="card-search-pem">
                            <div class="card-body">
                                <h5 class="card-title-search mb-0">Pembayaran</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-5">
            <div class="transaksi grid">
                <div class="col-span-3">
                    <div class="p-4 rounded-lg bg-white shadow-soft">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Transaction Detail</p>
                            <p class="text-sm text-primary font-medium">#PX-1839</p>
                        </div>
                        <div class="mt-3">
                            <h3 class="text-3xl font-medium text-primary">Rp. 300,000</h3>
                            <div
                                class="text-xs px-2 py-1 rounded-full bg-red-200 inline-block mt-4 text-red-600 font-semibold status-unpaid">
                                Unpaid</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="p-4 rounded-lg bg-white shadow-soft">
                        <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Instruction</p>
                        <div tabindex="0" class="collapse mt-3">
                            <div class="collapse-title font-medium">
                                <div class="flex items-center justify-between cursor-pointer">
                                    <span>
                                        Internet Banking
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="collapse-content">
                                <p>Lorem, ipsum dolor.</p>
                            </div>
                        </div>
                        <div tabindex="0" class="collapse mt-3">
                            <div class="collapse-title font-medium">
                                <div class="flex items-center justify-between cursor-pointer">
                                    <span>
                                        ATM
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="collapse-content">
                                <p>Lorem, ipsum dolor.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- <div class="container">
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
    </div> --}}
    </section>
@endsection
