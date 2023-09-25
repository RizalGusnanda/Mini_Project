@extends('layoutUser.layout.index')
@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>

    <section class="tambahModulSide">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        @php
                            $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                        @endphp
                        @if (file_exists(public_path($profileImagePath)))
                            <img class="profile-pic" src="{{ asset($profileImagePath) }}" alt="">
                        @else
                            <img class="profile-pic" src="{{ asset('path/to/default/image.jpg') }}" alt="">
                        @endif
                    </div>
                    <div class="card-menu">
                        <div class="menu">
                            <a href="/profileTutor" style="text-decoration: none">
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
                            <a href="paketKelasIklan" style="text-decoration: none; color: black">
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
                            <div class="back-card">
                                <a href="/kelas-guru">
                                    <i class="fas fa-arrow-left back-icon"></i>
                                </a>
                            </div>
                            <div class="text-card">
                                <p class="search-text">Edit Modul</p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('updateModul.update', ['id' => $modul->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card-formulir-modul">
                            <div class="card-body">
                                <div class="form-group select-group">
                                    <label for="pembelajaran">Waktu Pembelajaran</label>
                                    <div class="input-group">
                                        <div class="form-control" id="pembelajaran" name="pembelajaran"
                                            style="background-color: #E8EBF399;">
                                            <label id="pembelajaran" name="nama_modul"> </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="modul-group card custom-card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama_modul">Sub Modul</label>
                                                <input type="text" class="form-control" name="nama_modul"
                                                    value="{{ $modul->nama_modul }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi_modul">Description:</label>
                                                <textarea name="deskripsi_modul" id="summernote" cols="30"
                                                    rows="10">{{$modul->deskripsi_modul}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Perbarui dan Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection