<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }} - Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <style>
        .full-screen-card {
            height: 100vh;
            width: 100vw;
            margin: 0;
        }

        .full-height-card {
            height: 100vh;
            width: 100vw;
            margin: 0;
            padding: 0;
        }

        .card-body {
            height: 100vh;
            width: 100%;
            overflow: auto;
            margin: 0;
        }

        .rounded-input {
            border-radius: 15px;
        }

        .welcome-text {
            padding-left: 50px;
        }

        /* Container untuk input */
        .input-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
            margin-left: 50px;
            margin-right: 50px;
        }

        /* Input style */
        .input-container input[type="email"],
        .input-container input[type="password"] {
            border-radius: 15px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        /* Button style */
        .input-container button {
            border-radius: 15px;
            padding: 10px;
        }

        .text-link {
            color: #1F3C88;
        }
        .text-link-register {
            color: #EE6F57;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section full-screen-section p-0">
            <div class="row d-flex justify-content-between m-0">

                <div class="col-md-6 col-sm-6 col-lg-6 full-height-card">
                    <div style="background-color:#d2d8e7;">
                        <div class="card-body">
                            <div class="col mt-1">
                                {{-- <h5>GuruLink</h5> --}}
                                <img src="{{ asset('assets/img/avatar/GuruLink.png') }}" alt="" srcset=""
                                    style="width: 20%">
                            </div>
                            <div class="col mt-5">
                                <img src="{{ asset('assets/img/avatar/cuate.png') }}" alt="" srcset=""
                                    style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-6 full-height-card">
                    <div style="background-color:#fff;">
                        <div class="card-body">
                            <div class="col mt-5 welcome-text">
                                <h3>Selamat datang di <img src="{{ asset('assets/img/avatar/GuruLink.png') }}"
                                        alt="" srcset="" style="width: 25%"></h3>
                            </div>
                            <div class="col mt-4 welcome-text">
                                <p>Temukan mentor terbaikmu disini</p>
                            </div>

                            <div class="input-container">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form action="{{ route('login') }}" method="POST" class="needs-validation"
                                    novalidate="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Masukkan Alamat Email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukkan Password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="mt-2 text-right">
                                            <a href="/forgot-password" class="text-small">Lupa Password?</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Masuk
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-5 text-muted text-center">
                                    <a href="" class="text-link">Belum punya akun?</a> <a href="/register" class="text-link-register">REGISTRASI</a>
                                </div>
                                <div class="simple-footer">
                                    Copyright &copy; Stisla 2018
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </section>
    </div>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>