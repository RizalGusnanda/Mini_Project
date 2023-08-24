@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>





    <section class="Modul">
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

                <div class="editKelas">
                 <h2 class="card-title-kelas">Dasar - dasar UI/UX Design</h2>
                    <button class="editKelas-button">
                        <i class="material-icons">edit</i>
                        <span>Edit Kelas</span>
                    </button>
                </div>

                <div class="kelas-tutor-details">
                    <img src="assets/img/tutor1.jpeg" alt="Tutor Image" class="tutor-image-small">
                    <h3>Camilla Belle</h3>
                </div>
                <div class="kelas-info">

                </div>
                <div class="Bagian">
                    <p class="Bagian-title">Bagian 1</p>
                    <input type="text" class="form-control" id="bagian" name="bagian" placeholder="Ringkasan">
                </div>
                <div class="deskripsi">
                    <p class="deskripsi-title">Yang akan dipelajari</p>
                    <textarea id="" cols="95" rows="10"></textarea>
                </div>
                <div class="drive">
                    <p class="drive-title">Link Modul (jika diperlukan)</p>
                    <input type="text" class="form-control" id="drive" name="drive"
                        placeholder="+ Masukan link disini">
                </div>

                <div class="simpan">
                    <button class="simpan-button">
                        <i class="material-icons">save</i>
                        <span>Simpan</span>
                    </button>
                </div>


                <div class="navigation">
                    <div class="sebelumnya">
                        <a href="#">
                            <div class="sebelumnya-icon">
                                <i class="material-icons">arrow_back_ios_new</i>
                            </div>
                            <p class="sebelumnya-text">Sebelumnya</p>
                        </a>
                    </div>
                    <div class="selanjutnya">
                        <a href="#">
                            <p class="selanjutnya-text">Selanjutnya</p>
                            <div class="selanjutnya-icon">
                                <i class="material-icons">arrow_forward_ios_new</i>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Card Kanan (Anda dapat mengisi konten sesuai kebutuhan) -->
            <div class="card-right">
                <div class="modul-card">
                    <div class="modul-modul-card">
                        <h3 style="font-size: 20px; font-weight: bold;">Modul Pembelajaran</h3>
                        <div class="pembuka">
                            <p class="pembuka-title">Pembuka</p>
                        </div>
                        <div class="modul-content">
                            <div class="modul-card-inner">
                                <p>Pengenalan Kelas</p>
                                <i class="material-icons">arrow_circle_right</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="week-card">
                    <div class="wek-wek-card">
                        <div class="wek1">
                            <p class="wek1-title">Minggu 1</p>
                        </div>
                        <div class="wek1-content">
                            <div class="modul-card-inner">
                                <p>1. Dasar Desain Visual</p>
                                <i class="material-icons">arrow_circle_right</i>
                            </div>
                        </div>
                        <div class="wek1-content">
                            <div class="modul-card-inner">
                                <p>2. Elemen Visual Design</p>
                                <i class="material-icons">arrow_circle_right</i>
                            </div>
                        </div>
                        <div class="wek1-content">
                            <div class="modul-card-inner">
                                <p>3. Prinsip Visual Design</p>
                                <i class="material-icons">arrow_circle_right</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="week-card">
                    <div class="wek-wek-card">
                        <div class="wek1">
                            <p class="wek1-title">Minggu 2</p>
                        </div>
                        <div class="wek1-content">
                            <div class="modul-card-inner">
                                <p>4. Dasar Desain Visual</p>
                                <i class="material-icons">arrow_circle_right</i>
                            </div>
                        </div>
                        <div class="wek1-content">
                            <div class="modul-card-inner">
                                <p>5. Dasar Desain Visual</p>
                                <i class="material-icons">arrow_circle_right</i>
                            </div>
                        </div>
                        <div class="wek1-content">
                            <div class="modul-card-inner">
                                <p>6. Dasar Desain Visual</p>
                                <i class="material-icons">arrow_circle_right</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
