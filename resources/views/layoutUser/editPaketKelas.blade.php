@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>


    <section class="tambahPaketKelas">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        @php
                            $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                        @endphp
                        @if (file_exists(public_path($profileImagePath)))
                            <img class="profile-pic" src="{{ asset($profileImagePath) }}" alt=""
                                style="width: 170px; height: 170px;">
                        @else
                            <img class="profile-pic" src="{{ asset('path/to/default/image.jpg') }}" alt=""
                                style="width: 170px; height: 170px;">
                        @endif
                    </div>
                    <div class="card-menu">
                        <div class="menu">
                            <a href="/profileTutor" style="text-decoration: none; color: black">
                                <div class="menu-item">
                                    <i class="fas fa-user"></i>
                                    <span>Profile</span>
                                </div>
                            </a>
                            <a href="/sertifikat-layout" style="text-decoration: none; color: black">
                                <div class="menu-item">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Detail Tutor</span>
                                </div>
                            </a>
                            <a href="#">
                                <div class="menu-item" style="text-decoration: none; color: black">
                                    <i class="fas fa-calendar"></i>
                                    <span>Reservasi</span>
                                </div>
                            </a>
                            <a href="paketKelasIklan" style="text-decoration: none">
                                <div class="menu-item">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>Paket Kelas</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-header-modul">
                        <div class="card-body">
                            <a href="/paketKelasIklan" style="color: black">
                                <div class="back-card">
                                    <i class="fas fa-arrow-left back-icon"></i>
                                </div>
                            </a>
                            <div class="text-card">
                                <p class="search-text">Edit Paket Kelas</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('updatePaket.update', ['id' => $kelasPaket->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-formulir-modul">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_paket">Nama Kelas</label>
                                        <input type="text" class="form-control" id="nama_paket" name="nama_paket"
                                            placeholder="" value="{{ old('nama_paket', $kelasPaket->nama_paket) }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="harga">Harga Kelas</label>
                                        <input type="text" class="form-control" id="harga" name="harga"
                                            placeholder="" value="{{ old('harga', $kelasPaket->harga) }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="deskripsiKelas">Deskripsi Kelas</label>
                                        <textarea class="form-control" id="deskripsiKelas" name="deskripsi" rows="3">{{ old('deskripsi', $kelasPaket->deskripsi) }}</textarea>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="durasi">Durasi</label>
                                        <input type="text" class="form-control" id="durasi" name="durasi"
                                            placeholder="" value="{{ old('durasi', $kelasPaket->durasi) }}">
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Perbarui Dan Simpan</button>
                                </div>

                            </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
        </div>

    </section>
@endsection
