@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
    <section class="foto-Profile">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Card Foto Profile -->
                        <div class="card foto-Profile">
                            <label for="picture" class="plus-icon">
                                <i class="fas fa-plus"></i>
                            </label>
                            <input type="file" name="image" class="d-none" id="picture"
                                onchange="previewImage(this)">
                            @php
                                $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                            @endphp
                            @if (file_exists(public_path($profileImagePath)))
                                <img class="profile-pic" id="preview" src="{{ asset($profileImagePath) }}" alt=""
                                    style="width: 150px; height: 150px;">
                            @else
                                <img class="profile-pic" id="preview" src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt=""
                                    style="width: 150px; height: 150px;">
                            @endif
                        </div>
                        <div class="card-menu">
                            <div class="menu">
                                <a href="/profileSiswa" style="text-decoration: none;">
                                    <div class="menu-item">
                                        <i class="fas fa-user"></i>
                                        <span>Profile</span>
                                    </div>
                                </a>
                                <a href="/reservasiUser" style="text-decoration: none; color: black">
                                    <div class="menu-item">
                                        <i class="fas fa-calendar"></i>
                                        <span>Reservasi</span>
                                    </div>
                                </a>
                                <a href="/riwayatPembayaran" style="text-decoration: none; color: black">
                                    <div class="menu-item">
                                        <i class="fas fa-money-bill"></i>
                                        <span>Pembayaran</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Card Header "Cari tutor sesuai kebutuhanmu" -->
                        <div class="card-header-profilTutor">
                            <div class="card-body">
                                <h5 class="card-title-search">Informasi Siswa</h5>
                            </div>
                        </div>

                        <!-- Card Formulir Edit Profile -->
                        <div class="card-formulir">
                            <div class="card-body">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Username</label>
                                        <input class="form-control" id="inputUsername" type="text" name="username"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Alamat Email</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" name="email"
                                            value="{{ auth()->user()->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputAlamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="inputAlamat" name="alamat"
                                            value="{{ old('alamat', optional(auth()->user()->profile)->alamat) }}">
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="id_kecamatans" class="small mb-1">Kecamatan</label>
                                            <select id="id_kecamatans"
                                                class="form-control @error('id_kecamatans') is-invalid @enderror"
                                                name="id_kecamatans">
                                                <option value="">Pilih Kecamatan</option>
                                                @foreach ($kecamatans as $kecamatan)
                                                    <option @if ($profile && $profile->id_kecamatans == $kecamatan->id) selected @endif
                                                        value="{{ $kecamatan->id }}">
                                                        {{ $kecamatan->kecamatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_kecamatans')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="id_kelurahans" class="small mb-1">Kelurahan</label>
                                            <select id="id_kelurahans"
                                                class="form-control @error('id_kelurahans') is-invalid @enderror"
                                                name="id_kelurahans" disabled>
                                                <option value="">Pilih Kelurahan</option>
                                            </select>
                                            @error('id_kelurahans')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="jenis_kelamin" class="small mb-1">Jenis Kelamin</label>
                                            <select id="jenis_kelamin"
                                                class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin">
                                                <option value=""
                                                    {{ old('jenis_kelamin', optional(auth()->user()->profile)->jenis_kelamin) === null ? 'selected' : '' }}>
                                                    Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki"
                                                    {{ old('jenis_kelamin', optional(auth()->user()->profile)->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="Perempuan"
                                                    {{ old('jenis_kelamin', optional(auth()->user()->profile)->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputPhone">Nomor Telepon</label>
                                            <input class="form-control" id="inputPhone" type="tel" name="telepon"
                                                value="{{ old('telepon', optional(auth()->user()->profile)->telepon) }}">
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <!-- Tambahkan div untuk mengatur tombol di tengah form -->
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#id_kecamatans').change(function() {
                var id_kecamatans = this.value;
                $('#id_kelurahans').html('<option value="">Pilih Nama Kelurahan</option>');
                if ($(this).val() == '') {
                    $('#id_kelurahans').attr('disabled', true);
                } else {
                    $('#id_kelurahans').removeAttr('disabled', false);
                }
                var id_kecamatans = $(this).val();
                $.ajax({
                    url: '{{ route('get-kelurahan') }}',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        kecamatan_id: id_kecamatans,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // console.log(response);
                        var kelurahanDropdown = $('#id_kelurahans');
                        kelurahanDropdown.empty();
                        kelurahanDropdown.html(
                            '<option value="">Pilih Nama Kelurahan</option>');
                        $.each(response['kelurahans'], function(index, val) {
                            console.log('<option value="' + val.id +
                                '"> ' + val
                                .kelurahan + ' </option>');
                            kelurahanDropdown.append('<option value="' + val.id +
                                '"> ' + val
                                .kelurahan + ' </option>')
                        });
                    }
                });
            });

            var selectKecamatanId = "{{ $profile ? $profile->id_kecamatans : '' }}";
            var selectKelurahanId =
                "{{ auth()->user()->profile ? optional(auth()->user()->profile->kelurahan)->id : '' }}";
            var getKelurahanUrl = '{{ route('get-kelurahan') }}';

            // Mengisi dropdown Kelurahan sesuai dengan Kecamatan yang terpilih
            if (selectKecamatanId != null) {
                if ($("#id_kecamatans").val() != null) {
                    $('#id_kelurahans').removeAttr('disabled', true);
                }
                var selectkelProfile = "{{ $profile ? $profile->id_kelurahans : '' }}";
                var idKecamatanSelected = $("#id_kecamatans").val();
                console.log(idKecamatanSelected);
                $.ajax({
                    url: '/load-filter',
                    method: 'POST',
                    data: {
                        id: idKecamatanSelected,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('#id_kelurahans').empty();
                        $('#id_kelurahans').append('<option value="">Pilih Kelurahan</option>');
                        $.each(response['kelurahans'], function(key, value) {
                            $('#id_kelurahans').append('<option value="' + value.id + '">' +
                                value.kelurahan + '</option>');
                        });
                        $("#id_kelurahans option[value='" + selectkelProfile + "']").attr("selected",
                            "selected");
                    }
                });
            }

        });
    </script>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
