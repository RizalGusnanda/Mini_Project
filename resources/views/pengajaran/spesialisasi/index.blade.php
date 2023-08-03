@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Spesialisasi List</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Spesialisasi Manajement</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Spesialisasi List</h4>
                            <div class="card-header-action">
                            <a class="btn btn-icon icon-left btn-primary" href="{{ route('spesialisasi.create') }}">Create
                                    New</a>
                                <a class="btn btn-info btn-primary active search"> <i class="fa fa-search"
                                        aria-hidden="true"></i> Search Template</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="#">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="role">Search</label>
                                            <input type="text" name="nama_spesialisasi" class="form-control" id="nama_spesialisasi"
                                                placeholder="Cari Spesialisasi">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th style="text-align: center;">ID Spesialisasi</th>
                                            <th style="text-align: center;">Nama Spesialisasi</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                </div>
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