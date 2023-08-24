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
@endsection
