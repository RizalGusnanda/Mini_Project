<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/tambah-modul.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-mGnX7Bc9TTOB4a8zbaR6e8fejcw6MWbXIk2iALP8g1IbbVYUew+OrC/Rzo7W/Wl+" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>


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
            <a class="navbar-brand" href="#"><img src="assets/img/GuruLink.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tutor.html">Tutor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item close-icons">
                        <a class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <g mask="url(#mask0_27_22)">
                                    <path d="M6.66663 31.6666V28.3333H9.99996V16.6666C9.99996 14.3611 10.6944 12.3125 12.0833 10.5208C13.4722 8.72915 15.2777 7.55554 17.5 6.99998V5.83331C17.5 5.13887 17.743 4.54859 18.2291 4.06248C18.7152 3.57637 19.3055 3.33331 20 3.33331C20.6944 3.33331 21.2847 3.57637 21.7708 4.06248C22.2569 4.54859 22.5 5.13887 22.5 5.83331V6.99998C24.7222 7.55554 26.5277 8.72915 27.9166 10.5208C29.3055 12.3125 30 14.3611 30 16.6666V28.3333H33.3333V31.6666H6.66663ZM20 36.6666C19.0833 36.6666 18.2986 36.3403 17.6458 35.6875C16.993 35.0347 16.6666 34.25 16.6666 33.3333H23.3333C23.3333 34.25 23.0069 35.0347 22.3541 35.6875C21.7013 36.3403 20.9166 36.6666 20 36.6666ZM13.3333 28.3333H26.6666V16.6666C26.6666 14.8333 26.0138 13.2639 24.7083 11.9583C23.4027 10.6528 21.8333 9.99998 20 9.99998C18.1666 9.99998 16.5972 10.6528 15.2916 11.9583C13.9861 13.2639 13.3333 14.8333 13.3333 16.6666V28.3333Z" fill="#1C1B1F" />
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

    <section class="modul">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img class="profile-pic" src="assets/img/tutor1.jpeg" alt="Profile Picture">
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
                    <div class="card-formulir-modul">
                        <div class="card-body">
                            <form>
                                <div class="form-group select-group">
                                    <label for="pembelajaran">Waktu Pembelajaran</label>
                                    <div class="input-group">
                                        <div class="form-control" id="pembelajaran" name="pembelajaran" style="background-color: #E8EBF399;">
                                            <label id="pembelajaran" name="pembelajaran">Minggu 1</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <div class="modul-group card custom-card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama_modul">Sub Modul Pembelajaran</label>
                                                <label for="pertemuan1">Pertemuan 1</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="pertemuan1">Pertemuan 2</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="pertemuan1">Pertemuan 3</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group select-group">
                                    <label for="pembelajaran">Waktu Pembelajaran</label>
                                    <div class="input-group">
                                        <div class="form-control" id="pembelajaran" name="pembelajaran" style="background-color: #E8EBF399;">
                                            <label id="pembelajaran" name="pembelajaran">Minggu 2</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <div class="modul-group card custom-card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama_modul">Sub Modul Pembelajaran</label>
                                                <label for="pertemuan1">Pertemuan 4</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="pertemuan1">Pertemuan 5</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="pertemuan1">Pertemuan 6</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group select-group">
                                    <label for="pembelajaran">Waktu Pembelajaran</label>
                                    <div class="input-group">
                                        <div class="form-control" id="pembelajaran" name="pembelajaran" style="background-color: #E8EBF399;">
                                            <label id="pembelajaran" name="pembelajaran">Minggu 3</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <div class="modul-group card custom-card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama_modul">Sub Modul Pembelajaran</label>
                                                <label for="pertemuan1">Pertemuan 7</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="pertemuan1">Pertemuan 8</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="pertemuan1">Pertemuan 9</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group select-group">
                                    <label for="pembelajaran">Waktu Pembelajaran</label>
                                    <div class="input-group">
                                        <div class="form-control" id="pembelajaran" name="pembelajaran" style="background-color: #E8EBF399;">
                                            <label id="pembelajaran" name="pembelajaran">Minggu 4</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <div class="modul-group card custom-card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama_modul">Sub Modul Pembelajaran</label>
                                                <label for="pertemuan1">Pertemuan 10</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="pertemuan1">Pertemuan 11</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="pertemuan1">Pertemuan 12</label>
                                                <input type="text" class="form-control" id="pertemuan1" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Perbarui dan Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- footer section -->
    <section>
        <footer class="footer-99382">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 pr-md-5" style="margin-right: 100px;">
                        <a href="#" class="footer-site-logo d-block mb-4"><img src="assets/img/GuruLink.png" alt=""></a>
                        <div style="display: flex; flex-direction: column;">
                            <p style="font-size: 14px; margin-bottom: 0;">Kami adalah platform inovatif yang menyediakan
                                cara mudah dan cepat untuk menemukan guru privat berkualitas sesuai kebutuhanmu.</p>
                        </div>
                    </div>

                    <div class="col-md" style="margin-right: 100px;">
                        <div style="display: flex; flex-direction: column;">
                            <h5>Kontak Kami</h5>
                            <ul class="list-unstyled nav-links" style="font-size: 14px;">
                                <li style="margin-bottom: 2px;"><a href="#">hellotutor@gurulink.co.id</a></li>
                                <li style="margin-bottom: 2px;"><a href="#">Jalan Soekarno Hatta No.9, Lowokwaru, Kota
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
                                    <li style="margin-right: 20px;"><a href="#"><i class="fab fa-youtube fa-2x" style="color: #EE6F57;"></i></a>
                                    </li>
                                    <li style="margin-right: 20px;"><a href="#"><i class="fab fa-facebook fa-2x" style="color: #EE6F57;"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fab fa-instagram fa-2x" style="color: #EE6F57;"></i></a>
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