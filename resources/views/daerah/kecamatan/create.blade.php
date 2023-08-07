@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table Kecamatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Kecamatan</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Kecamatan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kecamatan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                id="kecamatan" name="kecamatan" placeholder="Masukkan Kecamatan">
                            @error('kecamatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('kecamatan.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection