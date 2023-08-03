@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Kelurahan List</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Kelurahan Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Kelurahan List</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('kelurahan.create') }}">Create
                                    New</a>
                                <a class="btn btn-info btn-primary active import">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Import</a>
                                {{-- <a class="btn btn-info btn-primary active" href="">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                    Export</a> --}}
                                <a class="btn btn-info btn-primary active search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Search</a>
                                <a class="btn btn-info btn-primary active" href="{{ route('kelurahan.index') }}">
                                    <i class="fas fa-sync-alt"></i> Reset</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-import"
                                @if ($errors->has('import-file')) style="display: block;" @else style="display: none;" @endif>
                                <div class="custom-file">
                                    <form action="{{ route('kelurahan.import') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <label
                                            class="custom-file-label @error('import-file', 'ImportKelurahanRequest') is-invalid @enderror"
                                            for="file-upload">Choose File</label>
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
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('kelurahan.index') }}">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="text" name="kelurahan" class="form-control" id="kelurahan"
                                                placeholder="Search....">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        {{-- <a class="btn btn-secondary" href="{{ route('kelurahan.index') }}">Reset</a> --}}
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Kecamatan</th>
                                            <th>Kelurahan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($kelurahans as $key => $kelurahan)
                                            <tr>
                                                <td>{{ ($kelurahans->currentPage() - 1) * $kelurahans->perPage() + $key + 1 }}
                                                </td>
                                                <td>{{ $kelurahan->kecamatan }}</td>
                                                <td>{{ $kelurahan->kelurahan }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('kelurahan.edit', $kelurahan->id) }}"
                                                            class="btn btn-sm btn-info btn-icon "><i
                                                                class="fas fa-edit"></i>
                                                            Edit</a>
                                                        <form action="{{ route('kelurahan.destroy', $kelurahan->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $kelurahans->withQueryString()->links() }}
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