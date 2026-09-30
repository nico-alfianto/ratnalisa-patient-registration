@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Pembayaran Pemeriksaan</h1>
                            <p class="mb-0">
                                Silakan lakukan pembayaran untuk menyelesaikan proses
                                pendaftaran pemeriksaan Anda.
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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <!-- KIRI -->
                    <div class="col-lg-8">

                        <!-- Detail Pemeriksaan -->
                        <div class="card border-0 shadow rounded-4 mb-4">

                            <div class="card-header py-3 bg-danger">
                                <h5 class="mb-0 text-white">
                                    <i class="bi bi-file-medical me-2"></i>
                                    Detail Pemeriksaan
                                </h5>
                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Nomor Registrasi</label>
                                        <input type="text"name="no_registrasi" id="no_registrasi" class="form-control"
                                            value="{{ $pemeriksaan->no_registrasi }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Status</label>
                                        <input type="text"name="status" id="status"
                                            class="form-control text-warning fw-bold"
                                            value="{{ $pemeriksaan->pembayaran->status }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Nama Pasien</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="{{ $pemeriksaan->user->nama }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Layanan</label>
                                        <input type="text" name="nama_layanan" id="nama_layanan" class="form-control"
                                            value="{{ $pemeriksaan->layanan->nama_layanan }}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Hari Pemeriksaan</label>
                                        <input type="text" name="hari" id="hari" class="form-control"
                                            value="{{ $pemeriksaan->jadwal->hari }}" readonly>
                                    </div>

                                    @php
                                        $jamSesi = [
                                            'Pagi' => '07:00 - 11:00',
                                            'Siang' => '11:00 - 15:00',
                                            'Sore' => '15:00 - 18:00',
                                            'Malam' => '18:00 - 20:00',
                                        ];
                                    @endphp
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Sesi Pemeriksaan</label>
                                        <input type="text" name="sesi" id="sesi" class="form-control"
                                            value="{{ $pemeriksaan->jadwal->sesi }} ({{ $jamSesi[$pemeriksaan->jadwal->sesi] ?? '-' }})"
                                            readonly>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-lg-4">
                        <div class="card border-0 shadow rounded-4 sticky-top">

                            <div class="card-header bg-danger py-3">
                                <h5 class="mb-0 text-white">
                                    Ringkasan Pembayaran
                                </h5>
                            </div>

                            <div class="card-body">

                                <div class="d-flex justify-content-between mb-3">
                                    <span>Biaya Pemeriksaan</span>
                                    <strong>Rp {{ number_format($pemeriksaan->layanan->harga, 0, ',', '.') }}</strong>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <span>Biaya Administrasi</span>
                                    <strong>Rp 2.500</strong>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between mb-4">
                                    <span class="fw-bold">Total Pembayaran</span>
                                    <span class="fw-bold text-danger fs-4">
                                        Rp {{ number_format($pemeriksaan->pembayaran->total_bayar, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="alert alert-info">
                                    <small>
                                        Setelah pembayaran berhasil, status pendaftaran
                                        akan berubah menjadi <b>Lunas</b> dan Invoice
                                        dapat diunduh pada menu Invoice Pemeriksaan.
                                    </small>
                                </div>

                                <div class="d-grid gap-2">

                                    <!-- Tombol Bayar -->
                                    <button type="button" id="pay-button" class="btn btn-danger btn-lg">
                                        <i class="bi bi-credit-card-fill me-2"></i>
                                        Bayar Sekarang
                                    </button>

                                    <!-- Tombol Kembali -->
                                    <a href="{{ route('detail_layanan', $pemeriksaan->layanan->slug) }}"
                                        class="btn btn-outline-secondary btn-lg">
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
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script>
        document.getElementById('pay-button').onclick = function() {

            snap.pay('{{ $pemeriksaan->pembayaran->snap_token }}', {

                onSuccess: function(result) {

                    window.location.href =
                        "{{ route('payment.success', $pemeriksaan->id) }}";

                },

                onPending: function(result) {

                    alert('Pembayaran Pending');

                },

                onError: function(result) {

                    alert('Pembayaran Gagal');

                }

            });

        };
    </script>
@endsection
