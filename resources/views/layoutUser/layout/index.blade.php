<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Link</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>


    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('assets/img/GuruLink.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('landing.show') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tutor.search') }}">Tutor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/landing">Tentang Kami</a>
                    </li>

                    <li class="nav-item close-icons custom-dropdown">
                        <!-- Gambar profil dan "Hi, [Nama User]" atau "Login" -->
                        <div class="dropdown-trigger">
                            @if (auth()->check())
                                @php
                                    $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                                @endphp
                                @if (file_exists(public_path($profileImagePath)))
                                    <img class="profile-icon" src="{{ asset($profileImagePath) }}" alt="">
                                @else
                                    <img class="profile-icon" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                        alt="">
                                @endif
                                <span class="profile-name">Hi, {{ auth()->user()->name }}</span>
                            @else
                                <a href="{{ route('login') }}" class="profile-name">Login</a>
                                <span class="spacer">|</span> <!-- Ini adalah elemen pemisah berupa garis vertikal -->
                                <a href="{{ route('register') }}" class="profile-name">Register</a>
                            @endif
                        </div>



                        <div class="dropdown-content" style="z-index: 1">
                            @if (auth()->check())
                                @php
                                    $profileRoute = '';
                                    if (
                                        auth()
                                            ->user()
                                            ->hasRole('user-pengajar')
                                    ) {
                                        $profileRoute = url('/profileTutor');
                                    } elseif (
                                        auth()
                                            ->user()
                                            ->hasRole('user')
                                    ) {
                                        $profileRoute = url('/profileSiswa');
                                    }
                                @endphp
                                @role('user-pengajar')
                                    <a href="{{ route('dashboard.index') }}" class="dropdown-item has-icon">
                                        <i class="far fa-user"></i> Dashboard
                                    </a>
                                @endrole
                                <a href="{{ $profileRoute }}" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                                {{-- @else
                                <a href="{{ route('login') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </a> --}}
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    @yield('content')


    <!-- footer section -->
    <section>
        <footer class="footer-99382">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 pr-md-5" style="margin-right: 100px;">
                        <a href="#" class="footer-site-logo d-block mb-4"><img src="assets/img/GuruLink.png"
                                alt=""></a>
                        <div style="display: flex; flex-direction: column;">
                            <p style="font-size: 14px; margin-bottom: 0; margin-left: 0px; color: black">Kami adalah
                                platform
                                inovatif yang menyediakan
                                cara mudah dan cepat untuk menemukan guru privat berkualitas sesuai kebutuhanmu.</p>
                        </div>
                    </div>

                    <div class="col-md" style="margin-right: 100px;">
                        <div style="display: flex; flex-direction: column;">
                            <h5>Kontak Kami</h5>
                            <ul class="list-unstyled nav-links" style="font-size: 14px;">
                                <li style="margin-bottom: 2px;"><a href="#">hellotutor@gurulink.co.id</a></li>
                                <li style="margin-bottom: 2px;"><a href="#">Jalan Soekarno Hatta No.9,
                                        Lowokwaru,
                                        Kota
                                        Malang</a></li>
                                <li style="margin-bottom: 2px;"><a href="#">+6289823456789</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md" style="margin-right: 10px;">
                        <div style="display: flex; flex-direction: column;">
                            <h5>Ikuti Kami</h5>
                            <ul class="social list-unstyled" style="margin: 0;">
                                <p style="font-size: 14px; margin-bottom: 5px; margin-left: 0px; color: black">Ikuti
                                    social media
                                    kami</p>
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

    <!-- end footer section -->


    <!-- Berkas Skrip Khusus Halaman -->
    @stack('customScript')
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"
        integrity="sha384-4B1skEiYt4hE4+sfk+GY3G5z7PDIaRkaC5VO7Q2Cme7B/A3W2WwO+W48Hh5W1uI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    {{-- summernote js --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'deskripsi...',
                tabsize: 2,
                height: 300
            });
        });
    </script>


</body>

</html>
