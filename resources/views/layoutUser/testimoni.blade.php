@extends('layoutUser.layout.index')
@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>

    <section class="testimoni">
        <div class="container">
            <h6><span style="color: #ccc;">Home / Profile / Reservasi /</span> <span style="color: #070D59;">Testimoni</span>
            </h6>
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
            <div class="card"
                style="background-color: #ffffff; border-radius: 15px; padding: 15px; margin-bottom: 100px;">
                <h6 class="card-title beri-testimoni-tittle">Beri Testimoni</h6>
                <form action="{{ route('testimoni.store') }}" method="post" id="form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <div class="mb-3 input-container">
                        <label for="testimoniTextarea" class="form-label">Testimoni</label>
                        <textarea class="form-control" id="testimoniTextarea" name="testimoni" rows="3"
                            placeholder="Masukkan testimoni Anda"></textarea>
                        <small class="form-text text-danger" id="testimoniError">Masukkan testimoni dan maksimal 130
                            karakter.</small>
                    </div>
                    <div class="mb-3 input-container rating-container">
                        <label for="ratingInput" class="form-label">Kepuasan Pembelajaran</label>
                        <div class="star-rating">
                            <input type="radio" id="star5" name="rating" value="5"><label for="star5"
                                title="Sangat Baik"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star4" name="rating" value="4"><label for="star4"
                                title="Baik"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star3" name="rating" value="3"><label for="star3"
                                title="Cukup"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star2" name="rating" value="2"><label for="star2"
                                title="Buruk"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star1" name="rating" value="1"><label for="star1"
                                title="Sangat Buruk"><i class="fas fa-star"></i></label>
                        </div>
                        <small class="form-text text-danger" id="ratingError">Rating harus
                            diisi.</small>

                    </div>
                    <button type="submit" class="btn btn-primary btn-submit-testimoni"
                        style="margin-top: 30px; margin-bottom: 20px">Buat Testimoni</button>
                </form>
            </div>
        </div>

        <!-- End Card Beri Testimoni -->
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('form');
            const ratingRadios = document.querySelectorAll('input[name="rating"]');
            const testimoniTextarea = document.getElementById('testimoniTextarea');
            const ratingError = document.getElementById('ratingError');
            const testimoniError = document.getElementById('testimoniError');

            // Sembunyikan pesan error rating dan testimoni terlebih dahulu
            ratingError.style.display = 'none';
            testimoniError.style.display = 'none';

            form.addEventListener('submit', function(event) {
                let isRatingSelected = false;
                let isTestimoni = false;

                ratingRadios.forEach(radio => {
                    if (radio.checked) {
                        isRatingSelected = true;
                    }
                });

                if (testimoniTextarea.value.trim() !== '') {
                    isTestimoni = true;
                }

                // Tampilkan pesan error jika rating belum diisi
                if (!isRatingSelected) {
                    event.preventDefault();
                    ratingError.style.display = 'block';
                } else {
                    ratingError.style.display = 'none';
                }

                // Tampilkan pesan error jika testimoni tidak diisi
                if (!isTestimoni) {
                    event.preventDefault();
                    testimoniError.style.display = 'block';
                } else {
                    testimoniError.style.display = 'none';
                }
            });
        });
    </script>
@endsection
