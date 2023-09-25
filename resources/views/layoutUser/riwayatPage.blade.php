@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }

        .button-reservasi .btn.active {
            background-color: #007bff;
            color: #fff;
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
                            <a href="/reservasiUser" style="text-decoration: none;">
                                <div class="menu-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>Reservasi</span>
                                </div>
                            </a>
                            <a href="/riwayatPembayaran" style="text-decoration: none; color: black">
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
                            <h5 class="card-title-search">Riwayat Reservasi</h5>
                        </div>
                    </div>

                    <!-- Button Group -->
                    <div class="button-reservasi">
                        <button class="btn" id="btn-semua" data-filter="semua">Semua</button>
                        <button class="btn" id="btn-berlangsung" data-filter="berlangsung">Berlangsung</button>
                        <button class="btn" id="btn-selesai" data-filter="selesai">Selesai</button>
                    </div>

                    @foreach ($pembayarans as $pembayaran)
                        <div class="tutorA-card"
                            data-start-date="{{ $pembayaran->paket->durasi_start? \Carbon\Carbon::parse($pembayaran->paket->durasi_start)->tz('Asia/Jakarta')->toIso8601String(): '' }}"
                            data-end-date="{{ $pembayaran->paket->durasi_end? \Carbon\Carbon::parse($pembayaran->paket->durasi_end)->tz('Asia/Jakarta')->toIso8601String(): '' }}">
                            <div class="row">
                                <div class="col-md-2">
                                    @php
                                        $profileImagePath = 'storage/' . ($pembayaran->paket->user->profile->profile ?? 'default.jpg');
                                    @endphp
                                    <img class="card-img-top" src="{{ asset($profileImagePath) }}" alt="">
                                </div>
                                <div class="col-md-7">
                                    <div class="tanggal">
                                        <a class="nav-link nav-tanggal">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                                                width="30" style="margin-right: 10px">
                                                <path
                                                    d="M600-160q-134 0-227-93t-93-227q0-134 93-227t227-93q134 0 227 93t93 227q0 134-93 227t-227 93Zm-.235-60Q708-220 784-295.765q76-75.764 76-184Q860-588 784.235-664q-75.764-76-184-76Q492-740 416-664.235q-76 75.764-76 184Q340-372 415.765-296q75.764 76 184 76ZM702-337l42-42-113-114-1-147h-60v172l132 131ZM80-610v-60h160v60H80ZM40-450v-60h200v60H40Zm40 160v-60h160v60H80Zm520-190Z" />
                                            </svg>
                                            @php
                                                $start = \Carbon\Carbon::parse($pembayaran->paket->durasi_start ?? '');
                                                $end = \Carbon\Carbon::parse($pembayaran->paket->durasi_end ?? '');
                                            @endphp
                                            <p class="tanggal">{{ $start ? $start->format('d F Y') : 'N/A' }} -
                                                {{ $end ? $end->format('d F Y') : 'N/A' }}</p>
                                        </a>
                                    </div>
                                    <div class="deskripsiTutorA">
                                        <div class="options-menu">
                                            <button class="options-button"
                                                id="options-button-{{ $pembayaran->id }}">⋮</button>
                                            <div class="options-dropdown" id="options-dropdown-{{ $pembayaran->id }}">
                                                <a href="/kelas-siswa">Lihat Modul</a>
                                                <a href="/chatify">Chat</a>
                                                @if (!$pembayaran->has_testimoni)
                                                    <a
                                                        href="{{ route('testimoni.create', ['id_pembayaran' => $pembayaran->id]) }}">Testimoni</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body-tutorA">
                                            <h4 class="card-tutorA">{{ $pembayaran->paket->user->name ?? 'N/A' }}</h4>
                                            <h6 class="card-tutor-p">
                                                {{ $pembayaran->paket->user->profile->spesialisasi->nama_spesialisasi ?? 'N/A' }}
                                            </h6>
                                            <h6 class="card-tutor-q">{{ $pembayaran->paket->nama_paket ?? 'N/A' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Temukan semua elemen options-button dan options-dropdown
        const optionsButtons = document.querySelectorAll('[class^="options-button"]');
        const optionsDropdowns = document.querySelectorAll('[class^="options-dropdown"]');

        // Tambahkan event listener ke setiap options-button
        optionsButtons.forEach(button => {
            button.addEventListener("click", function() {
                const dropdownId = this.id.replace("options-button-", "");
                const dropdown = document.getElementById("options-dropdown-" + dropdownId);

                if (dropdown.style.display === "block") {
                    dropdown.style.display = "none";
                } else {
                    dropdown.style.display = "block";
                }
            });
        });
    </script>
    <script>
        // Fungsi untuk mengatur warna tombol yang aktif
        function setActiveButton(buttonId) {
            $('.btn').removeClass('active');
            $('#' + buttonId).addClass('active');
        }

        // Fungsi untuk menyaring data
        function filterData(filterType) {
            $('.tutorA-card').hide();
            if (filterType === 'semua') {
                $('.tutorA-card').show();
            } else if (filterType === 'berlangsung') {
                var currentDate = new Date();
                $('.tutorA-card').each(function() {
                    var startDate = new Date($(this).data('start-date'));
                    var endDate = new Date($(this).data('end-date'));
                    if (startDate <= currentDate && currentDate <= endDate) {
                        $(this).show();
                    }
                });
            } else if (filterType === 'selesai') {
                var currentDate = new Date();
                $('.tutorA-card').each(function() {
                    var endDate = new Date($(this).data('end-date'));
                    if (endDate < currentDate) {
                        $(this).show();
                    }
                });
            }
        }

        // Tambahkan event listener ke tombol untuk mengatur warna dan menyaring data
        $('#btn-semua').click(function() {
            setActiveButton('btn-semua');
            filterData('semua');
        });

        $('#btn-berlangsung').click(function() {
            setActiveButton('btn-berlangsung');
            filterData('berlangsung');
        });

        $('#btn-selesai').click(function() {
            setActiveButton('btn-selesai');
            filterData('selesai');
        });
    </script>
@endsection
