@extends('layoutUser.layout.index')
@section('content')
<style>
    body {
        background-color: white;
    }
</style>

<section class="tambahModulSide">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    @php
                    $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                    @endphp
                    @if (file_exists(public_path($profileImagePath)))
                    <img class="profile-pic" src="{{ asset($profileImagePath) }}" alt="">
                    @else
                    <img class="profile-pic" src="{{ asset('path/to/default/image.jpg') }}" alt="">
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
                            <i class="fas fa-calendar"></i>
                            <span>Reservasi</span>
                        </div>
                        <div class="menu-item">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Paket Kelas</span>
                        </div>
                        <div class="menu-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Keluar</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-header-modul">
                    <div class="card-body">
                        <div class="back-card">
                            <i class="fas fa-arrow-left back-icon"></i>
                        </div>
                        <div class="text-card">
                            <p class="search-text">Tambah Modul</p>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('modul.store') }}">
                    @csrf
                    <div class="card-formulir-modul">
                        @foreach ($mingguLabels as $mingguIndex => $minggu)
                        <div class="card-body">
                            <div class="form-group select-group">
                                <label for="pembelajaran">Waktu Pembelajaran</label>
                                <div class="input-group">
                                    <div class="form-control" id="pembelajaran" name="pembelajaran" style="background-color: #E8EBF399;">
                                        <label id="pembelajaran" name="pembelajaran">{{ $minggu }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($pertemuanLabels as $index => $pertemuan)
                        @php
                        $inputName = 'pertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);
                        $textareaId = 'Summernotepertemuan_' . ($mingguIndex + 1) . '_' . ($index + 1);

                        // Cari data sub-modul yang sudah ada dalam database
                        $existingModul = $userModuls[$minggu][$index] ?? null;

                        $namaModulValue = $existingModul ? $existingModul['nama_modul'] : ''; // Ambil dari database jika ada, jika tidak kosongkan
                        $deskripsiModulValue = $existingModul ? $existingModul['deskripsi_modul'] : ''; // Ambil dari database jika ada, jika tidak kosongkan
                        @endphp
                        <div class="form-group">
                            <label for="{{ $inputName }}">Sub Modul Pembelajaran</label>
                            <label for="{{ $inputName }}">{{ $pertemuan }}</label>
                            <input type="text" class="form-control" id="pertemuan_{{ $mingguIndex + 1 }}_{{ $index + 1 }}" name="pertemuan_{{ $mingguIndex + 1 }}_{{ $index + 1 }}" value="{{ old($inputName, $namaModulValue) }}" placeholder="Tambahkan Sub Modul Pembelajaran">
                            <textarea name="Summernotepertemuan_{{ $mingguIndex + 1 }}_{{ $index + 1 }}" id="Summernotepertemuan_{{ $mingguIndex + 1 }}_{{ $index + 1 }}" class="form-control summernote" cols="30" rows="10">{{ old($textareaId, $deskripsiModulValue) }}</textarea>
                        
                        </div>
                        @endforeach
                        @endforeach

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

<script>
    $(document).ready(function() {
        // Isi kembali formulir saat halaman dimuat ulang
        var formData = sessionStorage.getItem('formData');
        if (formData) {
            formData = JSON.parse(formData);
            $.each(formData, function(i, field) {
                $('[name="' + field.name + '"]').val(field.value);
            });
        }

        // Capture form submission event
        $('form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Serialize the form data
            var formData = $(this).serialize();

            // Send an AJAX request to update the sub-module
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: formData,
                dataType: 'json', // Expect JSON response
                success: function(response) {
                    // Loop through the updated sub-modules in the response
                    $.each(response.updatedSubModules, function(index, subModule) {
                        // Update the corresponding input and textarea based on the sub-module's ID
                        $('#pertemuan_' + subModule.minggu + '_' + subModule.pertemuan).val(subModule.nama_modul);
                        $('#Summernotepertemuan_' + subModule.minggu + '_' + subModule.pertemuan).val(subModule.deskripsi_modul);
                    });
                },
                error: function(response) {
                    // Handle any errors here
                    console.error('Error:', response);
                }
            });
        });
    });
</script>