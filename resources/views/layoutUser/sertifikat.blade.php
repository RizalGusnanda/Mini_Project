@extends('layoutUser.layout.index')

@section('content')
<style>
body{
    background-color: white;
}
</style>

<section class="sertifikat">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-sertif">
                    <div class="card-profile">
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
                            <div class="menu-item">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                            </div>
                            <div class="menu-item">
                                <i class="fas fa-info-circle"></i>
                                <span>Detail Tutor</span>
                            </div>
                            <div class="menu-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Keluar</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card-header-sertifikat">
                    <div class="card-body">
                        <p class="search-text">Detail Tutor</p>
                    </div>
                </div>
                <form  action= "{{ route('sertifikat-layout.update') }}"method="POST" enctype="multipart/form-data">
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
                                <input type="number" class="form-control" id="pengalaman"  name="pengalaman" placeholder=" 1"
                                value="{{ old('pengalaman', optional(auth()->user()->profile)->pengalaman) }}">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pengalaman">Sertifikasi</label>
                                <div class="sertifikasi-group card custom-card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_sertifikasi">Nama Kegiatan/Sertifikasi</label>
                                            <input type="text" class="form-control" id="nama_sertifikasi"
                                                name="nama_sertifikasi"
                                                placeholder="Tambahkan nama kegiatan/sertifikasi yang pernah diikuti">
                                        </div>
                                        <div class="form-group">
                                            <label for="link_kegiatan">Link Kegiatan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fab fa-google-drive"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="link_kegiatan"
                                                    name="link_kegiatan" placeholder="drive.google.com">
                                            </div>
                                        </div>
                                        <div class="form-group tambah-sertifikasi-group input-group">
                                            <input type="text" class="form-control rounded-right"
                                                id="tambah_sertifikasi" name="tambah_sertifikasi"
                                                placeholder="   +  Tambah Sertifikasi">
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
