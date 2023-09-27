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
                        <form action="{{ route('updatePaket.update', $kelasPaket->id) }}" method="POST">
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
                                        <textarea class="form-control" id="summernote" name="deskripsi" rows="3">{{ old('deskripsi', $kelasPaket->deskripsi) }}</textarea>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="durasi_start">Durasi Mulai</label>
                                        <input type="text" class="form-control datepicker" id="durasi_start"
                                            name="durasi_start"
                                            placeholder="{{ old('durasi', $kelasPaket->durasi_start) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="durasi_end">Durasi Akhir</label>
                                        <input type="text" class="form-control datepicker" id="durasi_end"
                                            name="durasi_end" placeholder="{{ old('durasi', $kelasPaket->durasi_end) }}">
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#durasi_start", {
                dateFormat: "d F Y",
                enableTime: false,
            });

            flatpickr("#durasi_end", {
                dateFormat: "d F Y",
                enableTime: false,
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#durasi_start", {
                dateFormat: "d F Y",
                enableTime: false,
                onChange: function(selectedDates, dateStr, instance) {

                    const startDate = new Date(dateStr);

                    const endDate = new Date(startDate);
                    endDate.setMonth(startDate.getMonth() + 1);

                    const endDateStr =
                        ${endDate.getDate()} ${endDate.toLocaleString('default', { month: 'long' })} ${endDate.getFullYear()};

                    document.getElementById('durasi_end').value = endDateStr;
                }
            });

            flatpickr("#durasi_end", {
                dateFormat: "d F Y",
                enableTime: false,
            });
        });
    </script>
@endsection