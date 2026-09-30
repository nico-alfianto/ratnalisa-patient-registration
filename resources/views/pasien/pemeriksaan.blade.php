@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Riwayat Pemeriksaan</h1>
                            <p class="mb-0">
                                Lihat seluruh riwayat pemeriksaan, status pembayaran,
                                invoice, dan hasil pemeriksaan laboratorium Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section py-5">

            <div class="container">

                <!-- Statistik -->
                <div class="row g-4 mb-4">

                    <div class="col-md-6">
                        <div class="card border-0 shadow rounded-4 text-center">
                            <div class="card-body">
                                <h2 class="text-danger fw-bold">{{ $totalPemeriksaan }}</h2>
                                <p class="mb-0">Total Pemeriksaan</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow rounded-4 text-center">
                            <div class="card-body">
                                <h2 class="text-warning fw-bold">{{ $menungguPembayaran }}</h2>
                                <p class="mb-0">Menunggu Pembayaran</p>
                            </div>
                        </div>
                    </div>

                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <!-- Tabel Pemeriksaan -->
                <div class="card border-0 shadow rounded-4">

                    <div class="card-header bg-danger text-white py-3">
                        <h5 class="mb-0 text-white">
                            <i class="bi bi-file-medical me-2"></i>
                            Daftar Pemeriksaan
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Registrasi</th>
                                        <th>Layanan</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse($pemeriksaans as $item)
                                        <tr class="text-center">

                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>
                                                {{ $item->no_registrasi }}
                                            </td>

                                            <td>
                                                {{ $item->layanan->nama_layanan }}
                                            </td>

                                            <td>
                                                {{ $item->jadwal->hari }}
                                            </td>

                                            <td>

                                                @switch($item->jadwal->sesi)
                                                    @case('Pagi')
                                                        07:00 - 11:00
                                                    @break

                                                    @case('Siang')
                                                        11:00 - 15:00
                                                    @break

                                                    @case('Sore')
                                                        15:00 - 18:00
                                                    @break

                                                    @case('Malam')
                                                        18:00 - 20:00
                                                    @break
                                                @endswitch

                                            </td>

                                            <td>

                                                @if ($item->pembayaran->status == 'Menunggu Pembayaran')
                                                    <span class="badge bg-warning">
                                                        Menunggu Pembayaran
                                                    </span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('daftar_edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                <a href="{{ route('pembayaran', $item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    Bayar
                                                </a>
                                            </td>
                                        </tr>
                                        @empty

                                            <tr>

                                                <td colspan="7" class="text-center">

                                                    Belum ada pendaftaran pemeriksaan

                                                </td>

                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                    <!-- Tombol -->
                    <div class="mt-4 d-flex gap-2">

                        <a href="{{ route('dashboard_pasien') }}" class="btn btn-outline-secondary">

                            <i class="bi bi-arrow-left-circle me-2"></i>
                            Kembali ke Dashboard

                        </a>

                        <a href="{{ route('layanan') }}" class="btn btn-danger">

                            <i class="bi bi-plus-circle me-2"></i>
                            Daftar Pemeriksaan Baru

                        </a>

                    </div>

                </div>

            </section>

        </main>
    @endsection
