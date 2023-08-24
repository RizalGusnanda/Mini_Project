<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/kelas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>Guru Link</title>
</head>

<body>
    <style>
        body {
            background-color: white;
        }
    </style>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/GuruLink.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tutor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item close-icons">
                        <a class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                fill="none">
                                <g mask="url(#mask0_27_22)">
                                    <path
                                        d="M6.66663 31.6666V28.3333H9.99996V16.6666C9.99996 14.3611 10.6944 12.3125 12.0833 10.5208C13.4722 8.72915 15.2777 7.55554 17.5 6.99998V5.83331C17.5 5.13887 17.743 4.54859 18.2291 4.06248C18.7152 3.57637 19.3055 3.33331 20 3.33331C20.6944 3.33331 21.2847 3.57637 21.7708 4.06248C22.2569 4.54859 22.5 5.13887 22.5 5.83331V6.99998C24.7222 7.55554 26.5277 8.72915 27.9166 10.5208C29.3055 12.3125 30 14.3611 30 16.6666V28.3333H33.3333V31.6666H6.66663ZM20 36.6666C19.0833 36.6666 18.2986 36.3403 17.6458 35.6875C16.993 35.0347 16.6666 34.25 16.6666 33.3333H23.3333C23.3333 34.25 23.0069 35.0347 22.3541 35.6875C21.7013 36.3403 20.9166 36.6666 20 36.6666ZM13.3333 28.3333H26.6666V16.6666C26.6666 14.8333 26.0138 13.2639 24.7083 11.9583C23.4027 10.6528 21.8333 9.99998 20 9.99998C18.1666 9.99998 16.5972 10.6528 15.2916 11.9583C13.9861 13.2639 13.3333 14.8333 13.3333 16.6666V28.3333Z"
                                        fill="#1C1B1F" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item close-icons">
                        <a class="nav-link">
                            <img src="assets/img/tutor1.jpeg" alt="Profile" class="profile-icon">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
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
            <div class="edit-button-container2">
                <button class="edit-button2">
                    <i class="fas fa-edit"></i> Edit Kelas
                </button>
            </div>
            <h2 class="card-title-kelas">Dasar - dasar UI/UX Design</h2>
            <div class="kelas-tutor-details">
                <img src="assets/img/tutor1.jpeg" alt="Tutor Image" class="tutor-image-small">
                <h3>Camilla Belle</h3>
            </div>
            <div class="kelas-info">
                <div class="duration">
                    <p class="duration-title" style="font-size: 14px;">Durasi</p>
                    <p class="duration-details" style="font-size: 14px;"><i class="fas fa-calendar-alt"
                            style="padding: 5px;"></i>1 September -
                        30 September 2023</p>
                </div>
                <div class="referensi">
                    <p class="referensi-title" style="font-size: 14px;">Referensi</p>
                    <p class="referensi-details" style="font-size: 14px;"><i class="fas fa-file-alt"
                            style="padding: 5px;"></i>3 Dokumen</p>
                </div>
            </div>
            <div class="gambaran-umum">
                <div class="gambaran-umum">
                    <p class="bagian-title">Bagian</p>
                    <textarea class="bagian-detail-input" placeholder="Masukkan judul..."></textarea>
                </div>
                
            </div>
            <div class="produk-desain">
                <div class="produk-desain">
                    <p class="deskripsi-kelas-title">Deskripsi</p>
                    <textarea class="deskripsi-detail-input" placeholder="Masukkan deskripsi..."></textarea>
                </div>
            </div>
            <button class="save-kelas-button">Simpan</button>
            <div class="selanjutnya">
                <a href="#">
                    <p class="selanjutnya-text" style="margin-left: 550px; margin-right: 5px;">Selanjutnya</p>
                </a>
                <div class="selanjutnya-icon">
                    <i class="material-icons">arrow_forward_ios_new</i>
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


    <!-- footer section -->
    <section>
        <footer class="footer-99382">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 pr-md-5" style="margin-right: 100px;">
                        <a href="#" class="footer-site-logo d-block mb-4"><img src="img/GuruLink.png"
                                alt=""></a>
                        <div style="display: flex; flex-direction: column;">
                            <p style="font-size: 14px; margin-bottom: 0;">Kami adalah platform inovatif yang
                                menyediakan
                                cara mudah dan cepat untuk menemukan guru privat berkualitas sesuai kebutuhanmu.</p>
                        </div>
                    </div>

                    <div class="col-md" style="margin-right: 100px;">
                        <div style="display: flex; flex-direction: column;">
                            <h5>Kontak Kami</h5>
                            <ul class="list-unstyled nav-links" style="font-size: 14px;">
                                <li style="margin-bottom: 2px;"><a href="#">hellotutor@gurulink.co.id</a></li>
                                <li style="margin-bottom: 2px;"><a href="#">Jalan Soekarno Hatta No.9,
                                        Lowokwaru, Kota
                                        Malang</a></li>
                                <li style="margin-bottom: 2px;"><a href="#">+6289823456789</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md" style="margin-right: 10px;">
                        <div style="display: flex; flex-direction: column;">
                            <h5>Ikuti Kami</h5>
                            <ul class="social list-unstyled" style="margin: 0;">
                                <p style="font-size: 14px; margin-bottom: 5px;">Ikuti social media kami</p>
                                <ul class="social list-unstyled" style="margin: 0;">
                                    <li style="margin-right: 20px;"><a href="#"><i class="fab fa-youtube fa-2x"
                                                style="color: #EE6F57;"></i></a>
                                    </li>
                                    <li style="margin-right: 20px;"><a href="#"><i
                                                class="fab fa-facebook fa-2x" style="color: #EE6F57;"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fab fa-instagram fa-2x"
                                                style="color: #EE6F57;"></i></a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>


    <script src="js/bootstrap.min.js"></script>
</body>

</html>
