@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
    <section class="KelasSiswa">
        <div class="container" style="margin-top: 50px;">
            <a href="/paketKelasIklan" class="rounded-icon">
                <i class="material-icons">arrow_back_ios_new</i>
            </a>
            <div class="title-kelas">
                <p>Detail Kelas</p>
            </div>
            <div class="edit-button-container">
                <a href="{{ route('editModul.edit',['id' => $paket->id, 'modul_id' => $modules1->moduls_Id]) }}" class="edit-button">
                    <i class="fas fa-edit"></i> Edit Kelas
                </a>
            </div>
        </div>

        <div class="card-container" style="display: flex;
        justify-content: space-between;">
            <!-- Card Kiri -->
            <div class="card-left">
                <h2 class="card-title-kelas">
                    {{ $modules1->nama_modul ?? 'No modul available.' }}


                </h2>
                <div class="kelas-info" >
                    {!! $modules1->deskripsi_modul ?? 'No modul available.' !!}

                </div>
                <div class="next-back">
                    <div class="selanjutnya">
                        @if ($nextModule)
                            <a href="{{ route('modultampilan.daftar',['id' =>$paket->id, 'modul_id' => $nextModule->id]) }}" id="selanjutnya-button" style="text-decoration: none;">
                                <p class="selanjutnya-text" style="margin-left: 550px; margin-right: 5px;">Selanjutnya</p>
                            </a>
                        @else
                            <p class="selanjutnya-text" style="margin-left: 470px; margin-right: 5px;">Tidak Ada Selanjutnya</p>
                        @endif
                    </div>
                    <div class="sebelumnya">
                        @if ($previousModule)
                            <a href="{{ route('modultampilan.daftar', ['id' =>$paket->id, 'modul_id' => $previousModule->id]) }}" id="sebelumnya-button" style="text-decoration: none;">
                                <p class="sebelumnya-text" style="margin-left: 510px; margin-right: 5px;">Sebelumnya</p>
                            </a>
                        @else
                            <p class="sebelumnya-text" style="margin-left: 510px; margin-right: 5px;">Tidak Ada Sebelumnya</p>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Card Kanan (Anda dapat mengisi konten sesuai kebutuhan) -->
            <div class="card-right">
                <div class="modul-card">
                    <div class="modul-modul-card">
                        <h3 style="font-size: 20px; font-weight: bold;">Tampilan modul</h3>
                        {{-- <a href="{{ route('tambahModul.create', $modules1->moduls_Id) }}" class="btn btn-tambah">
                            <i class="fas fa-plus"></i>
                        </a> --}}
                        @foreach ($modules as $module)
                            <div class="wek1-content">
                                @if ($modules)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="modul-card-inner">
                                                <a href="{{ route('modultampilan.daftar',['id' => $paket->id, 'modul_id' => $module->moduls_Id]) }}" style="text-decoration: none;">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
