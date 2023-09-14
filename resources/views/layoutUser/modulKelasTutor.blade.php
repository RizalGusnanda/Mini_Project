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
                <div class="edit-button-container">
                    <a href="#" class="edit-button">
                        {{-- <a href="{{ route('editModul.edit', ['id' => $modul->id]) }}" class="edit-button"> --}}
                        <i class="fas fa-edit"></i> Edit Kelas
                    </a>
                </div>
                <h2 class="card-title-kelas">Dasar - dasar UI/UX Design</h2>
                <div class="kelas-tutor-details">
                /
                    <h3>Camilla Belle</h3>
                </div>
                <div class="kelas-info">
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
                        <a href="{{route ('modul.tambah',['id' => $paket->id])}}" class="btn btn-tambah">
                            <i class="fas fa-plus"></i>
                        </a>

                        <div class="wek1-content">
                            <div class="modul-card-inner">
                                <p>Pengenalan Kelas</p>
                                <i class="material-icons">arrow_circle_right</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
