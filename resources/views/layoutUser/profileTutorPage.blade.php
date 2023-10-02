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
                                <img class="profile-pic" id="preview" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    alt="" style="width: 150px; height: 150px;">
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
                                <a href="/riwayatTutor" style="text-decoration: none; color: black">
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
                                <a href="{{ route('dashboard.index') }}" style="text-decoration: none; color: black">
                                    <div class="menu-item">
                                        <i class="fas fa-chart-bar"></i>
                                        <span>Dashboard</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Card Header "Cari tutor sesuai kebutuhanmu" -->
                        <div class="card-header-profilTutor">
                            <div class="card-body">
                                <h5 class="card-title-search">Informasi Tutor</h5>
                            </div>
                        </div>

                        <!-- Card Formulir Edit Profile -->
                        <div class="card-formulir">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Username</label>
                                    <input class="form-control" id="inputUsername" type="text" name="username"
                                        value="{{ auth()->user()->name }}" pattern="^[A-Za-z\s]+$" maxlength="100"
                                        title="Harap masukkan hanya huruf. Maksimal 100 karakter."
                                        oninput="validateUsername(this)">
                                    <div class="invalid-feedback">
                                        Harap masukkan hanya huruf. Maksimal 100 karakter.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Alamat Email</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" name="email"
                                        value="{{ auth()->user()->email }}" pattern="^.+@gmail\.com$"
                                        title="Harap masukkan alamat email dengan format @gmail.com."
                                        oninput="validateEmail(this)">
                                    <div class="invalid-feedback">
                                        Harap masukkan alamat email dengan format @gmail.com.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputAlamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="inputAlamat" name="alamat" required maxlength="50">{{ old('alamat', optional(auth()->user()->profile)->alamat) }}</textarea>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="id_kecamatans" class="small mb-1">Kecamatan</label>
                                        <select id="id_kecamatans"
                                            class="form-control @error('id_kecamatans') is-invalid @enderror"
                                            name="id_kecamatans" required>
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
                                            name="jenis_kelamin" required>
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
                                            maxlength="13" required
                                            value="{{ old('telepon', optional(auth()->user()->profile)->telepon) }}">
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="pendidikan" class="small mb-1">Pendidikan Terakhir</label>
                                        <input class="form-control" id="pendidikan" type="text" name="pendidikan"
                                            required maxlength="30"
                                            value="{{ old('pendidikan', optional(auth()->user()->profile)->pendidikan) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jurusan" class="small mb-1">Jurusan</label>
                                        <input class="form-control" id="jurusan" type="text" name="jurusan"
                                            maxlength="50" required pattern="^[A-Za-z\s]{1,50}$"
                                            value="{{ old('jurusan', optional(auth()->user()->profile)->jurusan) }}">
                                        <div class="invalid-feedback">
                                            Harap masukkan hanya huruf dan maksimal 50 karakter.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="instansi" class="form-label">Instansi</label>
                                    <input class="form-control" id="instansi" type="text" name="instansi"
                                        pattern="^[A-Za-z\s]{1,50}$" title="Harap masukkan hanya huruf dan maksimal 50 karakter."
                                        value="{{ old('instansi', optional(auth()->user()->profile)->instansi) }}">
                                    <div class="invalid-feedback">
                                        Harap masukkan hanya huruf dan maksimal 50 karakter.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="spesalisasis" class="form-label">Spesialisasi</label>
                                    <select id="spesalisasis"
                                        class="form-control @error('spesalisasis') is-invalid @enderror"
                                        name="spesalisasis" required>
                                        <option value="">Pilih Spesialisasi</option>
                                        @foreach ($spesalisasis as $spesalisasis)
                                            <option @if ($profile && $profile->id_spesalisasis == $spesalisasis->id) selected @endif
                                                value="{{ $spesalisasis->id }}">
                                                {{ $spesalisasis->nama_spesialisasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="bank" class="form-label">Rekening Bank</label>
                                    <select id="bank" class="form-control @error('bank') is-invalid @enderror"
                                        name="bank" required>
                                        <option value=""
                                            {{ old('bank', optional(auth()->user()->profile)->bank) === null ? 'selected' : '' }}>
                                            Pilih Bank Tujuan</option>
                                        <option value="BRI"
                                            {{ old('bank', optional(auth()->user()->profile)->bank) === 'BRI' ? 'selected' : '' }}>
                                            BRI</option>
                                        <option value="BCA"
                                            {{ old('bank', optional(auth()->user()->profile)->bank) === 'BCA' ? 'selected' : '' }}>
                                            BCA</option>
                                        <option value="BNI"
                                            {{ old('bank', optional(auth()->user()->profile)->bank) === 'BNI' ? 'selected' : '' }}>
                                            BNI</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="norek" class="form-label">Nomor Rekening</label>
                                    <input class="form-control" id="norek" type="text" name="norek"
                                        pattern="^\d{10,15}$"  maxlength="15"
                                        value="{{ old('norek', optional(auth()->user()->profile)->norek) }}">
                                    <div class="invalid-feedback">
                                        Hanya boleh diisi dengan angka (10-15 digit).
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="ajar" class="form-label">Pilihan Mengajar</label>
                                    <select id="ajar" class="form-control" name="ajar">
                                        <option value=""
                                            {{ old('ajar', optional(auth()->user()->profile)->ajar) === null ? 'selected' : '' }}>
                                            Pilih Pilihan Mengajar</option>
                                        <option value="Online"
                                            {{ old('ajar', optional(auth()->user()->profile)->ajar) === 'Online' ? 'selected' : '' }}>
                                            Online</option>
                                        <option value="Offline"
                                            {{ old('ajar', optional(auth()->user()->profile)->ajar) === 'Offline' ? 'selected' : '' }}>
                                            Offline</option>
                                    </select>

                                </div>
                                <div class="text-center mt-4">
                                    <!-- Tambahkan div untuk mengatur tombol di tengah form -->
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
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
    @if (session('success'))
        <script>
            $(document).ready(function() {
                alert('{{ session('success') }}');
            });
        </script>
    @endif
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


        $(document).ready(function() {
            $('form').on('submit', function(e) {
                let alamat = $('#inputAlamat').val();
                let kecamatan = $('#id_kecamatans').val();
                let kelurahan = $('#id_kelurahans').val();
                let jenisKelamin = $('#jenis_kelamin').val();
                let phone = $('#inputPhone').val();
                let pendidikan = $('#pendidikan').val();
                let jurusan = $('#jurusan').val();
                let instansi = $('#instansi').val();
                let spesialisasi = $('#spesalisasis').val();
                let bank = $('#bank').val();
                let norek = $('#norek').val();
                let ajar = $('#ajar').val();

                if (!alamat || !kecamatan || !kelurahan || !jenisKelamin || !phone || !pendidikan || !
                    jurusan || !instansi || !spesialisasi || !bank || !norek || !ajar) {
                    alert('Pastikan semua field telah terisi sebelum melanjutkan!');
                    e.preventDefault();
                }

                // Validasi nomor telepon
                if (!phone.match(/^\d+$/)) {
                    alert('Nomor telepon hanya boleh diisi dengan angka.');
                    e.preventDefault();
                } else if (phone.length < 10 || phone.length > 13) {
                    alert('Nomor telepon harus memiliki panjang antara 10 hingga 13 digit angka.');
                    e.preventDefault();
                }

            });
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


        function validateUsername(input) {
            var username = input.value;

            if (!/^[A-Za-z\s]+$/.test(username) || username.length > 100) {
                input.setCustomValidity('Harap masukkan hanya huruf. Maksimal 100 karakter.');
                input.classList.add('is-invalid');
            } else {
                input.setCustomValidity('');
                input.classList.remove('is-invalid');
            }
        }

        $(document).ready(function() {
            validateUsername(document.getElementById('inputUsername'));
        });


        function validateEmail(input) {
            var email = input.value;

            if (!/^.+@gmail\.com$/.test(email)) {
                input.setCustomValidity('Harap masukkan alamat email dengan format @gmail.com.');
                input.classList.add('is-invalid');
            } else {
                input.setCustomValidity('');
                input.classList.remove('is-invalid');
            }
        }


        $(document).ready(function() {
            validateEmail(document.getElementById('inputEmailAddress'));
        });

        $(document).ready(function() {
            $('#jurusan').on('input', function() {
                var jurusan = $(this).val();

                if (!/^[A-Za-z\s]{1,50}$/.test(jurusan)) {
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
        });

        $(document).ready(function() {
            $('#instansi').on('input', function() {
                var instansi = $(this).val();

                if (!/^[A-Za-z\s]{1,50}$/.test(instansi)) {
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
        });

        $(document).ready(function() {
            $('#norek').on('input', function() {
                var norek = $(this).val();

                if (!/^\d{10,15}$/.test(norek)) {
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
