@extends('layoutUser.layout.index')
@php
    use App\Http\Controllers\tutorConntroller;
@endphp
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
                        <!-- Form Pencarian -->
                        <form action="{{ route('tutor.search') }}" class="search-form" method="GET">
                            <div class="search-input">
                                <i class="material-icons">cast_for_education</i>
                                <select name="spesialisasis" id="spesalisasis" class="form-control">
                                    <option value="">Pilih Spesialisasi</option>
                                    @foreach ($spesialisasiData as $spesialisasi)
                                        <option value="{{ $spesialisasi->id }}">{{ $spesialisasi->nama_spesialisasi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="search-input">
                                <i class="material-icons">location_on</i>
                                <select name="id_kecamatans" id="id_kecamatans" class="form-control">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatanData as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="card-search-tutor button-tutor">
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
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangkap elemen form pencarian
            var searchForm = document.querySelector('.search-form');

            // Tangkap elemen select options
            var spesialisasiSelect = document.getElementById('spesalisasis');
            var kecamatanSelect = document.getElementById('id_kecamatans');

            // Ketika form pencarian di-submit
            searchForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah aksi default form

                // Ambil nilai dari select options
                var selectedSpesialisasi = spesialisasiSelect.value;
                var selectedKecamatan = kecamatanSelect.value;

                // Bangun URL dengan parameter pencarian
                var searchUrl = "{{ route('tutor.search') }}";
                if (selectedSpesialisasi) {
                    searchUrl += "?search1=" + selectedSpesialisasi;
                }
                if (selectedKecamatan) {
                    searchUrl += (selectedSpesialisasi ? "&" : "?") + "search2=" + selectedKecamatan;
                }

                // Arahkan pengguna ke halaman pencarian tutor
                window.location.href = searchUrl;
            });
        });
    </script>
@endsection
<!-- about me -->
<section class="about-me-section" id="about-me">
    <div class="container">
        <div class="row">
            <div class="title-about">
                <div class="col-md-12 text-center">
                    <h1>kenapa harus <img src="assets/img/GuruLink.png" alt=""></h1>
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
                        <p style="margin-right: 0; margin-left: 0;">Kepercayaan merupakan pondasi utama, dengan menjamin
                            guru berkualitas. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="card-body">
                        <img src="assets/img/personal.png" alt="">
                        <h4>Pendekatan Interaktif</h4>
                        <p style="margin-right: 0; margin-left: 0;">Pengalaman belajar yang disesuaikan dengan kebutuhan
                            pengguna. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="card-body">
                        <img src="assets/img/inovatif.png" alt="">
                        <h4>Dukungan Penuh</h4>
                        <p style="margin-right: 0; margin-left: 0;">Menyajikan platform inovatif dalam mencari guru
                            privat yang tepat. </p>
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
                    <p style="font-size: 14px; margin-right: 0; margin-left: 0;">Platform inovatif yang menyediakan cara
                        mudah dan cepat untuk menemukan guru privat yang berkualitas dan sesuai dengan tujuan belajarmu.
                        Tim kami dengan penuh semangat siap membantu menghubungkanmu dengan guru privat yang tepat,
                        sehingga kamu bisa belajar dengan percaya diri.</p>
                    <a href="" class="btn btn-transparent">Cek Selengkapnya</a>
                </div>
            </div>
        </div>


    </div>
</section>

<!-- end about me -->


<section class="tutorLanding">
    <div class="container">
        @if (isset($searchResults) && count($searchResults) > 0)
            @php $counter = 0; @endphp
            @foreach ($searchResults as $tutor)
                @if ($counter % 2 === 0)
                    <div class="row">
                @endif
            @endforeach
        @endif

        <div class="title-about">
            <div class="col-md-12 text-center">
                <h1>Rekomendasi Tutor <img src="assets/img/GuruLink.png" alt=""></h1>
            </div>
        </div>

        <div class="owl-carousel">
            @if (isset($otherTutors) && count($otherTutors) > 0)
                @foreach ($otherTutors as $tutor)
                    <div class="col-md-3">
                        <div class="tutor-card">
                            @php
                                $profileImagePath = 'storage/' . ($tutor->profile ?? 'default.jpg');
                            @endphp
                            @if (file_exists(public_path($profileImagePath)))
                                <img class="card-img-top" src="{{ asset($profileImagePath) }}" alt="">
                            @else
                                <img class="card-img-top"s src="{{ asset('path/to/default/image.jpg') }}"
                                    alt="">
                            @endif
                            <div class="card-body-tutor">
                                <h4 class="card-tutor">{{ $tutor->user->name }}</h4>
                                @if ($tutor->spesialisasi)
                                    <h6 class="card-tutor-p">{{ $tutor->spesialisasi->nama_spesialisasi }}</h6>
                                @else
                                    <h6 class="card-tutor-p">Tidak Ada Spesialisasi</h6>
                                @endif
                                <div class="location">
                                    <i class="fas fa-map-marker-alt"></i> {{ $tutor->alamat }},
                                    {{ $tutor->kecamatan->kecamatan }}
                                </div>
                                <div class="teaching-duration">
                                    <i class="fas fa-clock"></i> {{ $tutor->pengalaman }} tahun mengajar
                                </div>

                                <div class="rating">
                                    @php
                                        $averageRating = $averageRatings[$tutor->user->id] ?? 0;
                                        $fullStars = floor($averageRating);
                                        $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
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

                                    <!-- Tampilkan rating dalam format "4.9/5" -->
                                    <span class="rating-text">{{ number_format($averageRating, 1) }}/5</span>
                                </div>
                                <div class="Selengkapnya">
                                    <a href="#" class="btn btn-selengkapnya">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No other tutors available</p>
            @endif
        </div>


        <!-- Tombol navigasi berbentuk ikon panah -->
        <div class="text-center">
            <button class="btn btn-nav owl-prev">
                <i class="fas fa-chevron-left"></i> <!-- Ikon panah ke kiri -->
            </button>
            <button class="btn btn-nav owl-next">
                <i class="fas fa-chevron-right"></i> <!-- Ikon panah ke kanan -->
            </button>
        </div>
    </div>
    </div>
</section>


@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        var owl = $(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            nav: false, // Matikan tombol navigasi default
            margin: 20,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        // Tombol navigasi kustom
        $(".owl-prev").click(function() {
            owl.trigger("prev.owl.carousel");
        });

        $(".owl-next").click(function() {
            owl.trigger("next.owl.carousel");
        });
    });
</script>