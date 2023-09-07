@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }

        .btn {
            /* Gaya umum tombol */
            padding: 10px 20px;

            border: none;
            cursor: pointer;
        }

        .btn.aktif {
            /* Gaya tombol ketika aktif */
            background-color: #1F3C88;
            color: #fff;
        }
    </style>

    <section class="riwayat">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- Card Foto Profile -->
                    <div class="card foto-Profile">
                        <input type="file" name="image" class="d-none" id="picture">
                        @php
                            $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                        @endphp
                        @if (file_exists(public_path($profileImagePath)))
                            <img class="profile-pic" src="{{ asset($profileImagePath) }}" alt=""
                                style="width: 150px; height: 150px;">
                        @else
                            <img class="profile-pic" src="{{ asset('path/to/default/image.jpg') }}" alt=""
                                style="width: 150px; height: 150px;">
                        @endif
                    </div>
                    <div class="card-menu">
                        <div class="menu">
                            <a href="/tutor">
                                <div class="menu-item">
                                    <i class="fas fa-user"></i>
                                    <span>Profile</span>
                                </div>
                            </a>
                            <div class="menu-item">
                                <i class="fas fa-info-circle"></i>
                                <span>Detail Tutor</span>
                            </div>
                            <div class="menu-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Keluar</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Card Header "Cari tutor sesuai kebutuhanmu" -->
                    <div class="card-header-profilTutor">
                        <div class="card-body">
                            <h5 class="card-title-search" style="margin-left: 30px">Riwayat Reservasi</h5>
                        </div>
                    </div>

                    <!-- Button Group -->
                    <div class="button-reservasi">
                        <button class="btn" onclick="toggleFilter(this)">Semua</button>
                        <button class="btn" onclick="toggleFilter(this)">Berlangsung</button>
                        <button class="btn" onclick="toggleFilter(this)">Selesai</button>
                    </div>


                    <div class="tutorA-card">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ asset('storage/' . $tutorProfile->profile) }}" class="card-img-top" alt="{{ $tutorProfile->user->name }}">
                            </div>
                            <div class="col-md-7">
                                <div class="tanggal">
                                    <a class="nav-link nav-tanggal">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                                            width="30" style="margin-right: 10px">
                                            <path
                                                d="M600-160q-134 0-227-93t-93-227q0-134 93-227t227-93q134 0 227 93t93 227q0 134-93 227t-227 93Zm-.235-60Q708-220 784-295.765q76-75.764 76-184Q860-588 784.235-664q-75.764-76-184-76Q492-740 416-664.235q-76 75.764-76 184Q340-372 415.765-296q75.764 76 184 76ZM702-337l42-42-113-114-1-147h-60v172l132 131ZM80-610v-60h160v60H80ZM40-450v-60h200v60H40Zm40 160v-60h160v60H80Zm520-190Z" />
                                        </svg>
                                        {{ $selectedPakets->durasi_start }} - {{ $selectedPakets->durasi_end }}
                                    </a>
                                </div>
                                <div class="deskripsiTutorA">
                                    <div class="selengkapnya">
                                        <a href="/detailReservasi" class="btn btn-selengkapnya">Selengkapnya</a>
                                    </div>
                                    <div class="card-body-tutorA">
                                        @if (isset($selectedPakets))
                                        <!-- Tampilkan informasi paket yang dipilih di sini -->
                                        <h4 class="card-tutorA">{{ $selectedPakets->nama_paket }}</h4>
                                        <h6 class="card-tutor-p">{{ $selectedPakets->deskripsi }}</h6>
                                        @else
                                        <!-- Tampilkan pesan jika tidak ada paket yang dipilih -->
                                        <h6 class="card-tutor-p">Anda belum memilih paket pembelajaran.</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    function toggleFilter(clickedButton) {
        // Menghapus kelas "aktif" dari semua tombol
        var buttons = document.querySelectorAll(".btn");
        buttons.forEach(function(button) {
            button.classList.remove("aktif");
        });

        // Menambahkan kelas "aktif" ke tombol yang diklik
        clickedButton.classList.add("aktif");
    }
</script>


