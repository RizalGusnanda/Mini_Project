@extends('layoutUser.layout.index')

@section('content')
<!-- start hero -->
<section class="hero">
    <div class="container d-flex align-items-center">
        <div class="row align-items-center">
            <div class="col">
                <p>Bergabunglah dengan kami</p>
                <h2 class="mt-50">Temukan Guru Privat Terbaik untuk Mengasah Potensimu di <img src="assets/img/GuruLink.png" alt="GuruLink" style="zoom: 1.5;"></h2>
                <br>
                <br>
                <div class="search-column">
                  <form action="" class="search-form">
                      <div class="search-input">
                          <i class="material-icons">cast_for_education</i>
                          <input type="text" name="search1" placeholder="Cari Tutor">
                      </div>
                      <div class="search-input">
                          <i class="material-icons">location_on</i>
                          <input type="text" name="search2" placeholder="Cari Lokasi">
                      </div>
                      <button type="submit">
                          <i class="fas fa-search"></i>
                      </button>
                  </form>
              </div>
            </div>
            <div class="col">
                <img src="assets/img/cuate.png" alt="">
            </div>
        </div>
    </div>
</section>
<!-- end hero -->

<!-- about me -->
<section class="about-me-section">
  <div class="container">
      <div class="row">
        <div class="title-about">
          <div class="col-md-12 text-center">
            <h1>kenapa harus <img src="img/GuruLink.png" alt=""></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
          </div>
        </div>
        
          <div class="col-md-3">
              <div class="feature-card">
                  <div class="card-body">
                    <img src="assets/img/profesional.png" alt="">
                      <h4>Tutor Profesional</h4>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="feature-card ">
                  <div class="card-body">
                    <img src="assets/img/terpercaya.png" alt="">
                      <h4>Terpercaya</h4>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="feature-card">
                  <div class="card-body">
                    <img src="assets/img/personal.png" alt="">
                      <h4>Pendekatan Interaktif</h4>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="feature-card">
                  <div class="card-body">
                    <img src="assets/img/inovatif.png" alt="">
                      <h4>Dukungan Penuh</h4>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                  </div>
              </div>
          </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <div class="row">
        <div class="col-md-6">
            <div class="about-image">
                <img src="assets/img/c2.png" alt="Foto Saya">
            </div>
        </div>
        <div class="col-md-4">
            <div class="about-content">
                <span>Tentang</span>
                <h1>GuruLink</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates non, dolores iure quia aliquid ex voluptate tenetur. Earum delectus voluptatibus fugiat error aperiam sed, cum, odio porro reiciendis illum similique?</p>
                <a href="" class="btn btn-transparent">Cek Selengkapnya</a>
            </div>
        </div>
    </div>

    
  </div>
</section>

<!-- end about me -->

<!-- price -->

<section class="price-section">
  <div class="background-container">
      <div class="container">
          <div class="row">
            <div class="price-about">
              <div class="col-md-12 text-center">
                <h1>Pilihan Paket Belajar  <img src="assets/img/GuruLink.png" alt=""></h1>
              </div>
            </div>
              <div class="col-md-4">
                  <div class="price-card">
                      <div class="card-body">
                          <h3>Paket Basic</h3>
                          <div class="line-container">
                            <div class="line"></div> <!-- Garis pemisah -->
                        </div>
                        <div class="price-harga">
                          <p>$19.99/bulan</p>
                        </div>
                       
                         
                          <ul>
                              <li>Video pelajaran</li>
                              <li>Materi latihan</li>
                              <li>Dukungan email</li>
                          </ul>
                          <a href="#" class="btn btn-primary">Beli Sekarang</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="price-card">
                    <div class="card-body">
                        <h3>Paket Basic</h3>
                        <div class="line-container">
                          <div class="line"></div> <!-- Garis pemisah -->
                      </div>
                      <div class="price-harga">
                        <p>$19.99/bulan</p>
                      </div>
                     
                       
                        <ul>
                            <li>Video pelajaran</li>
                            <li>Materi latihan</li>
                            <li>Dukungan email</li>
                        </ul>
                        <a href="#" class="btn btn-price">Daftar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
              <div class="price-card">
                  <div class="card-body">
                      <h3>Paket Basic</h3>
                      <div class="line-container">
                        <div class="line"></div> <!-- Garis pemisah -->
                    </div>
                    <div class="price-harga">
                      <p>$19.99/bulan</p>
                    </div>
                   
                     
                      <ul>
                          <li>Video pelajaran</li>
                          <li>Materi latihan</li>
                          <li>Dukungan email</li>
                      </ul>
                      <a href="#" class="btn btn-price">Daftar</a>
                  </div>
              </div>
          </div>
          </div>
      </div>
  </div>
</section>


<!-- tutor section -->
<section class="about-me-section">
  <div class="container">
      <div class="row">
        <div class="title-about">
          <div class="col-md-12 text-center">
            <h1>Rekomendasi Tutor <img src="assets/img/GuruLink.png" alt=""></h1>
            
          </div>
        </div>
        
        <div class="row mt-4">
          <div class="col-md-3">
            <div class="tutor-card">
              <div class="">

              </div>
              <img src="assets/img/tutor1.jpeg" class="card-img-top" alt="Tutor 1">
              <div class="card-body-tutor">
                <h4 class="card-tutor">Atmayanti</h4>
                <h6 class="card-tutor-p">Project Manager</h6>
                <br>
              </div>
              <div class="location">
                <i class="fas fa-map-marker-alt"></i> Lowokwaru, Malang
              </div>
              <div class="teaching-duration">
                <i class="fas fa-clock"></i> 3 tahun mengajar
              </div>
              <div class="rating">
                <i class="fas fa-star" style="color: gold;"></i> 4.9/5
              </div>
              <div class="Selengkapnya">
                <a href="detail-tutor.html" class="btn btn-selengkapnya">Lihat Selengkapnya</a>
              </div>
              
            </div>
          </div>
          
      </div>
      
    </div>

    
  </div>
</section>
<!-- end tutor section -->
@endsection