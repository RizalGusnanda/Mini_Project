@extends('layoutUser.layout.index')

@section('content')
<style>
body{
    background-color: white;
}
</style>
<section class="foto-Profile">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Card Foto Profile -->
                <div class="card foto-Profile">
                <label for="picture" class="plus-icon">
                    <i class="fas fa-plus"></i>
                </label>
                <input type="file" name="image" class="d-none" id="picture">
                <img class="profile-pic" src="assets/img/tutor1.jpeg" alt="Profile Picture">
            </div>
                <div class="card-menu">
                    <div class="menu">
                        <a href="/tutor">
                        <div class="menu-item">
                            <i class="fas fa-user"></i>
                            <span>Profile</span>
                        </div>
                        </a>
                        <div class="menu-item">
                            <i class="fas fa-info-circle"></i>
                            <span>Detail Tutor</span>
                        </div>
                        <div class="menu-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Keluar</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Card Header "Cari tutor sesuai kebutuhanmu" -->
                <div class="card-header-profilTutor">
                    <div class="card-body">
                        <h5 class="card-title-search">Informasi Tutor</h5>
                    </div>
                </div>
                
                <!-- Card Formulir Edit Profile -->
                <div class="card-formulir">
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" >
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" >
                </div>
                <div class="mb-3">
                    <label for="inputAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="inputAlamat" name="alamat" value="">
                </div>
                <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label for="Kelurahan" class="small mb-1">Kelurahan</label>
                                    <input type="text" class="form-control" id="inputKelurahan" name="kelurahan" value="#">
                                </div>
                                <div class="col-md-6">
                                <label class="small mb-1" for="inputKecamatan">Kecamatan</label>
                                <input class="form-control" id="inputKecamatan"  name="Kecamatan" value="#">
                            </div>
                            </div>
                    </div>
                    <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="small mb-1">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                     
                                    </select>

                                   
                                </div>
                                <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Nomor Telepon</label>
                                <input class="form-control" id="inputPhone" type="tel" name="telepon" value="">
                            </div>
                            </div>
                            <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label for="Pendidikan" class="small mb-1">Pendidikan Terakhir</label>
                                <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                        
                                    </select>
                            </div>
                                <div class="col-md-6">
                                <label class="small mb-1" for="inputJurusan">Jurusan</label>
                                <input class="form-control" id="inputJurusan"  name="jurusan" value="#">
                            </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputInstansi" class="form-label">Instansi</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" value="#">
                            </div>
                            <div class="mb-3">
                                <label for="inputBank" class="form-label">Rekening Bank</label>
                                <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                      
                                    </select>
                                  
                            </div>
                            <div class="mb-3">
                                <label for="inputRekening" class="form-label">Nomor Rekening</label>
                                <input type="number" class="form-control" id="inputRekening" name="rekening">
                            </div>
                            <div class="text-center mt-4"> <!-- Tambahkan div untuk mengatur tombol di tengah form -->
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                    </div>
                   
                </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

@endsection