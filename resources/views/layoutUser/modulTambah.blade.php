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
                                            <textarea name="pertemuan1" id="Summernotepertemuan1" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertemuan2">Pertemuan 2</label>
                                            <input type="text" class="form-control" id="pertemuan2" name="pertemuan2" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan2" id="Summernotepertemuan2" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertemuan3">Pertemuan 3</label>
                                            <input type="text" class="form-control" id="pertemuan3" name="pertemuan3 placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan3" id="Summernotepertemuan3" class="form-control" cols="30" rows="10"></textarea>
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
                                            <label for="pertemuan4">Pertemuan 4</label>
                                            <input type="text" class="form-control" id="pertemuan4" name="pertemuan4" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan4" id="Summernotepertemuan4" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertemuan5">Pertemuan 5</label>
                                            <input type="text" class="form-control" id="pertemuan5" name="pertemuan5" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan5" id="Summernotepertemuan5" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertemuan6">Pertemuan 6</label>
                                            <input type="text" class="form-control" id="pertemuan6" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan6" id="Summernotepertemuan6" class="form-control" cols="30" rows="10"></textarea>
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
                                            <label for="pertemuan7">Pertemuan 7</label>
                                            <input type="text" class="form-control" id="pertemuan7" name="pertemuan7" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan7" id="Summernotepertemuan7" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertemuan8">Pertemuan 8</label>
                                            <input type="text" class="form-control" id="pertemuan8" name="pertemuan8" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan8" id="Summernotepertemuan8" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertemuan9">Pertemuan 9</label>
                                            <input type="text" class="form-control" id="pertemuan9" name="pertemuan9" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan9" id="Summernotepertemuan4" class="form-control" cols="30" rows="10"></textarea>
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
                                            <label for="pertemuan10">Pertemuan 10</label>
                                            <input type="text" class="form-control" id="pertemuan10" name="pertemuan10" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan10" id="Summernotepertemuan10" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertemuan11">Pertemuan 11</label>
                                            <input type="text" class="form-control" id="pertemuan11" name="pertemuan11" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan11" id="Summernotepertemuan11" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pertemuan12">Pertemuan 12</label>
                                            <input type="text" class="form-control" id="pertemuan12" name="pertemuan1" placeholder="Tambahkan Sub Modul Pembelajaran">
                                            <textarea name="pertemuan12" id="Summernotepertemuan12" class="form-control" cols="30" rows="10"></textarea>
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


