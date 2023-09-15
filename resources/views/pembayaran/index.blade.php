@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Pembayaran Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Pembayaran List</h4>
                            <div class="card-header-action" style="display: flex; align-items: center;">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr>
                                        
                                        <th style="text-align: center; width: 10%;">ID Pembayaran</th>
                                        <th style="text-align: center;">Nama Siswa</th>
                                        <th style="text-align: center;">Nama Tutor</th>
                                        <th style="text-align: center;">Paket Pembelajaran</th>
                                        <th style="text-align: center;">Total Pembayaran</th>
                                        <th style="text-align: center;">Status</th>
                                    </tr>
                                    @foreach ($pembayaran as $bayar)
                                    <tr>
                                            <td>{{ $bayar->merchant_ref }}</td>
                                            <td>{{ $bayar->name }}</td>
                                            <td>{{ $bayar->nama_mentor }}</td>
                                            <td>{{ $bayar->nama_paket }}</td>
                                            <td>Rp. {{ number_format( $bayar->total_amount) }}</td>
                                            <td>
                                                @if($bayar->status == 'paid')
                                                <span class="bg-green-100 text-green-800" style="color: green">
                                                    {{ $bayar->status }}

                                                </span>
                                                @else 
                                                <span class="bg-red-100 text-red-800" style="color: red">
                                                    {{ $bayar->status }}

                                                </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
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