@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">
                                Pembayaran Pemeriksaan
                            </h1>

                            <p class="mb-0">
                                Selesaikan pembayaran untuk mengaktifkan jadwal
                                pemeriksaan laboratorium Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran -->
        <section class="section py-5">

            <div class="container">

                <div class="row g-4">

                    <!-- DETAIL PEMERIKSAAN -->
                    <div class="col-lg-8">

                        <div class="card border-0 shadow rounded-4">

                            <div class="card-header bg-danger text-white py-3">
                                <h5 class="mb-0">
                                    <i class="bi bi-file-medical me-2"></i>
                                    Detail Pemeriksaan
                                </h5>
                            </div>

                            <div class="card-body p-4">

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">
                                            Nomor Registrasi
                                        </label>

                                        <input type="text" class="form-control" value="REG-2026-0001" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">
                                            Status Pendaftaran
                                        </label>

                                        <input type="text" class="form-control text-warning fw-bold"
                                            value="Menunggu Pembayaran" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">
                                            Nama Pasien
                                        </label>

                                        <input type="text" class="form-control" value="Nama Pasien" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">
                                            Nomor KTP
                                        </label>

                                        <input type="text" class="form-control" value="3271xxxxxxxxxxxx" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">
                                            Layanan Pemeriksaan
                                        </label>

                                        <input type="text" class="form-control" value="Hematologi" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">
                                            Tanggal Pemeriksaan
                                        </label>

                                        <input type="text" class="form-control" value="20 Juli 2026" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">
                                            Jam Pemeriksaan
                                        </label>

                                        <input type="text" class="form-control" value="09:00 WIB" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">
                                            Email
                                        </label>

                                        <input type="text" class="form-control" value="pasien@email.com" readonly>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- RINGKASAN PEMBAYARAN -->
                    <div class="col-lg-4">

                        <div class="card border-0 shadow rounded-4 sticky-top">

                            <div class="card-header bg-danger text-white py-3">
                                <h5 class="mb-0">
                                    <i class="bi bi-credit-card-fill me-2"></i>
                                    Ringkasan Pembayaran
                                </h5>
                            </div>

                            <div class="card-body">

                                <div class="d-flex justify-content-between mb-3">
                                    <span>Biaya Pemeriksaan</span>
                                    <strong>Rp 150.000</strong>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <span>Biaya Administrasi</span>
                                    <strong>Rp 2.500</strong>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between mb-4">

                                    <span class="fw-bold">
                                        Total Pembayaran
                                    </span>

                                    <span class="fw-bold text-danger fs-4">
                                        Rp 152.500
                                    </span>

                                </div>

                                <!-- Countdown -->
                                <div class="alert alert-warning">

                                    <h6 class="fw-bold">
                                        Batas Waktu Pembayaran
                                    </h6>

                                    <p class="mb-0">
                                        23 Jam 59 Menit 59 Detik
                                    </p>

                                </div>

                                <!-- Status -->
                                <div class="alert alert-info">

                                    <small>
                                        Setelah pembayaran berhasil,
                                        status pemeriksaan akan berubah
                                        menjadi <b>Lunas</b> dan invoice
                                        dapat diunduh melalui dashboard pasien.
                                    </small>

                                </div>

                                <!-- Tombol -->
                                <div class="d-grid gap-2">

                                    <button class="btn btn-danger btn-lg">

                                        <i class="bi bi-wallet2 me-2"></i>
                                        Bayar Sekarang

                                    </button>

                                    <a href="{{ route('pemeriksaan') }}" class="btn btn-outline-secondary">

                                        <i class="bi bi-arrow-left-circle me-2"></i>
                                        Kembali

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
