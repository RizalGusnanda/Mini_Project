@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }

        .pagination{
            padding: 6px 136px
        }
    </style>

    <section class="riwayat">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- Card Foto Profile -->
                    <div class="card foto-Profile">
                        <input type="file" name="image" class="d-none" id="picture" onchange="previewImage(this)">
                        @php
                            $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                        @endphp
                        @if (file_exists(public_path($profileImagePath)))
                            <img class="profile-pic" id="preview" src="{{ asset($profileImagePath) }}" alt=""
                                style="width: 150px; height: 150px;">
                        @else
                            <img class="profile-pic" id="preview" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                alt="" style="width: 150px; height: 150px;">
                        @endif
                    </div>
                    <div class="card-menu">
                        <div class="menu">
                            <a href="/profileSiswa" style="text-decoration: none; color: black">
                                <div class="menu-item">
                                    <i class="fas fa-user"></i>
                                    <span>Profile</span>
                                </div>
                            </a>
                            <a href="/reservasiUser" style="text-decoration: none; color: black">
                                <div class="menu-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>Reservasi</span>
                                </div>
                            </a>
                            <a href="/riwayatPembayaran" style="text-decoration: none;">
                                <div class="menu-item">
                                    <i class="fas fa-money-bill"></i>
                                    <span>Pembayaran</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Card Header "Cari tutor sesuai kebutuhanmu" -->
                    <div class="card-header-profilTutor">
                        <div class="card-body">
                            <h5 class="card-title-search">Riwayat Pembayaran</h5>
                        </div>
                    </div>

                    <!-- Button Group -->
                    <div class="button-reservasi">
                        <button class="btn filter-button" data-status="all">Semua</button>
                        <button class="btn filter-button" data-status="unpaid">Belum Dibayar</button>
                        <button class="btn filter-button" data-status="paid">Sudah Dibayar</button>

                    </div>

                    @foreach ($pembayaranList as $pembayaran)
                        <div class="tutorA-card" data-status="{{ $pembayaran->status }}">
                            <div class="row" style="padding: 5px">
                                <div class="col-md-7">
                                    <div class="tanggal">
                                        <a class="nav-link nav-tanggal">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 24 24"
                                                width="30" style="margin-right: 10px">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <circle cx="12" cy="12" r="10"
                                                    fill="{{ $pembayaran->status == 'unpaid' ? 'red' : 'green' }}" />
                                                <path fill="#FFF"
                                                    d="M9 16.2l-3.7-3.7a1 1 0 011.4-1.4L9 13.4l7.3-7.3a1 1 0 111.4 1.4L9 16.2z" />
                                            </svg>
                                            <p class="tanggal"
                                                style="color: {{ $pembayaran->status == 'unpaid' ? 'red' : 'green' }}">
                                                {{ $pembayaran->status == 'unpaid' ? 'Belum Dibayar' : 'Sudah Dibayar' }}
                                            </p>
                                        </a>
                                    </div>

                                    <div class="deskripsiTutorA">
                                        <div class="card-body-tutorA">
                                            <h4 class="card-tutorA">
                                                {{ $pembayaran->paket->nama_paket ?? 'Nama Paket Belum ditemukan' }}</h4>
                                            <h6 class="card-tutor-p" style="color: black">
                                                Rp.{{ number_format($pembayaran->total_amount, 0, ',', '.') }}</h6>
                                            @if ($pembayaran->status == 'unpaid')
                                                <a href="#" class="btn btn-primary btn-bayar"
                                                    style="margin-left: 650px; margin-top: -85px;">Bayar</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination">
                        @php
                            $currentStatus = request()->get('status');
                        @endphp

                        @if ($pembayaranList->total() > 0)
                            {{ $pembayaranList->appends(request()->input())->links() }}
                        @else
                            @switch($currentStatus)
                                @case('unpaid')
                                    <p>Tidak ada data pembayaran yang belum dibayar.</p>
                                @break

                                @case('paid')
                                    <p>Semua pembayaran telah selesai.</p>
                                @break

                                @default
                                    <p>Tidak ada data pembayaran.</p>
                            @endswitch
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            // Bagian untuk .options-button
            $(".options-button").click(function() {
                var dropdown = $(".options-dropdown");
                var currentDisplay = dropdown.css("display");
                dropdown.css("display", currentDisplay === "block" ? "none" : "block");
            });

            // Bagian untuk .filter-button
            $('.filter-button').click(function() {
                var statusFilter = $(this).data('status');

                // Redirect ke URL dengan parameter status.
                window.location.href = '/riwayatPembayaran?status=' + statusFilter;
            });

            var currentStatus = new URLSearchParams(window.location.search).get('status');
            if (!currentStatus) {
                currentStatus = 'all'; // default ke 'all' jika tidak ada parameter status
            }
            $(`.filter-button[data-status="${currentStatus}"]`).addClass('active');
        });
    </script>
@endsection
