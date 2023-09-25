@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Halaman Profile</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Profile</h2>
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
        </div>
        <form action="{{ route('profile.updateAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-xl px-4 mt-4">
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Form foto profil -->
                        <div class="card mb-4" style="border-radius: 15px;">
                            <div class="card-header">Foto Profile</div>
                            <div class="card-body text-center">
                                @php
                                    $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                                @endphp
                                @if (file_exists(public_path($profileImagePath)))
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ asset($profileImagePath) }}" alt=""
                                        style="width: 150px; height: 150px;" id="preview">
                                @else
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ asset('path/to/default/image.jpg') }}" alt=""
                                        style="width: 150px; height: 150px;" id="preview">
                                @endif

                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <!-- Profile picture upload button-->
                                <input type="file" name="image" class="d-none" id="profile-picture-input" onchange="previewImage(this)">
                                <label for="profile-picture-input" class="btn btn-primary" >Unggah Foto Baru</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Form profil -->
                        <div class="card mb-4" style="border-radius: 15px;">
                            <div class="card-header">Detail Akun</div>
                            <div class="card-body">
                                <!-- Form Group (username) -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Username</label>
                                    <input class="form-control" id="inputUsername" type="text" name="username"
                                        value="{{ auth()->user()->name }}">
                                </div>
                                <!-- Form Group (email address) -->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Alamat Email</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" name="email"
                                        value="{{ auth()->user()->email }}">
                                </div>
                                <!-- Form Row -->
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
                                            maxlength="13"
                                            value="{{ old('telepon', optional(auth()->user()->profile)->telepon) }}"
                                            required>
                                        @error('telepon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Save changes button -->
                                <div class="text-center mt-4">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
            $('form').on('submit', function(e) {
                let jenisKelamin = $('#jenis_kelamin').val();
                let phone = $('#inputPhone').val();

                if (!jenisKelamin || !phone) {
                    alert('Silahkan isi Jenis Kelamin dan Nomor Telepon sebelum melanjutkan!');
                    e.preventDefault();
                }

                if (phone.length > 13) {
                    alert('Nomor Telepon tidak boleh lebih dari 13 angka!');
                    e.preventDefault();
                }
            });
        });
    </script>


@endpush

@push('customStyle')
    <!-- ... Kode style kustom lainnya ... -->
@endpush
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
