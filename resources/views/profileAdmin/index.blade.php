@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
    <div class="section-header">
            <h1>Halaman Profile</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Profile</h2>
           <p>Silahan ubah identitas anda pada halaman ini!</p>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
        </div>

<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Masukan alamat" value="username">
                        </div>
                         <!-- Form Group (email address)-->
                         <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputKelamin">Jenis Kelamin</label>
                                <input class="form-control" id="inputKelamin" type="text" placeholder="Jenis kelamin" value="####">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Jenis Kelamin</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                            </div>
                        </div>  
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


                </div>

            

    </section>
@endsection
@push('customScript')
    <script>
        $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });
    </script>
@endpush

@push('customStyle')
@endpush