@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Detail Layanan {{ $layanans->nama_layanan }}</h1>
                            <p class="mb-0">
                                {{ $layanans->deskripsi_singkat }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Details -->
        <section id="service-details-2" class="service-details-2 section">

            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <div class="service-header">
                            <div class="service-category">
                                <span>Pemeriksaan Laboratorium</span>
                            </div>
                            <h2>Layanan {{ $layanans->nama_layanan }}</h2>
                        </div>
                    </div>
                </div>

                <div class="row gy-4 align-items-center">
                    <!-- Kiri -->
                    <div class="col-lg-5 d-flex align-items-strech">
                        <div class="service-details w-100 h-100">

                            <div class="detail-item">
                                <div class="content">
                                    <h4>Tentang Layanan</h4>
                                    <p style="text-align: justify; line-height: 1.8;">
                                        {!! $layanans->deskripsi_lengkap !!}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Kanan -->
                    <div class="col-lg-7 d-flex flex-column justify-content-center">
                        <div class="service-visual">
                            <img src="{{ asset('uploads/layanans/' . $layanans->gambar) }}" alt="layanan.jpg"
                                class="img-fluid rounded" style="width: 100%; max-height: 420px; object-fit: cover;">

                            <div class="visual-overlay">
                                <div class="stats-card">
                                    <div class="stat">
                                        <span class="number">99%</span>
                                        <span class="label">Akurasi Hasil</span>
                                    </div>

                                    <div class="stat">
                                        <span class="number">24 Jam</span>
                                        <span class="label">Layanan Informasi</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-sm border-0 mt-4">

                            <div class="card-body text-center">

                                <h6 class="text-muted mb-2">
                                    Harga Pemeriksaan
                                </h6>

                                <h2 class="text-danger fw-bold mb-0">
                                    Rp {{ number_format($layanans->harga, 0, ',', '.') }}
                                </h2>

                                <small class="text-muted">
                                    Harga dapat berubah sesuai kebutuhan pemeriksaan tambahan
                                </small>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- Overview -->
                <div class="row gy-4 mt-5">

                    <div class="col-12">
                        <div class="service-overview">

                            <div class="row align-items-center">

                                <div class="col-lg-6">
                                    <h3>Mengapa Memilih Layanan Hematologi Kami?</h3>

                                    <p>
                                        Ratnalisa Laboratorium Klinik dan Patologi Anatomi didukung oleh tenaga
                                        profesional dan peralatan modern yang menghasilkan pemeriksaan hematologi
                                        dengan tingkat akurasi tinggi. Setiap hasil pemeriksaan diproses sesuai
                                        standar laboratorium untuk memberikan informasi kesehatan yang terpercaya.
                                    </p>
                                </div>

                                <div class="col-lg-6">
                                    <div class="treatment-areas">
                                        <h4>Parameter Pemeriksaan Standar</h4>

                                        <div class="condition-tags">
                                            <span class="tag">Analisis Sampel Darah</span>
                                            <span class="tag">Pemeriksaan Biokimia Klinik</span>
                                            <span class="tag">Deteksi Infeksi & Peradangan</span>
                                            <span class="tag">Evaluasi Fungsi Organ</span>
                                            <span class="tag">Pemeriksaan Mikrobiologi Dasar</span>
                                            <span class="tag">Monitoring Kondisi Kesehatan</span>
                                            <span class="tag">Screening Penyakit Umum</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <!-- Action Cards -->
                <div class="row gy-4 mt-5">

                    <div class="col-lg-4">
                        <div class="action-card primary">
                            <div class="card-header">
                                <i class="bi bi-calendar-check"></i>
                                <h4>Daftar Pemeriksaan</h4>
                            </div>
                            <p>
                                Lakukan pendaftaran layanan hematologi secara online dengan mudah dan cepat.
                            </p>
                            <div class="card-footer">
                                @auth
                                    <a href="{{ route('daftar', $layanans->slug) }}" class="btn-action">
                                        Daftar Sekarang
                                    </a>
                                    <a href="{{ route('pemeriksaan') }}" class="btn-edit-pendaftaran text-center">
                                        <i class="bi bi-pencil-square me-1"></i>
                                        Edit Pendaftaran
                                    </a>
                                    <br>
                                    <span class="availability">
                                        Langkah 1 dari 3
                                    </span>
                                @else
                                    <button class="btn-action w-100" disabled style="opacity:.6; cursor:not-allowed;">
                                        <i class="bi bi-lock-fill me-1"></i>
                                        Login Terlebih Dahulu
                                    </button>

                                    <span class="availability text-danger">
                                        🔒 Login untuk mengakses fitur ini
                                    </span>
                                @endauth
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="action-card primary">
                            <div class="card-header">
                                <i class="bi bi-credit-card"></i>
                                <h4>Pembayaran</h4>
                            </div>
                            <p>
                                Lakukan pembayaran setelah
                                pendaftaran pemeriksaan berhasil.
                            </p>
                            <div class="card-footer">
                                @auth
                                    <a href="{{ route('pemeriksaan') }}" class="btn-action">
                                        Pembayaran
                                    </a>
                                    <span class="availability">
                                        Selesaikan pendaftaran terlebih dahulu
                                    </span>
                                @else
                                    <button class="btn-action w-100" disabled style="opacity:.6; cursor:not-allowed;">
                                        <i class="bi bi-lock-fill me-1"></i>
                                        Login Terlebih Dahulu
                                    </button>

                                    <span class="availability text-danger">
                                        🔒 Login untuk mengakses fitur ini
                                    </span>
                                @endauth
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="action-card primary">
                            <div class="card-header">
                                <i class="bi bi-file-earmark-medical"></i>
                                <h4>Invoice Pendaftaran</h4>
                            </div>
                            <p>
                                Unduh
                                invoice pendaftaran setelah pembayaran berhasil.
                            </p>
                            <div class="card-footer">
                                @auth
                                    <a href="{{ route('invoice') }}" class="btn-action">
                                        Download Invoice
                                    </a>
                                    <span class="availability">
                                        Menunggu Pembayaran
                                    </span>
                                @else
                                    <button class="btn-action w-100" disabled style="opacity:.6; cursor:not-allowed;">
                                        <i class="bi bi-lock-fill me-1"></i>
                                        Login Terlebih Dahulu
                                    </button>

                                    <span class="availability text-danger">
                                        🔒 Login untuk mengakses fitur ini
                                    </span>
                                @endauth
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </main>
@endsection
