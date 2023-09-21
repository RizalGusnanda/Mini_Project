@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
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
                        <button class="btn">Semua</button>
                        <button class="btn">Berlangsung</button>
                        <button class="btn">Selesai</button>
                    </div>

                    <div class="tutorA-card">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="assets/img/tutor1.jpeg" class="card-img-top" alt="Tutor 1">
                            </div>
                            <div class="col-md-7">
                                <div class="tanggal">
                                    <a class="nav-link nav-tanggal">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                                            width="30" style="margin-right: 10px">
                                            <path
                                                d="M600-160q-134 0-227-93t-93-227q0-134 93-227t227-93q134 0 227 93t93 227q0 134-93 227t-227 93Zm-.235-60Q708-220 784-295.765q76-75.764 76-184Q860-588 784.235-664q-75.764-76-184-76Q492-740 416-664.235q-76 75.764-76 184Q340-372 415.765-296q75.764 76 184 76ZM702-337l42-42-113-114-1-147h-60v172l132 131ZM80-610v-60h160v60H80ZM40-450v-60h200v60H40Zm40 160v-60h160v60H80Zm520-190Z" />
                                        </svg>
                                        <p class="tanggal">22 September 2023 - 22 Oktober 2023</p>
                                    </a>
                                </div>
                                <div class="deskripsiTutorA">
                                    <div class="options-menu">
                                        <button class="options-button">⋮</button>
                                        <div class="options-dropdown">
                                            <a href="/kelas-siswa">Lihat Modul</a>
                                            <a href="/chat">Chat</a>
                                            <a href="/testimoni">Testimoni</a>
                                        </div>
                                    </div>
                                    <div class="card-body-tutorA">
                                        <h4 class="card-tutorA">Atmayanti</h4>
                                        <h6 class="card-tutor-p">UI/UX Designer</h6>
                                        <h6 class="card-tutor-q">User Interface (UI)</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.querySelector(".options-button").addEventListener("click", function() {
            var dropdown = document.querySelector(".options-dropdown");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        });
    </script>
@endsection
