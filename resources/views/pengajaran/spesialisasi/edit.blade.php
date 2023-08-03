@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table Spesialisasi</h1>
        <div class="section-body">
            <h2 class="section-title">Edit Spesialisasi</h2>

            <div class="card">
                <div class="card-body">
                <form action="{{ route('spesialisasi.update', $nama_spesialisasi->id) }}" method="POST">
                        <div class="card-header">
                            <h4>Validasi Edit Data Spesialisasi</h4>
                        </div>
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_spesialisasi">Spesialisasi</label>
                                <input type="text" class="form-control @error('nama_spesialisasi') is-invalid @enderror"
                                    id="nama_spesialisasi" name="nama_spesialisasi" value="{{ $nama_spesialisasi->nama_spesialisasi }}">
                                @error('nama_spesialisasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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