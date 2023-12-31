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

        .options-button {
            cursor: pointer;
            border: none;
            background: none;
            font-size: 20px;
            /* Atur ukuran ikon sesuai keinginan Anda */
            margin: 0;
            padding: 0;
        }

        .options-dropdown {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            z-index: 1;
            padding: 10px;
            top: 30px;
            left: -10px;
        }

        .options-dropdown a {
            display: block;
            margin-bottom: 5px;
            text-decoration: none;
            color: black;
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

                    <div id="riwayat-kosong" style="display: none; margin-top: 20px; color: red;">
                        Riwayat Reservasi Kosong!
                    </div>

                    <div id="no-reservation" style="display: none; margin-top: 20px; color: red;">
                        Anda belum melakukan reservasi!
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
                                            <i class="fas fa-ellipsis-v options-button"
                                                id="options-button-{{ $pembayaran->id }}"></i>
                                            <div class="options-dropdown" id="options-dropdown-{{ $pembayaran->id }}">
                                                <a href={{ route('kelas-siswa', ['paket_id' => $paket->id, 'id' => $pembayaran->modul_fk_id]) }}>Lihat
                                                    Modul</a>
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
        const optionsButtons = document.querySelectorAll('.options-button');
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
            $('#riwayat-kosong').hide();
            $('#no-reservation').hide();

            let found = false;

            if (filterType === 'semua') {
                $('.tutorA-card').each(function() {
                    if ($(this).length > 0) {
                        $(this).show();
                        found = true;
                    }
                });
            } else if (filterType === 'berlangsung') {
                var currentDate = new Date();
                $('.tutorA-card').each(function() {
                    var startDate = new Date($(this).data('start-date'));
                    var endDate = new Date($(this).data('end-date'));
                    if (startDate <= currentDate && currentDate <= endDate) {
                        $(this).show();
                        found = true;
                    }
                });
            } else if (filterType === 'selesai') {
                var currentDate = new Date();
                $('.tutorA-card').each(function() {
                    var endDate = new Date($(this).data('end-date'));
                    if (endDate < currentDate) {
                        $(this).show();
                        found = true;
                    }
                });
            }

            if (!found) {
                if (filterType === 'semua') {
                    $('#no-reservation').show();
                } else {
                    $('#riwayat-kosong').show();
                }
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
    <script>
        function filterData(filterType) {
            $('.tutorA-card').hide();
            $('#riwayat-kosong').hide(); // Sembunyikan pesan "Riwayat Reservasi Kosong" pada awalnya

            if (filterType === 'semua') {
                $('.tutorA-card').show();
            } else if (filterType === 'berlangsung') {
                var currentDate = new Date();
                var found = false; // Gunakan ini untuk menandai apakah ada data yang sesuai
                $('.tutorA-card').each(function() {
                    var startDate = new Date($(this).data('start-date'));
                    var endDate = new Date($(this).data('end-date'));
                    if (startDate <= currentDate && currentDate <= endDate) {
                        $(this).show();
                        found = true; // Ada data yang sesuai
                    }
                });

                // Jika tidak ada data yang sesuai, tampilkan pesan "Riwayat Reservasi Kosong"
                if (!found) {
                    $('#riwayat-kosong').show();
                }
            } else if (filterType === 'selesai') {
                var currentDate = new Date();
                var found = false; // Gunakan ini untuk menandai apakah ada data yang sesuai
                $('.tutorA-card').each(function() {
                    var endDate = new Date($(this).data('end-date'));
                    if (endDate < currentDate) {
                        $(this).show();
                        found = true; // Ada data yang sesuai
                    }
                });

                // Jika tidak ada data yang sesuai, tampilkan pesan "Riwayat Reservasi Kosong"
                if (!found) {
                    $('#riwayat-kosong').show();
                }
            }
        }
    </script>
@endsection
