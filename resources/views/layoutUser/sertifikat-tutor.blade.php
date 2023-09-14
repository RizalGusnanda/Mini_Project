@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
    <section class="sertifikat">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        @php
                            $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                        @endphp
                        @if (file_exists(public_path($profileImagePath)))
                            <img class="profile-pic" src="{{ asset($profileImagePath) }}" alt=""
                                style="width: 150px; height: 150px;">
                        @else
                            <img class="profile-pic" src="{{ asset('path/to/default/image.jpg') }}" alt=""
                                style="width: 150px; height: 150px;">
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
                            <a href="/sertifikat-layout" style="text-decoration: none;">
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
                    <div class="card-header-sertifikat">
                        <div class="card-body">
                            <p class="search-text">Detail Tutor</p>
                        </div>
                    </div>
                    <form action="{{ route('sertifikat-layout.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-formulir-sertifikasi">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="penjelasan_pengalaman">Deskripsi Pembelajaran</label>
                                    <textarea class="form-control" id="penjelasan_pengalaman" name="penjelasan_pengalaman" rows="3">{{ old('penjelasan_pengalaman', optional(auth()->user()->profile)->penjelasan_pengalaman) }}</textarea>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pengalaman">Pengalaman Mengajar (@ tahun)</label>
                                    <input type="number" class="form-control" id="pengalaman" name="pengalaman"
                                        placeholder=" "
                                        value="{{ old('pengalaman', optional(auth()->user()->profile)->pengalaman) }}">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pengalaman">Sertifikasi</label>
                                    <div class="sertifikasi-group card custom-card">
                                        <div class="card-body">
                                            @if (isset($sertifikats) && count($sertifikats) > 0)
                                                @foreach ($sertifikats as $sertifikat)
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="sertifikasi">Nama Kegiatan/Sertifikasi</label>
                                                            <input type="text" class="form-control"
                                                                id="sertifikasi_{{ $loop->index }}" name="sertifikasi[]"
                                                                placeholder="Tambahkan nama kegiatan/sertifikasi yang pernah diikuti"
                                                                value="{{ old('sertifikasi', $sertifikat->sertifikasi) }}">
                                                            <!-- Input tersembunyi untuk ID sertifikat yang sudah ada -->
                                                            <input type="hidden" name="sertifikat_id[]"
                                                                value="{{ $sertifikat->id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="link">Link Kegiatan</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fab fa-google-drive"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    id="link_{{ $loop->index }}" name="link[]"
                                                                    placeholder="drive.google.com"
                                                                    value="{{ old('link', $sertifikat->link) }}">
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                            data-sertifikat-id="{{ $sertifikat->id }}">
                                                            <i class="fas fa-times"></i> Hapus
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endif

                                            <div class="form-group tambah-sertifikasi-group input-group">
                                                <button type="button" class="btn-custom" style="width: 100%">+ Tambah
                                                    Sertifikasi</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tambahSertifikasiBtn = document.querySelector('.btn-custom');
            const sertifikasiGroup = document.querySelector('.sertifikasi-group');
            let sertifikasiCount = 0;

            tambahSertifikasiBtn.addEventListener('click', tambahSertifikasiForm);

            function tambahSertifikasiForm() {
                sertifikasiCount++;

                const newSertifikasi = document.createElement('div');
                newSertifikasi.classList.add('card-body');
                newSertifikasi.innerHTML = `
            <div class="form-group">
                <label for="sertifikasi_${sertifikasiCount}">Nama Kegiatan/Sertifikasi</label>
                <input type="text" class="form-control" id="sertifikasi_${sertifikasiCount}"
                    name="sertifikasi[]" placeholder="Tambahkan nama kegiatan/sertifikasi yang pernah diikuti">
            </div>
            <div class="form-group">
                <label for="link_${sertifikasiCount}">Link Kegiatan</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fab fa-google-drive"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="link_${sertifikasiCount}"
                        name="link[]" placeholder="drive.google.com">
                </div>
            </div>
            <button class="btn btn-sm btn-danger btn-icon confirm-delete" data-sertifikat-id="${sertifikasiCount}">
                <i class="fas fa-times"></i> Hapus
            </button>
        `;

                const btnHapusSertifikasi = newSertifikasi.querySelector('.confirm-delete');
                btnHapusSertifikasi.addEventListener('click', function() {
                    sertifikasiGroup.removeChild(newSertifikasi);
                });

                sertifikasiGroup.appendChild(newSertifikasi);
            }

            const confirmDeleteButtons = document.querySelectorAll('.confirm-delete');

            confirmDeleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const sertifikatId = button.getAttribute('data-sertifikat-id');
                    const isConfirmed = confirm(
                    'Apakah Anda yakin ingin menghapus sertifikat ini?');

                    if (isConfirmed) {
                        hapusSertifikat(sertifikatId);
                    }
                });
            });

            function hapusSertifikat(id) {
                $.ajax({
                    url: `/sertifikat-layout/sertifikat/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.success) {
                            const deletedSertifikat = document.querySelector(`.sertifikat-${id}`);
                            if (deletedSertifikat) {
                                deletedSertifikat.remove();
                            }
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    </script>

@endsection
