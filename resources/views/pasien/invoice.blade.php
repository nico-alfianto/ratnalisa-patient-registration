@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Invoice Pendaftaran</h1>
                            <p class="mb-0">
                                Daftar seluruh invoice pendaftaran pemeriksaan yang telah dilakukan.
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
                                <h2 class="text-danger fw-bold">{{ $pembayarans->count() }}</h2>
                                <p class="mb-0">Total Invoice</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow rounded-4 text-center">
                            <div class="card-body">
                                <h2 class="text-success fw-bold">{{ $pembayarans->where('status', 'Selesai')->count() }}
                                </h2>
                                <p class="mb-0">Lunas</p>
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
                <!-- Tabel Invoice -->
                <div class="card border-0 shadow rounded-4">

                    <div class="card-header bg-danger py-3">
                        <h5 class="mb-0 text-white">
                            <i class="bi bi-receipt me-2"></i>
                            Daftar Invoice
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Invoice</th>
                                        <th>No Registrasi</th>
                                        <th>Layanan</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse($pembayarans as $item)
                                        <tr class="text-center">

                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>
                                                {{ $item->kode_pembayaran }}
                                            </td>

                                            <td>
                                                {{ $item->pemeriksaan->no_registrasi }}
                                            </td>

                                            <td>
                                                {{ $item->pemeriksaan->layanan->nama_layanan }}
                                            </td>

                                            <td>
                                                {{ $item->created_at->format('d M Y') }}
                                            </td>

                                            <td>
                                                Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
                                            </td>

                                            <td>

                                                @if ($item->status == 'Selesai')
                                                    <span class="badge bg-success">
                                                        Selesai
                                                    </span>
                                                @endif

                                            </td>

                                            <td>

                                                <a href="{{ route('invoice.detail', $item->id) }}"
                                                    class="btn btn-sm btn-danger">

                                                    <i class="bi bi-eye"></i>
                                                    Lihat

                                                </a>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="8" class="text-center">

                                                Belum ada invoice pendaftaran pemeriksaan

                                            </td>

                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <!-- Tombol -->
                <div class="mt-4">

                    <a href="{{ route('dashboard_pasien') }}" class="btn btn-outline-secondary">

                        <i class="bi bi-arrow-left-circle me-2"></i>
                        Kembali ke Dashboard

                    </a>

                </div>

            </div>

        </section>

    </main>
@endsection
