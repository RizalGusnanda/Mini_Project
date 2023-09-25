@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Kecamatan List</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Kecamatan Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Kecamatan List</h4>
                            <div class="card-header-action" style="display: flex; align-items: center;">
                                    <form class="form-inline mr-auto" action="#" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Cari" 
                                            onfocus="clearPlaceholder()" onblur="restorePlaceholder()">
                                    <div class="input-group-append">
                                        <button class="btn btn-icon icon-left btn-primary ml-2" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                             </div>
                            <style>
                            .btn-primary {
                            margin-right: 10px;
                            }
                        </style>
                             <script>
                                function clearPlaceholder() {
                                    var input = document.getElementById("kecamatan");
                                    input.placeholder = "";
                                }

                                function restorePlaceholder() {
                                    var input = document.getElementById("kecamatan");
                                    input.placeholder = "Cari";
                                }
                            </script>
                            </form>
                            </div>

                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" style="width: auto" href="{{ route('kecamatan.create') }}">Tambah Kecamatan Baru</a>
                                <a class="btn btn-info btn-primary active import" style="width: auto">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Import Kecamatan</a>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="show-import"
                                @if ($errors->has('import-file')) style="display: block;" @else style="display: none;" @endif></a>
                                <p class="text-warning mx-0 my-0 font-weight-bold">type:xlsx, csv,
                                    xls|max:10mb</p>
                                <div class="custom-file">
                                    <form action="{{ route('kecamatan.import') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <label
                                            class="custom-file-label @error('import-file', 'ImportKecamatanRequest') is-invalid @enderror"
                                            for="file-upload">Pilih File
                                        </label>
                                        <input type="file" id="file-upload" class="custom-file-input" name="import-file"
                                            data-id="send-import">
                                        <br />
                                        @error('import-file')
                                            <div class="invalid-feedback d-flex mb-10" role="alert">
                                                <div class="alert_alert-dange_mt-1_mb-1 mt-1 ml-1">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                                        <br />
                                        <div class="footer text-right">
                                            <button class="btn btn-primary" data-id="submit-import">Import File</button>
                                        </div>
                                        <br>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Kecamatan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($kecamatans as $key => $kecamatan)
                                            <tr>
                                                <td>{{ ($kecamatans->currentPage() - 1) * $kecamatans->perPage() + $key + 1 }}
                                                </td>
                                                <td>{{ $kecamatan->kecamatan }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('kecamatan.edit', $kecamatan->id) }}"
                                                            class="btn btn-sm btn-info btn-icon "><i
                                                                class="fas fa-edit"></i>
                                                            Edit</a>
                                                        <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Hapus </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $kecamatans->withQueryString()->links() }}
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
            //ganti label berdasarkan nama file
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