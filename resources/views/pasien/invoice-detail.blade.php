@extends('layouts.app')

@section('content')
    <main class="main">

        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Invoice Pendaftaran</h1>
                            <p class="mb-0">
                                Invoice pendaftaran pemeriksaan Laboratorium Klinik Ratnalisa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section py-5">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="card border-0 shadow-lg rounded-4">

                            <div class="card-body p-5" id="invoice-area">

                                <div class="text-center mb-4">

                                    <div class="mb-3">
                                        <i class="bi bi-check-circle-fill text-success" style="font-size:70px;"></i>
                                    </div>

                                    <h2 class="fw-bold text-success">
                                        Pembayaran Berhasil
                                    </h2>

                                    <p class="text-muted">
                                        Terima kasih. Pembayaran Anda telah berhasil
                                        diterima oleh Laboratorium Klinik Ratnalisa.
                                    </p>

                                </div>

                                <hr>

                                <div class="row align-items-center mb-4">

                                    <div class="col-md-6">

                                        <img src="{{ asset('assets/img/ratnalisa-logo-full.png') }}" alt="Ratnalisa"
                                            style="max-height:80px;">

                                        <h5 class="fw-bold mt-3">
                                            Laboratorium Klinik Ratnalisa dan Patologi Anatomi
                                        </h5>

                                        <p class="mb-0 text-muted">
                                            Jl. Brigjend Saptadji Hadiprawira No.8A
                                        </p>

                                        <p class="mb-0 text-muted">
                                            Kota Bogor
                                        </p>

                                    </div>

                                    <div class="col-md-6 text-md-end">

                                        <h3 class="fw-bold text-danger">
                                            INVOICE
                                        </h3>

                                        <p class="mb-1">
                                            <strong>No Invoice :</strong>
                                            {{ $pembayaran->kode_pembayaran }}
                                        </p>

                                        <p class="mb-1">
                                            <strong>Tanggal :</strong>
                                            {{ $pembayaran->created_at->format('d M Y') }}
                                        </p>

                                        <p class="mb-0">
                                            <strong>Status :</strong>

                                            <span class="badge bg-success">
                                                {{ $pembayaran->status }}
                                            </span>
                                        </p>

                                    </div>

                                </div>

                                <div class="card border-0 bg-light mb-4">

                                    <div class="card-body">

                                        <h5 class="fw-bold mb-3">
                                            Data Pasien
                                        </h5>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <p>
                                                    <strong>Nama :</strong>
                                                    {{ $pembayaran->pemeriksaan->user->nama }}
                                                </p>

                                                <p>
                                                    <strong>NIK :</strong>
                                                    {{ $pembayaran->pemeriksaan->user->nik }}
                                                </p>

                                            </div>

                                            <div class="col-md-6">

                                                <p>
                                                    <strong>Email :</strong>
                                                    {{ $pembayaran->pemeriksaan->user->email }}
                                                </p>

                                                <p>
                                                    <strong>No HP :</strong>
                                                    {{ $pembayaran->pemeriksaan->user->no_hp }}
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <h5 class="fw-bold mb-3">
                                    Detail Pemeriksaan
                                </h5>

                                <div class="table-responsive">

                                    <table class="table table-bordered align-middle">

                                        <thead class="table-danger">

                                            <tr class="text-center">
                                                <th>Layanan</th>
                                                <th>Hari</th>
                                                <th>Sesi</th>
                                                <th>Status</th>
                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr class="text-center">

                                                <td>
                                                    {{ $pembayaran->pemeriksaan->layanan->nama_layanan }}
                                                </td>

                                                <td>
                                                    {{ $pembayaran->pemeriksaan->jadwal->hari }}
                                                </td>

                                                <td>

                                                    @switch($pembayaran->pemeriksaan->jadwal->sesi)
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

                                                    <span class="badge bg-success">
                                                        Selesai
                                                    </span>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                                <div class="row justify-content-end mt-4">

                                    <div class="col-md-5">

                                        <table class="table">

                                            <tr>
                                                <td>Biaya Pemeriksaan</td>
                                                <td class="text-end">
                                                    Rp
                                                    {{ number_format($pembayaran->pemeriksaan->layanan->harga, 0, ',', '.') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Biaya Administrasi</td>
                                                <td class="text-end">
                                                    Rp 2.500
                                                </td>
                                            </tr>

                                            <tr class="fw-bold fs-5">
                                                <td>Total</td>
                                                <td class="text-end text-danger">
                                                    Rp {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}
                                                </td>
                                            </tr>

                                        </table>

                                    </div>

                                </div>

                                <hr>

                                <div class="text-center mt-4">

                                    <p class="text-muted mb-4">
                                        Simpan invoice ini sebagai bukti pembayaran
                                        yang sah.
                                    </p>

                                    <div class="d-flex justify-content-center gap-3 flex-wrap">

                                        <a href="{{ route('invoice') }}" class="btn btn-outline-secondary">

                                            <i class="bi bi-arrow-left-circle me-2"></i>
                                            Kembali

                                        </a>

                                        <button onclick="window.print()" class="btn btn-danger">

                                            <i class="bi bi-printer-fill me-2"></i>
                                            Cetak Invoice

                                        </button>

                                        <a href="{{ route('invoice.download', $pembayaran->id) }}" class="btn btn-success">

                                            <i class="bi bi-download me-2"></i>
                                            Download PDF

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
