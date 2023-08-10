
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

                        @php
                            $profileImagePath = 'storage/' . (auth()->user()->profile->profile ?? 'default.jpg');
                        @endphp
                        @if(file_exists(public_path($profileImagePath)))
                            <img class="card-img-top" src="{{ asset($profileImagePath) }}" alt="">
                        @else
                            <img class="card-img-top"s src="{{ asset('path/to/default/image.jpg') }}" alt="">
                        @endif

                        </div>
                        @if (isset($tutors) && count($tutors)>0)
                        @foreach ($tutors as $tutor)
                            <div class="col-md-7">
                                <div class="deskripsiTutorA">
                                    <div class="card-body-tutorA">
                                        <h4 class="card-tutorA">{{ $tutor->user->name }}</h4> <!-- Perbaikan di sini -->
                                        <h6 class="card-tutor-p">{{ $tutor->jurusan }}</h6>
                                    </div>
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i> {{ $tutor->alamat }}, {{$tutor->kecamatan->name}} <!-- Perbaikan di sini -->
                                    </div>
                                    <div class="teaching-duration">
                                        <i class="fas fa-clock"></i> {{ $tutor->pengalaman }} tahun mengajar
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No tutors available</p>
                    @endif


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
