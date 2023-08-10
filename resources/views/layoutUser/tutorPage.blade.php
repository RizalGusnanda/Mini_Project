
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
              <li class="breadcrumb-item active"><a href="#">Tutor</a></li>
            </ol>
          </nav>
    </div>
</section>

<section class="search">
    <div class="container">
        <div class="card-search-tutor">
            <div class="card-body">
                <h5 class="card-title-search">Cari tutor sesuai kebutuhanmu</h5>
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
                      <button type="submit" class="card-search-tutor button-tutor">
                          <i class="fas fa-search"></i>
                      </button>
                  </form>
              </div>
            </div>
        </div>
    </div>
</section>
<section class="tutorA-me-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tutorA-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="assets/img/tutor1.jpeg" class="card-img-top" alt="Tutor 1">
                        </div>
                        
                        <div class="col-md-7">
                            <div class="deskripsiTutorA">
                                <div class="nextArrow">
                                    <a href="detail-tutor.html" class="next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M4 13H16.175L10.575 18.6L12 20L20 12L12 4L10.575 5.4L16.175 11H4L4 13Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-body-tutorA">
                                    <h4 class="card-tutorA">Atmayanti</h4>
                                    <h6 class="card-tutor-p">Project Manager</h6>
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
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tutorA-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="assets/img/tutor1.jpeg" class="card-img-top" alt="Tutor 1">
                        </div>
                        
                        <div class="col-md-7">
                            <div class="deskripsiTutorA">
                                <div class="nextArrow">
                                    <a href="detail-tutor.html" class="next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M4 13H16.175L10.575 18.6L12 20L20 12L12 4L10.575 5.4L16.175 11H4L4 13Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-body-tutorA">
                                    <h4 class="card-tutorA">Atmayanti</h4>
                                    <h6 class="card-tutor-p">Project Manager</h6>
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
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tutorA-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="assets/img/tutor1.jpeg" class="card-img-top" alt="Tutor 1">
                        </div>
                        
                        <div class="col-md-7">
                            <div class="deskripsiTutorA">
                                <div class="nextArrow">
                                    <a href="detail-tutor.html" class="next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M4 13H16.175L10.575 18.6L12 20L20 12L12 4L10.575 5.4L16.175 11H4L4 13Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-body-tutorA">
                                    <h4 class="card-tutorA">Atmayanti</h4>
                                    <h6 class="card-tutor-p">Project Manager</h6>
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
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tutorA-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="assets/img/tutor1.jpeg" class="card-img-top" alt="Tutor 1">
                        </div>
                        
                        <div class="col-md-7">
                            <div class="deskripsiTutorA">
                                <div class="nextArrow">
                                    <a href="detail-tutor.html" class="next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M4 13H16.175L10.575 18.6L12 20L20 12L12 4L10.575 5.4L16.175 11H4L4 13Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-body-tutorA">
                                    <h4 class="card-tutorA">Atmayanti</h4>
                                    <h6 class="card-tutor-p">Project Manager</h6>
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
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
</section>

@endsection
