@extends('layoutUser.layout.index')

@section('content')

    <style>
        body {
            background-color: white;
        }
    </style>
    <section class="breadcrumb">
        <!-- Kode Breadcrumb -->
    </section>

    <section class="search">
        <div class="container">
            <div class="card-search-tutor">
                <div class="card-body">
                    <h5 class="card-title-search">Cari tutor sesuai kebutuhanmu</h5>
                    <div class="search-column">
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
            </div>
        </div>
    </section>
    <section class="tutorA-me-section">
        <div class="container">
            @if (isset($searchResults) && count($searchResults) > 0)
                {{-- Tampilkan hasil pencarian --}}
                @php $counter = 0; @endphp
                @foreach ($searchResults as $tutor)
                    @if ($counter % 2 === 0)
                        <div class="row">
                    @endif
                    <div class="col-md-6">
                        <div class="tutorA-card">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Gambar Profil -->

                                    @php
                                        $profileImagePath = 'storage/' . ($tutor->profile ?? 'default.jpg');
                                    @endphp
                                    @if (file_exists(public_path($profileImagePath)))
                                        <img class="card-img-top" src="{{ asset($profileImagePath) }}" alt=""
                                        style="height: 50px">
                                    @else
                                        <img class="card-img-top" src="{{ asset('path/to/default/image.jpg') }}"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <div class="deskripsiTutorA">
                                        <div class="nextArrow">
                                            <a href="{{ route('tutor.detail', ['id' => $tutor->id]) }}" class="next">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M4 13H16.175L10.575 18.6L12 20L20 12L12 4L10.575 5.4L16.175 11H4L4 13Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="card-body-tutorA">
                                            <h4 class="card-tutorA">{{ $tutor->user->name }}</h4>
                                            @if ($tutor->spesialisasi)
                                                <h6 class="card-tutor-p">{{ $tutor->spesialisasi->nama_spesialisasi }}</h6>
                                            @else
                                                <h6 class="card-tutor-p">Tidak Ada Bidang Keahlian</h6>
                                            @endif
                                        </div>
                                        <div class="location">
                                            <i class="fas fa-map-marker-alt"></i> {{ $tutor->alamat}},
                                            {{ $tutor->kecamatan->kecamatan }}
                                        </div>
                                        <div class="teaching-duration">
                                            <i class="fas fa-clock"></i> {{ $tutor->pengalaman }} tahun mengajar
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $counter++; @endphp
                    @if ($counter % 2 === 0 || $loop->last)
                        </div>
                    @endif
                @endforeach
            @else
                <p>No tutors available</p>
            @endif
        </div>
    </section>

@endsection