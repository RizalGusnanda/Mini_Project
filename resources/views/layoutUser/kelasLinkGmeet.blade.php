@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>


<section class="kelasLinkGmeet">
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
            <div class="kelas-card">
                <img src="https://cdn.icon-icons.com/icons2/2642/PNG/512/google_meet_camera_logo_icon_159349.png" class="logo">
                <p class="keterangan">Kelas Online</p>
            </div>
            <h2 class="card-title-kelas">Dasar Desain Visual</h2>
            <div class="kelas-tutor-details">
                <img src="assets/img/tutor1.jpeg" alt="Tutor Image" class="tutor-image-small">
                <h3>Camilla Belle</h3>
            </div>
            <div class="ringkasan">
                <hr style="border-top: 2px solid  #00000099; margin-bottom: 20px;"> <!-- Baris yang ditambahkan -->
                <h6 class="ringkasan-title">Ringkasan</h6>
                <p class="ringkasan-detail">Lorem ipsum dolor sit amet consectetur. Posuere elit consequat iaculis viverra faucibus aenean.
                    Quis sodales donec quam egestas.Quam metus tortor mi pretium eros aliquet. Egestas orci consequat et velit.
                    Urna urna commodo vitae amet. Pulvinar tortor leo pellentesque ut vitae neque. Sagittis egestas tristique diam quam
                    tristique neque vitae curabitur nibh.Eget mauris sed pharetra fames condimentum et felis amet. Amet laoreet eleifend vitae
                    feugiat non tempus. Consectetur fermentum purus aliquet dui venenatis.Quam leo enim amet tristique neque.
                    Ullamcorper libero urna accumsan ac enim consectetur mauris aliquet dignissim. Adipiscing tellus amet aenean ultrices.
                    Sit augue sagittis lectus massa morbi risus tellus mi.</p>
            </div>
            <div class="berikutnya">
                <a href="#">
                    <p class="berikutnya-text" style="margin-right: 550px; margin-right: 10px;">Buka Modul</p>
                </a>
                <div class="berikutnya-icon">
                    <i class="material-icons">arrow_forward</i>
                </div>
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
            <div class="presentase-card">
                <div class="presentase-top">
                    <h3 style="color: #ccc; font-size: 14px;">Presentase Kelas</h3>
                    <p style="color: black; font-size: 10px; margin-bottom: -10px; margin-left: 235px;">30% selesai</p>
                    <div class="progress-bar">
                        <div class="progress-fill"></div>
                    </div>
                </div>
            </div>
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
            <div class="week-card">
                <div class="wek-wek-card">
                    <div class="wek1">
                        <p class="wek1-title">Minggu 3</p>
                    </div>
                    <div class="wek1-content">
                        <div class="modul-card-inner">
                            <p>7. Dasar Desain Visual</p>
                            <i class="material-icons">arrow_circle_right</i>
                        </div>
                    </div>
                    <div class="wek1-content">
                        <div class="modul-card-inner">
                            <p>8. Dasar Desain Visual</p>
                            <i class="material-icons">arrow_circle_right</i>
                        </div>
                    </div>
                    <div class="wek1-content">
                        <div class="modul-card-inner">
                            <p>9. Dasar Desain Visual</p>
                            <i class="material-icons">arrow_circle_right</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="week-card">
                <div class="wek-wek-card">
                    <div class="wek1">
                        <p class="wek1-title">Minggu 4</p>
                    </div>
                    <div class="wek1-content">
                        <div class="modul-card-inner">
                            <p>10. Dasar Desain Visual</p>
                            <i class="material-icons">arrow_circle_right</i>
                        </div>
                    </div>
                    <div class="wek1-content">
                        <div class="modul-card-inner">
                            <p>11. Dasar Desain Visual</p>
                            <i class="material-icons">arrow_circle_right</i>
                        </div>
                    </div>
                    <div class="wek1-content">
                        <div class="modul-card-inner">
                            <p>12. Dasar Desain Visual</p>
                            <i class="material-icons">arrow_circle_right</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="week-card">
                <div class="wek-wek-card">
                    <div class="wek1">
                        <p class="wek1-title">Penutup</p>
                    </div>
                    <div class="wek1-content">
                        <div class="modul-card-inner">
                            <p>12. Evaluasi</p>
                            <i class="material-icons">arrow_circle_right</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
