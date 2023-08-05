@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Kategori Spesialisasi</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Spesialisasi Management</h2>

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
                    <div class="card-header-action" style="display: flex; align-items: center;">
                        <form class="form-inline mr-auto" action="#" method="GET">
                        <div class="input-group">
                        <input type="text" name="nama_spesialisasi" class="form-control" id="nama_spesialisasi" placeholder="Cari Spesialisasi" 
                            onfocus="clearPlaceholder()" onblur="restorePlaceholder()">
                        <div class="input-group-append">
                            <button class="btn btn-icon icon-left btn-primary ml-2" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <script>
                        function clearPlaceholder() {
                            var input = document.getElementById("nama_spesialisasi");
                            input.placeholder = "";
                        }

                        function restorePlaceholder() {
                            var input = document.getElementById("nama_spesialisasi");
                            input.placeholder = "Cari Spesialisasi";
                        }
                    </script>
                        </form>
                        <a class="btn btn-icon icon-left btn-primary ml-2" href="{{ route('spesialisasi.create') }}">Create New</a>
                    </div>
                </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th style="text-align: center; width: 10%;">ID Spesialisasi</th>
                                            <th style="text-align: center;">Nama Spesialisasi</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                        @foreach ($spesalisasis as $key => $nama_spesialisasi)
                                            <tr>
                                                <td style="text-align: center;">{{ ($spesalisasis->currentPage() - 1) * $spesalisasis->perPage() + $key + 1 }}</td>
                                                <td style="text-align: center;">{{ $nama_spesialisasi->nama_spesialisasi }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                    <a href="{{ route('spesialisasi.edit', $nama_spesialisasi->id) }}" class="btn btn-sm btn-info btn-icon"><i class="fas fa-edit"></i> Edit</a>

                                                        <form action="{{ route('spesialisasi.destroy', $nama_spesialisasi->id) }}" method="POST" class="ml-2">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                {{ $spesalisasis->withQueryString()->links() }}
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