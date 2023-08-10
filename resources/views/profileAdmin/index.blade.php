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
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-xl px-4 mt-4">
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Form foto profil -->
                        <div class="card mb-4" style="border-radius: 15px;">
                            <div class="card-header">Foto Profile</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2"
                                    src="{{ asset('image/' . auth()->user()->profile_picture) }}" alt=""
                                    style="width: 190px; height: 190px;">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <!-- Profile picture upload button-->
                                <input type="file" name="image" class="d-none" id="profile-picture-input">
                                <label for="profile-picture-input" class="btn btn-primary">Upload new image</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Form profil -->
                        <div class="card mb-4" style="border-radius: 15px;">
                            <div class="card-header">Detail Akun</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('profile.update') }}">
                                    @csrf
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
                                    <!-- Save changes button -->
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </form>
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
        });
    </script>
@endpush

@push('customStyle')
@endpush
