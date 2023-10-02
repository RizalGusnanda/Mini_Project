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
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Jumlah</th>
                                        <th style="text-align: center;">Status</th>
                                        @role('super-admin')
                                            <th style="text-align: center;">Action</th>
                                        @endrole
                                    </tr>
                                    @role('super-admin')
                                        @foreach ($statusPenarikan as $bayar)
                                            <tr>
                                                <td>{{ $bayar->name }}</td>
                                                <td>Rp. {{ number_format($bayar->jumlah) }}</td>
                                                <td>
                                                    @if ($bayar->status == 'disetujui')
                                                        <span class="bg-green-100 text-green-800" style="color: green">
                                                            {{ $bayar->status }}
                                                        </span>
                                                    @else
                                                        <span class="bg-red-100 text-red-800" style="color: red">
                                                            {{ $bayar->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn-action bg-primary text-white rounded-lg text-right" data-id="{{ $bayar->id }}"
                                                        data-status="{{ $bayar->status }}">Ubah Status</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endrole
                                    @role('user-pengajar')
                                        @foreach ($statusPenarikanUser as $bayar)
                                            <tr>
                                                <td>{{ $bayar->name }}</td>
                                                <td>Rp. {{ number_format($bayar->jumlah) }}</td>
                                                <td>
                                                    @if ($bayar->status == 'disetujui')
                                                        <span class="bg-green-100 text-green-800">
                                                            {{ $bayar->status }}
                                                        </span>
                                                    @else
                                                        <span class="bg-red-100 text-red-800">
                                                            {{ $bayar->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endrole
                                </tbody>
                            </table>
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
    <script>
        $(document).ready(function() {
            $('.btn-action').click(function() {
                var id = $(this).data('id');
                var status = $(this).data('status') == 'disetujui' ? 'ditolak' : 'disetujui';
                console.log(id);
                var url = '{{ route('penarikan.editStatus', ['id' => ':id']) }}';
                url = url.replace(':id',
                    id); // Menggantikan placeholder :id dengan nilai id yang sesungguhnya

                $.ajax({
                    url: url, // Menggunakan URL yang sudah dimodifikasi
                    type: 'POST',
                    data: {
                        status: status,
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // Mengambil CSRF Token dari meta tag
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update UI
                            $(this).data('status', status);
                            var statusLabel = $(this).closest('tr').find('td').eq(2).find(
                                'span');
                            statusLabel.text(status);
                            location.reload();
                            statusLabel.toggleClass(
                                'bg-green-100 text-green-800 bg-red-100 text-red-800');
                        } else {
                            // Handle error
                            alert('Gagal mengubah status');
                        }
                    }.bind(this),
                    error: function() {
                        alert('Terjadi kesalahan pada server');
                    }
                });
            });
        });
    </script>
@endpush

@push('customStyle')
@endpush