@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table Spesialisasi</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Spesialisasi</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Spesialisasi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('spesialisasi.store') }}" method="post">
                        @csrf
                        <div class="form-group">

                            <label>Spesialisasi</label>
                            <input type="text" id="nama_spesialisasi" name="nama_spesialisasi"
                                class="form-control @error('nama_spesialisasi') is-invalid @enderror"
                                placeholder="Masukan Nama Spesialisasi">
                            @error('nama_spesialisasi')

                            <label>Kelurahan</label>
                            <input type="text" id="namaSpesialisasi" name="spesialisasi"
                                class="form-control @error('spesialisasi') is-invalid @enderror"
                                placeholder="Masukan Nama Spesialisasi" autocomplete="off">
                            @error('spesialisasi')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('spesialisasi.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush