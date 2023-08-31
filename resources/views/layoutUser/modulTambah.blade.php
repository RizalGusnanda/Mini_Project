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
                            <div class="menu-item">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                            </div>
                            <div class="menu-item">
                                <i class="fas fa-info-circle"></i>
                                <span>Detail Tutor</span>
                            </div>
                            <div class="menu-item">
                                <i class="fas fa-calendar"></i>
                                <span>Reservasi</span>
                            </div>
                            <div class="menu-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Paket Kelas</span>
                            </div>
                            <div class="menu-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Keluar</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-header-modul">
                        <div class="card-body">
                            <div class="back-card">
                                <i class="fas fa-arrow-left back-icon"></i>
                            </div>
                            <div class="text-card">
                                <p class="search-text">Tambah Modul</p>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{ route('modul.store') }}">
                        @csrf
                        <div class="card-formulir-modul">
                            @foreach ($mingguLabels as $mingguIndex => $minggu)
                                <div class="card-body">
                                    <div class="form-group select-group">
                                        <label for="pembelajaran">Waktu Pembelajaran</label>
                                        <div class="input-group">
                                            <div class="form-control" id="pembelajaran" name="pembelajaran"
                                                style="background-color: #E8EBF399;">
                                                <label id="pembelajaran" name="pembelajaran">{{ $minggu }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="modul-group card custom-card">
                                            <div class="card-body">
                                                @foreach ($pertemuanLabels as $index => $pertemuan)
                                                    @php
                                                        $inputName = 'pertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);
                                                        $textareaId = 'Summernotepertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);
                                                        $namaModulValue = ''; // Biarkan kosong, karena pengguna yang akan mengisi
                                                        $deskripsiModulValue = ''; // Biarkan kosong, karena pengguna yang akan mengisi
                                                    @endphp
                                                    <div class="form-group">
                                                        <label for="{{ $inputName }}">Sub Modul Pembelajaran</label>
                                                        <label for="{{ $inputName }}">{{ $pertemuan }}</label>
                                                        <input type="text" class="form-control" id="{{ $inputName }}"
                                                            name="{{ $inputName }}"
                                                            value="{{ old($inputName, $namaModulValue) }}"
                                                            placeholder="Tambahkan Sub Modul Pembelajaran">
                                                        <textarea name="{{ $textareaId }}" id="{{ $textareaId }}" class="form-control summernote" cols="30"
                                                            rows="10">{{ old($textareaId, $deskripsiModulValue) }}</textarea>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
