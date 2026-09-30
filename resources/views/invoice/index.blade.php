@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Invoice Pemeriksaan</h1>
                            <p class="mb-0">
                                Bukti pendaftaran dan pembayaran pemeriksaan laboratorium.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice -->
        <section class="section py-5">

            <div class="container">

                <div class="card border-0 shadow-lg rounded-4">

                    <div class="card-body p-5">

                        <!-- Header Invoice -->
                        <div class="row align-items-center mb-5">

                            <div class="col-md-6">

                                <img src="{{ asset('assets/img/ratnalisa-logo-full.png') }}" alt="Ratnalisa"
                                    style="max-height:80px;">

                                <h4 class="mt-3 fw-bold text-danger">
                                    Ratnalisa Laboratorium Klinik dan Patologi Anatomi
                                </h4>

                                <p class="mb-0 text-muted">
                                    Jl. Brigjend Saptadji Hadiprawira No.8A<br>
                                    Kota Bogor
                                </p>

                            </div>

                            <div class="col-md-6 text-md-end">

                                <h2 class="fw-bold text-danger">
                                    INVOICE
                                </h2>

                                <p class="mb-1">
                                    <strong>No Invoice:</strong>
                                    INV-2026-0001
                                </p>

                                <p class="mb-1">
                                    <strong>No Registrasi:</strong>
                                    REG-2026-0001
                                </p>

                                <p class="mb-0">
                                    <strong>Tanggal:</strong>
                                    20 Juli 2026
                                </p>

                            </div>

                        </div>

                        <hr>

                        <!-- Data Pasien -->
                        <div class="row mb-5">

                            <div class="col-md-6">

                                <h5 class="fw-bold mb-3">
                                    Data Pasien
                                </h5>

                                <table class="table table-borderless">

                                    <tr>
                                        <td width="180">
                                            Nama Pasien
                                        </td>
                                        <td>
                                            : Nama Pasien
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            NIK
                                        </td>
                                        <td>
                                            : 3271XXXXXXXXXXXX
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            : pasien@email.com
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            No Handphone
                                        </td>
                                        <td>
                                            : 081234567890
                                        </td>
                                    </tr>

                                </table>

                            </div>

                            <div class="col-md-6">

                                <h5 class="fw-bold mb-3">
                                    Jadwal Pemeriksaan
                                </h5>

                                <table class="table table-borderless">

                                    <tr>
                                        <td width="180">
                                            Layanan
                                        </td>
                                        <td>
                                            : Hematologi
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Tanggal
                                        </td>
                                        <td>
                                            : 20 Juli 2026
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Jam
                                        </td>
                                        <td>
                                            : 09:00 WIB
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Status
                                        </td>
                                        <td>
                                            :
                                            <span class="badge bg-success">
                                                LUNAS
                                            </span>
                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                        <!-- Rincian Pembayaran -->
                        <h5 class="fw-bold mb-3">
                            Rincian Pembayaran
                        </h5>

                        <div class="table-responsive">

                            <table class="table table-bordered align-middle">

                                <thead class="table-danger">

                                    <tr>
                                        <th>
                                            Deskripsi
                                        </th>

                                        <th width="200" class="text-end">
                                            Jumlah
                                        </th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <tr>
                                        <td>
                                            Pemeriksaan Hematologi
                                        </td>

                                        <td class="text-end">
                                            Rp 150.000
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Biaya Administrasi
                                        </td>

                                        <td class="text-end">
                                            Rp 2.500
                                        </td>
                                    </tr>

                                </tbody>

                                <tfoot>

                                    <tr>

                                        <th class="text-end">
                                            Total Pembayaran
                                        </th>

                                        <th class="text-end text-danger">
                                            Rp 152.500
                                        </th>

                                    </tr>

                                </tfoot>

                            </table>

                        </div>

                        <!-- Footer -->
                        <div class="alert alert-success mt-4">

                            <i class="bi bi-check-circle-fill me-2"></i>

                            Pembayaran berhasil diterima.
                            Harap datang sesuai jadwal pemeriksaan yang telah dipilih.

                        </div>

                        <a href="{{ route('detail_layanan') }}" class="btn btn-outline-secondary">

                            <i class="bi bi-arrow-left me-2"></i>
                            Kembali

                        </a>

                        <!-- Button -->
                        <div class="text-end mt-4">

                            <button class="btn btn-outline-danger">

                                <i class="bi bi-printer me-2"></i>
                                Cetak Invoice

                            </button>

                            <button class="btn btn-danger">

                                <i class="bi bi-download me-2"></i>
                                Download PDF

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
