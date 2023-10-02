@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
    <section class="KelasSiswa">
        <div class="container" style="margin-top: 50px;">
            <a href="#" class="rounded-icon">
                <i class="material-icons">arrow_back_ios_new</i>
            </a>
            <div class="title-kelas">
                <p>Detail Kelas</p>
            </div>
        </div>

        <div class="card-container">
            <!-- Card Kiri -->
            <div class="card-left">
                <h2 class="card-title-kelas">{{ $modules1->nama_modul }}</h2>
                <div class="kelas-tutor-details">
                    <img src="assets/img/tutor1.jpeg" alt="Tutor Image" class="tutor-image-small">
                    <h3>{{ $modules1->name }}</h3>
                </div>
                <div class="kelas-info">
                    <div class="duration">
                        <p class="duration-title" style="font-size: 14px;">Durasi</p>
                        <p class="duration-details" style="font-size: 14px;"><i class="fas fa-calendar-alt"
                                style="padding: 5px;"></i>{{ $modules1->durasi_mulai }} - {{ $modules1->durasi_berhenti }}
                        </p>
                    </div>
                    {{-- <div class="referensi">
                        <p class="referensi-title" style="font-size: 14px;">Referensi</p>
                        <p class="referensi-details" style="font-size: 14px;"><i class="fas fa-file-alt"
                                style="padding: 5px;"></i>3 Dokumen</p>
                    </div> --}}
                </div>
                <div class="gambaran-umum">
                    <p class="gambaran-title">Modul Yang diPelajari</p>
                    <p class="gambaran-detail">{!! $modules1->deskripsi_modul !!}</p>
                </div>

                <div class="next-back">
                    <div class="selanjutnya">
                        @if ($nextModule)
                            <a href="{{ route('kelas-siswa', ['paket_id' =>$paket->id, 'id' => $nextModule->id]) }}" id="selanjutnya-button"
                                style="text-decoration: none;">
                                <p class="selanjutnya-text" style="margin-left: 550px; margin-right: 5px;">Selanjutnya</p>
                            </a>
                        @else
                            <p class="selanjutnya-text" style="margin-left: 470px; margin-right: 5px;">Tidak Ada Selanjutnya
                            </p>
                        @endif
                    </div>
                    <div class="sebelumnya">
                        @if ($previousModule)
                            <a href="{{ route('kelas-siswa', ['paket_id' =>$paket->id, 'id' => $previousModule->id]) }}" id="sebelumnya-button"
                                style="text-decoration: none;">
                                <p class="sebelumnya-text" style="margin-left: 510px; margin-right: 5px;">Sebelumnya</p>
                            </a>
                        @else
                            <p class="sebelumnya-text" style="margin-left: 510px; margin-right: 5px;">Tidak Ada Sebelumnya
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Card Kanan (Anda dapat mengisi konten sesuai kebutuhan) -->
            <div class="card-right">
                <div class="modul-card">
                    <div class="modul-modul-card">
                        <h3 style="font-size: 20px; font-weight: bold;">Modul Pembelajaran</h3>
                        <div class="wek1">
                            <p class="wek1-title">Pembuka</p>
                        </div>
                        @foreach ($modules3 as $module)
                            <div class="wek1-content">
                                @if ($modules)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="modul-card-inner">
                                                <a href="{{ route('kelas-siswa', ['paket_id' => $paket->id, 'id' => $module->moduls_Id]) }}"
                                                    style="text-decoration: none;">
                                                    <p class="nama_modul" data-id="{{ $module->id }}">
                                                        {{ $module->nama_modul }}</p>
                                            </div>
                                            {{-- <div class="icon">
                                                        <i class="material-icons">arrow_circle_right</i>
                                                    </div> --}}
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <p>No modules found for this package.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection