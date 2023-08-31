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
            <h6><a href="/landing" style="color: #ccc; text-decoration: none;">Home</a> / <a href="/tutor"
                    style="color: #ccc; text-decoration: none;">Tutor</a> / <a style="color: #070D59;">Detail Tutor</a></h6>

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
                            <img class="img-fluid rounded-start" src="{{ asset('path/to/default/image.jpg') }}"
                                alt="">
                        @endif
                    </div>
                    <div class="col-md-8" style="z-index: 0">
                        <div class="card-body" style="margin-top: 30px;">
                            <h4 class="card-title">{{ $tutor->user->name }}</h4>
                            <p class="card-text">
                                @php
                                    $fullStars = floor($averageRating);
                                    $halfStar = ($averageRating - $fullStars) >= 0.5 ? 1 : 0;
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
                            <button class="btn btn-reservasi mt-3"><a
                                    href="{{ route('daftar-paket', ['id_user' => $tutor->user->id]) }}"
                                    style="text-decoration: none; color: white;">Reservasi Tutor</a></button>
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
                                {{-- <span style="color: #ccc;">Sertifikat Pendidikan:</span>
                                @foreach ($tutor->sertifikats as $sertifikat)
                                    <div style="font-size: 14px">{{ $sertifikat->sertifikasi }}</div>
                                    <div style="font-size: 14px">{{ $sertifikat->link }}</div>
                                @endforeach --}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card h-100" style="background-color: #FFFFFF; border-radius: 15px;">
                        <div class="card-body">
                            <h5 class="card-title" style="border-bottom: 2px solid #0e1d4a;">Sertifikat Pendidikan</h5>
                            <p style="font-size: 14px;">
                                @foreach ($tutor->sertifikats as $sertifikat)
                                    <div class="sertifikat-item">
                                        <p class="sertifikat-name">Nama Sertifikat: {{ $sertifikat->sertifikasi }}</p>
                                        <p class="sertifikat-link">Link Sertifikat: {{ $sertifikat->link }}</p>
                                    </div>
                                @endforeach
                            </p>
                        </div>                        
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
                                <span class="rounded-icon" style="margin-right: 10px;" onclick="scrollTestimonials(-1)">
                                    <i class="material-icons">arrow_back_ios_new</i>
                                </span>
                                <span class="rounded-icon" style="margin-left: 10px;" onclick="scrollTestimonials(1)">
                                    <i class="material-icons">arrow_forward_ios_new</i>
                                </span>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="row">
                                @foreach ($testimoni as $index => $testimoni)
                                <div class="col-md-6 card-container" id="testimonial{{ $index }}">
                                    <div class="card mb-3 testimonial-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <h6>{{ $testimoni->nama }}</h6>
                                                    <div>
                                                        @for ($i = 1; $i <= $testimoni->rating; $i++)
                                                            <i class="fas fa-star yellow-star"></i>
                                                        @endfor
                                                        @for ($i = $testimoni->rating + 1; $i <= 5; $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3" style="font-size: 14px; margin-left: 20px;">
                                                {{ $testimoni->testimoni }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Testimoni Siswa -->

    </section>
    <script>
        let currentTestimonialIndex = 0;
        let testimonials = document.getElementsByClassName('card-container');
        let totalTestimonials = testimonials.length;
    
        function showTestimonials(start, end) {
            for (let i = 0; i < totalTestimonials; i++) {
                testimonials[i].style.display = (i >= start && i < end) ? 'block' : 'none';
            }
        }
    
        function scrollTestimonials(direction) {
            currentTestimonialIndex += direction;
    
            if (currentTestimonialIndex < 0) {
                currentTestimonialIndex = 0;
            } else if (currentTestimonialIndex > totalTestimonials - 2) {
                currentTestimonialIndex = totalTestimonials - 2;
            }
    
            showTestimonials(currentTestimonialIndex, currentTestimonialIndex + 2);
        }
    
        // Show the first two testimonials initially
        showTestimonials(0, 2);
    </script>
@endsection
