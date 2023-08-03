@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table Spesialisasi</h1>
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
                            <input type="text" id="namaSpesialisasi" name="spesalisasi"
                                class="form-control @error('spesalisasi') is-invalid @enderror"
                                placeholder="Masukan Nama Spesialisasi" autocomplete="off">
                            @error('spesalisasi')
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