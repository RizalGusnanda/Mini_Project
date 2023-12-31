@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>DASHBOARD</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
    </section>

    @role('super-admin')
        <section class="adminDashborad">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title" style="color: black">{{ $totalSiswa }}</h4>
                                    <p class="card-category"> Total Siswa</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-tutor bubble-shadow-small">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title" style="color: black">{{ $totalTutor }}</h4>
                                    <p class="card-category"> Total Tutor</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-tutor bubble-shadow-small">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="numbers">
                                            <h4 class="card-title" style="color: black">Rp.{{ number_format($uang) }}</h4>
                                            <p class="card-category"> Total Pendapatan</p>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <a href="#" data-toggle="modal" data-target="#saldoModal">
                                            <div class="col bg-primary rounded-lg text-center mt-4">
                                                <p class="text-white ml-3 mt-1" style="font-size: 15px"> tarik saldo</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="col">
                <div class="row">
                    <div class="col col-lg-6 col-md-6 col-sm-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Pengajar Tertop</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myPengajar" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Siswa Order Terbanyak</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Siswa</th>
                                            <th>Email</th>
                                            <th>Jumlah Transaksi</th>
                                            <th>Transaksi Terakhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswas as $key => $siswa)
                                            <tr>
                                                <td> {{ $loop->iteration }}</td>
                                                <td>{{ $siswa->name }}</td>
                                                <td>{{ $siswa->email }}</td>
                                                <td>{{ $siswa->pembayarans_count }}</td>
                                                <td>{{ $siswa->latest_transaction ?? 'N/A' }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endrole

    @role('user-pengajar')
        <section class="adminDashborad">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.alert')
                    <div id="alertSuccess"></div>
                    <div id="alertWarning"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title" style="color: black">{{ $totalSiswa }}</h4>
                                    <p class="card-category"> Total Siswa</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-tutor bubble-shadow-small">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="numbers">
                                            <h4 class="card-title" style="color: black">Rp.{{ number_format($uang) }}</h4>
                                            <p class="card-category"> Total Pendapatan</p>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <a href="#" data-toggle="modal" data-target="#saldoModal">
                                            <div class="col bg-primary rounded-lg text-center mt-4">
                                                <p class="text-white ml-3 mt-1" style="font-size: 15px"> tarik saldo</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="col">
                <div class="row">
                    <div class="col col-lg-6 col-md-6 col-sm-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Terlaris Paket yang terjual</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myPaket" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Siswa Order Terbanyak</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Siswa</th>
                                            <th>Email</th>
                                            <th>Jumlah Transaksi</th>
                                            <th>Transaksi Terakhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswas as $key => $siswa)
                                            <tr>
                                                <td> {{ $loop->iteration }}</td>
                                                <td>{{ $siswa->name }}</td>
                                                <td>{{ $siswa->email }}</td>
                                                <td>{{ $siswa->pembayarans_count }}</td>
                                                <td>{{ $siswa->latest_transaction ?? 'N/A' }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endrole
    <div class="modal fade" id="saldoModal" tabindex="-1" role="dialog" aria-labelledby="saldoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="saldoModalLabel">Tarik Saldo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($uangPengajar <= 400000)
                    <div class="modal-body">
                        Saldo Tidak Dapat Ditarik Karena Kurang Dari Jumlah Minimum
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-lg" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary rounded-lg" id="tarikSaldoBtn" disabled>Tarik
                            Saldo</button>
                    </div> --}}
                @else
                    <div class="modal-body">
                        Anda yakin ingin menarik semua saldo Anda?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-lg" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary rounded-lg" id="tarikSaldoBtn">Tarik Saldo</button>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
@push('customScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/fullcalendar.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/mudules-calendar.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tarikSaldoBtn = document.getElementById("tarikSaldoBtn");

            tarikSaldoBtn.addEventListener("click", function() {
                $.ajax({
                    url: '/pencairan-saldo', // Adjust this if your endpoint is different
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_users: '{{ auth()->user()->id }}',
                        jumlah: {{ $uangPengajar }} // Assuming you want to set this amount statically
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#saldoModal').modal('hide');
                            var successAlert = '<div class="alert alert-success alert-dismissible show fade" id="success-alert">';
                        successAlert += '<div class="alert-body">';
                        successAlert += '<button class="close" data-dismiss="alert">';
                        successAlert += '<span>×</span>';
                        successAlert += '</button>';
                        successAlert += '<p> Permintaan pencairan saldo berhasil dibuat. </p>';
                        successAlert += '</div></div>';

                        $(successAlert).insertBefore('#alertSuccess');
                        } else {
                            $('#saldoModal').modal('hide');
                            var successAlert1 = '<div class="alert  alert-danger alert-dismissible show fade" id="error-alert">';
                        successAlert1 += '<div class="alert-body">';
                        successAlert1 += '<button class="close" data-dismiss="alert">';
                        successAlert1 += '<span>×</span>';
                        successAlert1 += '</button>';
                        successAlert1 += '<p> Gagal membuat permintaan pencairan saldo. </p>';
                        successAlert1 += '</div></div>';

                        $(successAlert1).insertBefore('#alertWarning');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengirim permintaan.');
                    }
                });
            });
        });
    </script>
    <script>
        var ctx = document.getElementById('myPaket').getContext('2d');
        var labels = {!! json_encode($paketTerjual->pluck('nama_paket')) !!};
        var data = {!! json_encode($paketTerjual->pluck('total_terjual')) !!};

        var myPaket = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Terjual',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myPengajar').getContext('2d');
        var labels = {!! json_encode($toturTerjual->pluck('name')) !!};
        var data = {!! json_encode($toturTerjual->pluck('total_penjual')) !!};

        var myPengajar = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pengajar Lonte',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let ctx = document.getElementById('myChart').getContext('2d');
            let labels = @json($monthlySum->pluck('month_year'));
            let data = @json($monthlySum->pluck('sum'));

            let myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Amount',
                        data: data,
                        fill: false,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endpush
@push('customStyle')
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.min.css') }}">
@endpush
