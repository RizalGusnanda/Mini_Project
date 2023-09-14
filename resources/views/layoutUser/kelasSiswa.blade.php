@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
    <section class="KelasSiswa">
        <div class="container" style="margin-top: 50px;">
            <a href="#" class="rounded-icon">
                <i class="material-icons">arrow_back_ios_new</i>
            </a>
            <div class="title-kelas">
                <p>Detail Kelas</p>
            </div>
        </div>

        <div class="card-container">
            <!-- Card Kiri -->
            <div class="card-left">
                <h2 class="card-title-kelas">Dasar - dasar UI/UX Design</h2>
                <div class="kelas-tutor-details">
                    <img src="assets/img/tutor1.jpeg" alt="Tutor Image" class="tutor-image-small">
                    <h3>Camilla Belle</h3>
                </div>
                <div class="kelas-info">
                    <div class="duration">
                        <p class="duration-title" style="font-size: 14px;">Durasi</p>
                        <p class="duration-details" style="font-size: 14px;"><i class="fas fa-calendar-alt"
                                style="padding: 5px;"></i>1 September -
                            30 September 2023</p>
                    </div>
                    <div class="referensi">
                        <p class="referensi-title" style="font-size: 14px;">Referensi</p>
                        <p class="referensi-details" style="font-size: 14px;"><i class="fas fa-file-alt"
                                style="padding: 5px;"></i>3 Dokumen</p>
                    </div>
                </div>
                <div class="gambaran-umum">
                    <p class="gambaran-title">Gambaran Umum</p>
                    <p class="gambaran-detail">Lorem ipsum dolor sit amet consectetur. Auctor mattis ac interdum amet.
                        Faucibus nisi commodo euismod odio. Laoreet nisl mauris mauris vitae vitae dapibus. Netus
                        ullamcorper vivamus viverra nulla massa elementum. Sit id in eget posuere.</p>
                </div>
                <div class="produk-desain">
                    <p class="produk-title">Yang akan dipelajari</p>
                    <p class="produk-detail">Lorem ipsum dolor sit amet consectetur. Auctor mattis ac interdum amet.
                        Faucibus nisi commodo euismod odio. Laoreet nisl mauris mauris vitae vitae dapibus. Netus
                        ullamcorper vivamus viverra nulla massa elementum. Sit id in eget posuere.</p>
                </div>
                <div class="selanjutnya">
                    <a href="#">
                        <p class="selanjutnya-text" style="margin-left: 550px; margin-right: 5px;">Selanjutnya</p>
                    </a>
                    <div class="selanjutnya-icon">
                        <i class="material-icons">arrow_forward_ios_new</i>
                    </div>
                </div>
            </div>

            <!-- Card Kanan (Anda dapat mengisi konten sesuai kebutuhan) -->
            <div class="card-right">
                <div class="modul-card">
                    <div class="modul-modul-card">
                        <h3 style="font-size: 20px; font-weight: bold;">Modul Pembelajaran</h3>
                        <div class="wek1">
                            <p class="wek1-title">Pembuka</p>
                        </div>
                        @foreach($moduls as $modul)
                        <div class="wek1-content">
                            <div class="modul-card-inner">
                                <p>{{ $loop->iteration }}. {{ $modul->nama_modul }}</p>
                                <i class="material-icons">arrow_circle_right</i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
