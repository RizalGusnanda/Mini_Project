@extends('layoutUser.layout.index')
@section('content')
<style>
body{
    background-color: white;
}
</style>
<section class="breadcrumb">
    <div class="container">
        <nav aria-label="Breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="#">Paket</a></li>
            </ol>
          </nav>
    </div>
</section>


  <section class="header">
  <div class="container">
        <div class="card-search">
            <div class="card-body">
                <h5 class="card-title-search">Pilihan Paket Belajar</h5>
            </div>
        </div>

  </section>

  <section class="price-section-paket">
  <div class="background-container">
      <div class="container">
          <div class="row">
            <div class="price-about">
              
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

@endsection