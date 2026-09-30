@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

    <div class="page-heading">
        <h3>Dashboard Admin</h3>
    </div>

    <div class="page-content">

        <section class="row">

            <div class="col-12">

                <div class="row">

                    <div class="card">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <h3 class="mb-2">
                                        Selamat Datang, Administrator
                                    </h3>

                                    <p class="text-muted mb-0">

                                        Anda sedang mengakses Sistem Informasi Laboratorium
                                        Klinik Ratnalisa dan Patologi Anatomi.

                                    </p>

                                    <p class="text-muted mb-0">

                                        Kelola data pasien, dokter, layanan laboratorium,
                                        pemeriksaan, dan invoice melalui dashboard ini.

                                    </p>

                                </div>

                                <div>

                                    <span class="badge bg-light-primary fs-6 px-4 py-3">

                                        <i class="bi bi-shield-check me-2"></i>

                                        Administrator

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-3">

                        <div class="card">

                            <div class="card-body">

                                <h6>Ratnalisa | Total Pasien</h6>

                                <h3 class="text-primary">
                                    {{ $totalPasien }}
                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="card">

                            <div class="card-body">

                                <h6>Ratnalisa | Total Dokter</h6>

                                <h3 class="text-success">
                                    {{ $totalDokter }}
                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="card">

                            <div class="card-body">

                                <h6>Ratnalisa | Total Layanan</h6>

                                <h3 class="text-warning">
                                    {{ $totalLayanan }}
                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="card">

                            <div class="card-body">

                                <h6>Ratnalisa | Total Pemeriksaan</h6>

                                <h3 class="text-danger">
                                    {{ $totalPemeriksaan }}
                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="card">

                            <div class="card-body">

                                <h6>Ratnalisa | Total Pemeriksaan Menunggu Pembayaran</h6>

                                <h3 class="text-danger">
                                    {{ $menungguPembayaran }}
                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="card">

                            <div class="card-body">

                                <h6>Ratnalisa | Total Pemeriksaan Selesai</h6>

                                <h3 class="text-danger">
                                    {{ $pemeriksaanSelesai }}
                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="card">

                            <div class="card-body">

                                <h6>
                                    Ratnalisa | Total Pendapatan
                                </h6>

                                <h4 class="text-success">

                                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}

                                </h4>

                            </div>

                        </div>

                    </div>

                    <div class="card">

                        <div class="card-header">

                            <h4>
                                Aktivitas Terbaru
                            </h4>

                        </div>

                        <div class="card-body">

                            <table class="table">

                                <thead>

                                    <tr>
                                        <th>Pasien</th>
                                        <th>Layanan</th>
                                        <th>Status</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($latestPemeriksaan as $item)
                                        <tr>

                                            <td>
                                                {{ $item->user->nama }}
                                            </td>

                                            <td>
                                                {{ $item->layanan->nama_layanan }}
                                            </td>

                                            <td>

                                                @if ($item->status == 'Selesai')
                                                    <span class="badge bg-success">
                                                        Selesai
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning">
                                                        Menunggu Pembayaran
                                                    </span>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="card">

                        <div class="card-header">

                            <h4>
                                Statistik Sistem
                            </h4>

                        </div>

                        <div class="card-body">

                            <canvas id="dashboardChart"></canvas>

                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Status Pemeriksaan</h4>
                        </div>

                        <div class="card-body">

                            @php
                                $persenSelesai =
                                    $totalPemeriksaan > 0 ? round(($pemeriksaanSelesai / $totalPemeriksaan) * 100) : 0;

                                $persenPending =
                                    $totalPemeriksaan > 0 ? round(($menungguPembayaran / $totalPemeriksaan) * 100) : 0;
                            @endphp

                            <h6>Pemeriksaan Selesai</h6>

                            <div class="progress mb-4" style="height:25px">

                                <div class="progress-bar bg-success" style="width: {{ $persenSelesai }}%">

                                    {{ $persenSelesai }}%

                                </div>

                            </div>

                            <h6>Menunggu Pembayaran</h6>

                            <div class="progress" style="height:25px">

                                <div class="progress-bar bg-warning" style="width: {{ $persenPending }}%">

                                    {{ $persenPending }}%

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx =
            document.getElementById('dashboardChart');

        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: [

                    'Pasien',
                    'Dokter',
                    'Layanan',
                    'Pemeriksaan',
                    'Menunggu Pembayaran',
                    'Selesai'

                ],

                datasets: [{

                    label: 'Jumlah Data',

                    data: [

                        {{ $totalPasien }},
                        {{ $totalDokter }},
                        {{ $totalLayanan }},
                        {{ $totalPemeriksaan }},
                        {{ $menungguPembayaran }},
                        {{ $pemeriksaanSelesai }}

                    ]

                }]

            }

        });
    </script>
@endsection
