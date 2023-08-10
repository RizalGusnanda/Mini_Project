@extends('layoutUser.layout.index')
@section('content')
<style>
body{
    background-color: white;
}
</style>

<section class="testimoni">
    <div class="container">
        <h6><span style="color: #ccc;">Home / Profile / Reservasi /</span> <span
                style="color: #070D59;">Testimoni</span></h6>
    </div>

    <!-- Card Testimoni Siswa -->
    <div class="container mt-3">
        <div class="card"
            style="background-color: #D2D8E7; border-radius: 15px; margin-bottom: 30px; border: 1px solid #D2D8E7;">
            <div class="row g-0">
                <h5 class="card-title testimoni-title">Testimoni Siswa</h5>
            </div>
        </div>
    </div>
    <!-- End Card Testimoni Siswa -->

    <!-- Card Beri Testimoni -->
    <div class="container mt-3">
        <div class="card" style="background-color: #ffffff; border-radius: 15px; padding: 15px; margin-bottom: 100px;">
            <h6 class="card-title beri-testimoni-tittle">Beri Testimoni</h6>
            <form>
                <div class="mb-3 input-container">
                    <label for="nameInput" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nameInput" placeholder="Masukkan nama Anda">
                </div>
                <div class="mb-3 input-container">
                    <label for="testimoniTextarea" class="form-label">Testimoni</label>
                    <textarea class="form-control" id="testimoniTextarea" rows="3" placeholder="Masukkan testimoni Anda"></textarea>
                </div>
                <div class="mb-3 input-container rating-container">
                    <label for="ratingInput" class="form-label">Kepuasan Pembelajaran</label>
                    <div class="star-rating">
                        <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="Sangat Buruk"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="Buruk"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="Cukup"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="Baik"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="Sangat Baik"><i class="fas fa-star"></i></label>
                    </div>
                                        
                </div>
                <button type="submit" class="btn btn-primary btn-submit-testimoni">Buat Testimoni</button>
            </form>
        </div>
    </div>
    
    <!-- End Card Beri Testimoni -->
</section>
@endsection