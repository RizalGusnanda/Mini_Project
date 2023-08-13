@extends('layoutUser.layout.index')

@section('content')
    <!-- start hero -->
    <section class="hero">
        <div class="container d-flex align-items-center">
            <div class="row align-items-center">
                <div class="col">
                    <p style="margin-left: 0;">Bergabunglah dengan kami</p>
                    <h2 class="mt-50">Temukan Guru Privat Terbaik untuk Mengasah Potensimu di <img
                            src="assets/img/GuruLink.png" alt="GuruLink" style="zoom: 1.5;"></h2>
                    <br>
                    <br>
                    <div class="search-column">
                        <form action="" class="search-form">
                            <div class="search-input">
                                <i class="material-icons">cast_for_education</i>
                                <input type="text" name="search1" placeholder="Cari Tutor">
                            </div>
                            <div class="search-input">
                                <i class="material-icons">location_on</i>
                                <input type="text" name="search2" placeholder="Cari Lokasi">
                            </div>
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <img src="assets/img/cuate.png" alt="" class="img-fluid" style="margin-top: 80px;">
                </div>
            </div>
        </div>
    </section>
    <!-- end hero -->

    <!-- about me -->
    <section class="about-me-section">
        <div class="container">
            <div class="row">
                <div class="title-about">
                    <div class="col-md-12 text-center">
                        <h1>kenapa harus <img src="img/GuruLink.png" alt=""></h1>
                        <p>Kami menawarkan proses pencarian guru privat yang cepat, aman, dan terpercaya. </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-card">
                        <div class="card-body">
                            <img src="assets/img/profesional.png" alt="">
                            <h4>Tutor Profesional</h4>
                            <p style="margin-right: 0; margin-left: 0;">Memiliki keahlian mendalam di bidangnya. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card ">
                        <div class="card-body">
                            <img src="assets/img/terpercaya.png" alt="">
                            <h4>Terpercaya</h4>
                            <p style="margin-right: 0; margin-left: 0;">Kepercayaan merupakan pondasi utama, dengan menjamin guru berkualitas. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <div class="card-body">
                            <img src="assets/img/personal.png" alt="">
                            <h4>Pendekatan Interaktif</h4>
                            <p style="margin-right: 0; margin-left: 0;">Pengalaman belajar yang disesuaikan dengan kebutuhan pengguna. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <div class="card-body">
                            <img src="assets/img/inovatif.png" alt="">
                            <h4>Dukungan Penuh</h4>
                            <p style="margin-right: 0; margin-left: 0;">Menyajikan platform inovatif dalam mencari guru privat yang tepat. </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="about-image">
                        <img src="assets/img/c2.png" alt="Foto Saya">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-content">
                        <span>Tentang</span>
                        <h1>GuruLink</h1>
                        <p style="font-size: 14px; margin-right: 0; margin-left: 0;">Platform inovatif yang menyediakan cara mudah dan cepat untuk menemukan guru privat yang berkualitas dan sesuai dengan tujuan belajarmu. Tim kami dengan penuh semangat siap membantu menghubungkanmu dengan guru privat yang tepat, sehingga kamu bisa belajar dengan percaya diri.</p>
                        <a href="" class="btn btn-transparent">Cek Selengkapnya</a>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- end about me -->

    <!-- price -->
    <section class="price-section-paket">
        <div class="background-container">
            <div class="container">
                <div class="row">
                    @if (isset($pakets) && count($pakets) > 0)
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

                                        <p>{{ $paket->deskripsi }}</p>
                                        <a href="{{ route('tutor.show') }}" class="btn btn-price">Daftar</a>
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

    <!-- end price -->


    <!-- tutor section -->
    <section class="about-me-section">
        <div class="container">
            <div class="row">
                <div class="title-about">
                    <div class="col-md-12 text-center">
                        <h1>Rekomendasi Tutor <img src="assets/img/GuruLink.png" alt=""></h1>

                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="tutor-card">
                            <div class="">

                            </div>
                            <img src="assets/img/tutor1.jpeg" class="card-img-top" alt="Tutor 1">
                            <div class="card-body-tutor">
                                <h4 class="card-tutor">Atmayanti</h4>
                                <h6 class="card-tutor-p">Project Manager</h6>
                                <br>
                            </div>
                            <div class="location">
                                <i class="fas fa-map-marker-alt"></i> Lowokwaru, Malang
                            </div>
                            <div class="teaching-duration">
                                <i class="fas fa-clock"></i> 3 tahun mengajar
                            </div>
                            <div class="rating">
                                <i class="fas fa-star" style="color: gold;"></i> 4.9/5
                            </div>
                            <div class="Selengkapnya">
                                <a href="detail-tutor.html" class="btn btn-selengkapnya">Lihat Selengkapnya</a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>


        </div>
    </section>
    <!-- end tutor section -->
@endsection
