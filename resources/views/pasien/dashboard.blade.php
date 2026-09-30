@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Dashboard Pasien</h1>
                            <p class="mb-0">
                                Selamat datang di Portal Pasien Ratnalisa.
                                Kelola profil, pemeriksaan, invoice Anda dalam satu tempat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard -->
        <section class="section py-5">

            <div class="container">

                <!-- Welcome Card -->
                <div class="card border-0 shadow rounded-4 mb-5">
                    <div class="card-body p-4">

                        <div class="row align-items-center">

                            <div class="col-md-8">
                                <h3 class="fw-bold text-danger">
                                    Selamat Datang, {{ Auth::user()->nama }}
                                </h3>
                                <p class="text-muted mb-0">
                                    Akses seluruh layanan pemeriksaan laboratorium
                                    dengan mudah melalui dashboard pasien.
                                </p>
                            </div>

                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <span class="badge bg-success fs-6 px-3 py-2">
                                    Akun Aktif
                                </span>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Menu Dashboard -->
                <div class="row g-4">

                    <!-- Profil -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow h-100 rounded-4">
                            <div class="card-body text-center p-4">

                                <i class="bi bi-person-circle text-danger" style="font-size: 60px;"></i>

                                <h4 class="mt-3 fw-bold">
                                    Profil Saya
                                </h4>

                                <p class="text-muted">
                                    Lihat dan ubah data profil pasien.
                                </p>

                                <a href="{{ route('profil') }}" class="btn btn-danger">
                                    Buka Profil
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Pemeriksaan -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow h-100 rounded-4">
                            <div class="card-body text-center p-4">

                                <i class="bi bi-file-medical text-danger" style="font-size: 60px;"></i>

                                <h4 class="mt-3 fw-bold">
                                    Data Pendaftaran Pemeriksaan
                                </h4>

                                <p class="text-muted">
                                    Lihat daftar dan status pemeriksaan Anda.
                                </p>

                                <a href="{{ route('pemeriksaan') }}" class="btn btn-danger">
                                    Lihat Pendaftaran Pemeriksaan
                                </a>

                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow h-100 rounded-4">
                            <div class="card-body text-center p-4">

                                <i class="bi bi-credit-card text-danger" style="font-size: 60px;"></i>

                                <h4 class="mt-3 fw-bold">
                                    Pembayaran
                                </h4>

                                <p class="text-muted">
                                    Cek status pembayaran pemeriksaan.
                                </p>

                                <a href="{{ route('pembayarann') }}" class="btn btn-danger">
                                    Lihat Pembayaran
                                </a>

                            </div>
                        </div>
                    </div> --}}

                    <!-- Invoice -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow h-100 rounded-4">
                            <div class="card-body text-center p-4">

                                <i class="bi bi-receipt text-danger" style="font-size: 60px;"></i>

                                <h4 class="mt-3 fw-bold">
                                    Data Invoice
                                </h4>

                                <p class="text-muted">
                                    Unduh invoice pendaftaran pemeriksaan.
                                </p>

                                <a href="{{ route('invoice') }}" class="btn btn-danger">
                                    Lihat Invoice
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Logout -->
                    <div class="col-lg-4 col-md-6">
                        <form action="{{ route('logout') }}" method="POST">

                            @csrf
                            <div class="card border-0 shadow h-100 rounded-4">
                                <div class="card-body text-center p-4">

                                    <i class="bi bi-box-arrow-right text-danger" style="font-size: 60px;"></i>

                                    <h4 class="mt-3 fw-bold">
                                        Logout
                                    </h4>

                                    <p class="text-muted">
                                        Keluar dari akun pasien.
                                    </p>

                                    <button type="submit" class="btn btn-danger">

                                        Logout

                                    </button>

                        </form>

                    </div>
                </div>
            </div>

            </div>

            </div>

        </section>

    </main>
@endsection
