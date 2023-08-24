@extends('layoutUser.layout.index')
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
    <section class="detailTutor">
        <div class="container">
            <h6><span style="color: #ccc;">Home / Tutor /</span> <span style="color: #070D59;">Detail Tutor</span></h6>
        </div>

        <div class="container mt-3">
            <div class="card" style="background-color: #EBEBEB; border-radius: 15px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        @php
                            $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                        @endphp
                        @if (file_exists(public_path($profileImagePath)))
                            <img class="img-fluid rounded-start" src="{{ asset($profileImagePath) }}" alt="">
                        @else
                            <img class="img-fluid rounded-start" src="{{ asset('path/to/default/image.jpg') }}" alt="">
                        @endif
                    </div>
                    <div class="col-md-8" style="z-index: 0">
                        <div class="card-body" style="margin-top: 30px;">
                            <h4 class="card-title">{{ $tutor->user->name }}</h4>
                            <p class="card-text">
                                <i class="fas fa-star yellow-star"></i>
                                <i class="fas fa-star yellow-star"></i>
                                <i class="fas fa-star yellow-star"></i>
                                <i class="fas fa-star yellow-star"></i>
                                <i class="fas fa-star yellow-star"></i>
                            </p>
                            <div class="d-flex flex-row justify-content-between">
                                <div class="card-text d-flex flex-column">
                                    <span style="color: #ccc;">Keahlian:</span>
                                    <span>{{ $tutor->spesialisasi->nama_spesialisasi }}</span>
                                </div>
                                <div class="card-text d-flex flex-column">
                                    <span style="color: #ccc;">Alamat:</span>
                                    <span>{{ $tutor->alamat }}</span>
                                </div>
                                <div class="card-text d-flex flex-column">
                                    <span style="color: #ccc;">Pengalaman:</span>
                                    <span>{{ $tutor->pengalaman }} tahun mengajar</span>
                                </div>
                            </div>
                            <button class="btn btn-reservasi mt-3">Reservasi Tutor</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Informasi Tutor -->
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="card h-100" style="background-color: #FFFFFF; border-radius: 15px;">
                        <div class="card-body">
                            <h5 class="card-title" style="border-bottom: 2px solid #0e1d4a;">Informasi Tutor</h5>
                            <p class="card-text" style="font-size: 14px;">
                                <span style="color: #ccc;">Jenis Kelamin:</span> {{ $tutor->jenis_kelamin }}.<br>
                                <span style="color: #ccc;">Alamat:</span> {{ $tutor->kelurahan->kelurahan }},
                                {{ $tutor->kecamatan->kecamatan }} ,{{ $tutor->alamat }}. <br>
                                <span style="color: #ccc;">Latar Belakang Pendidikan:</span> {{ $tutor->pendidikan }}
                                {{ $tutor->jurusan }}, {{ $tutor->instansi }}.<br>
                                <span style="color: #ccc;">Sertifikat Pendidikan:</span> {{ $tutor->sertifikat }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card h-100" style="background-color: #FFFFFF; border-radius: 15px;">
                        <div class="card-body">
                            <h5 class="card-title" style="border-bottom: 2px solid #0e1d4a;">Deskripsi Pembelajaran</h5>
                            <p style="font-size: 14px; margin-right: 0; margin-left: 0;">
                                {{ $tutor->penjelasan_pengalaman }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Informasi Tutor -->

        <!-- Card Testimoni Siswa -->
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3" style="background-color: #FFFFFF; border-radius: 15px;">
                        <div class="card-body d-flex justify-content-between mb-3">
                            <h5 class="card-title">Testimoni Siswa</h5>
                            <div class="pagination">
                                <span class="rounded-icon" style="margin-right: 10px;">
                                    <i class="material-icons">arrow_back_ios_new</i>
                                </span>
                                <span class="rounded-icon" style="margin-left: 10px;">
                                    <i class="material-icons">arrow_forward_ios_new</i>
                                </span>
                            </div>
                        </div>

                        <!-- First Student Testimonial Card -->
                        <div class="row">
                            <div class="col-md-6 card-container">
                                <div class="card mb-3 testimonial-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/tutor1.jpeg') }}" alt="Student 1"
                                                class="rounded-circle" style="width: 60px; height: 60px;">
                                            <div class="ms-3">
                                                <h6>John Doe</h6>
                                                <div>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3" style="font-size: 14px">John's review about the tutor goes here.
                                            It's a great experience!
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Second Student Testimonial Card -->
                            <div class="col-md-6 card-container">
                                <div class="card mb-3 testimonial-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/img/tutor1.jpeg') }}" alt="Student 2"
                                                class="rounded-circle" style="width: 60px; height: 60px;">
                                            <div class="ms-3">
                                                <h6>Jane Smith</h6>
                                                <div>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star-half-alt yellow-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3" style="font-size: 14px">Jane's review about the tutor goes here.
                                            I learned a lot!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Testimoni Siswa -->
    </section>
@endsection
