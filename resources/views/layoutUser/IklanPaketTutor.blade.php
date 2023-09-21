@extends('layoutUser.layout.index')
@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
<style>

</style>



    <title>Guru Link</title>
</head>

<body>
    <style>
        body {
            background-color: white;
        }
    </style>

    <section class="paketKelasIklan" style="margin-bottom: 190px">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        @php
                        $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                        @endphp
                        @if (file_exists(public_path($profileImagePath)))
                        <img class="profile-pic" src="{{ asset($profileImagePath) }}" alt="" style="width: 150px; height: 150px;">
                        @else
                        <img class="profile-pic" src="{{ asset('path/to/default/image.jpg') }}" alt="" style="width: 150px; height: 150px;">
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
                            <a href="/riwayatTutor" style="text-decoration: none; color:black">
                                <div class="menu-item">
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
                    <div class="card-header-paketKelas">
                        <div class="card-body">
                            <p class="search-text">Paket Kelas</p>
                        </div>
                    </div>
                    <div class="search-container">
                        <form action="{{ route('daftar-paket-iklanTutor') }}" method="GET" class="search-form">
                            <button type="submit" id="search-button"><i class="fas fa-search"></i></button>
                            <input type="text" id="search-input" name="search" placeholder="Cari Paket..." value="{{ request()->input('search') }}">
                        </form>
                        <a href="{{ route('tambahPaket.create') }}" class="add-button">
                            <span class="add-icon">&#43;</span> Tambah Paket
                        </a>
                    </div>

                    @if (isset($pakets) && count($pakets) > 0)
                    @foreach ($pakets as $paket)
                        @csrf
                        <div class="card-formulir-paketKelas">
                            <div class="ellipsis-icon" onclick="toggleDropdown(this)"><i class="fas fa-ellipsis-v"></i></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <h3>{{ $paket->nama_paket }}</h3>
                                    <span class="harga">Rp.{{ number_format($paket->harga, 0, ',', '.') }} / bulan
                                    </span>
                                    <p>{!! $paket->deskripsi !!}</p>
                                </div>
                            </div>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Edit Modul</a>
                                <a href="{{ route('editPaket.edit', ['id' => $paket->id]) }}" class="dropdown-item">Edit Kelas</a>
                                <form action="{{ route('hapusPaket.destroy', ['id' => $paket->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Hapus Kelas</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    @endif
                       {{ $pakets->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function toggleDropdown(icon) {
            var dropdown = icon.parentElement.querySelector(".dropdown-menu");
            dropdown.classList.toggle("show");
        }
    </script>



@endsection