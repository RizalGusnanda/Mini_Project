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
                        <a class="nav-link" href="#about-me">Tentang Kami</a>
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
                    <li class="nav-item close-icons custom-dropdown">
                        <!-- Gambar profil dan "Hi, [Nama User]" -->
                        <div class="dropdown-trigger">
                            @php
                                $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                            @endphp
                            @if (file_exists(public_path($profileImagePath)))
                                <img class="profile-icon" src="{{ asset($profileImagePath) }}" alt="">
                            @else
                                <img class="profile-icon" src="{{ asset('path/to/default/image.jpg') }}" alt="">
                            @endif
                            <span class="profile-name">
                                Hi,
                                @if (auth()->check() && auth()->user()->name)
                                    {{ auth()->user()->name }}
                                @else
                                    Anonymous
                                @endif
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <!-- Dropdown dengan opsi "Profile" dan "Logout" -->
                        <div class="dropdown-content" style="z-index: 1">
                            <a href="{{ url('/profileTutor') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                            <p style="font-size: 14px; margin-bottom: 0; margin-left: 0px; color: black">Kami adalah platform
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
                                <p style="font-size: 14px; margin-bottom: 5px; margin-left: 0px; color: black">Ikuti social media
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


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"
        integrity="sha384-4B1skEiYt4hE4+sfk+GY3G5z7PDIaRkaC5VO7Q2Cme7B/A3W2WwO+W48Hh5W1uI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    {{-- summernote js --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                // Konfigurasi Summernote
            });
        });
    </script>

    


</body>

</html>