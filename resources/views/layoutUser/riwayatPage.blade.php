riwayatpage:

@extends('layoutUser.layout.index')

@section('content')
<style>
body{
    background-color: white;
}
</style>

<section class="riwayat">
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
                        <h5 class="card-title-search" style="margin-left: 30px">Riwayat Reservasi</h5>
                    </div>
                </div>
                
                <!-- Button Group -->
                <div class="button-reservasi">
                    <button class="btn">Semua</button>
                    <button class="btn">Berlangsung</button>
                    <button class="btn">Selesai</button>
                </div>

             
                    <div class="tutorA-card">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="assets/img/tutor1.jpeg" class="card-img-top" alt="Tutor 1">
                            </div>
                            <div class="col-md-7">
                            <div class="tanggal">
                                <a class="nav-link nav-tanggal">
                                <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30" style="margin-right: 10px"><path d="M600-160q-134 0-227-93t-93-227q0-134 93-227t227-93q134 0 227 93t93 227q0 134-93 227t-227 93Zm-.235-60Q708-220 784-295.765q76-75.764 76-184Q860-588 784.235-664q-75.764-76-184-76Q492-740 416-664.235q-76 75.764-76 184Q340-372 415.765-296q75.764 76 184 76ZM702-337l42-42-113-114-1-147h-60v172l132 131ZM80-610v-60h160v60H80ZM40-450v-60h200v60H40Zm40 160v-60h160v60H80Zm520-190Z"/></svg>
                            5 agustsus 2022    
                            </a>          
                            </div>
                                <div class="deskripsiTutorA">
                                    <div class="selengkapnya">
                                        <a href="#" class="btn btn-selengkapnya">Selesai</a>
                                    </div>
                                    <div class="card-body-tutorA">
                                        <h4 class="card-tutorA">Atmayanti</h4>
                                        <h6 class="card-tutor-p">Project Manager</h6>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
</section>


@endsection