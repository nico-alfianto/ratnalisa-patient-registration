@extends('layouts.app')
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Dokter Kami</h1>
                            <p class="mb-0">
                                Tim dokter profesional Ratnalisa Laboratorium Klinik dan Patologi Anatomi
                                siap memberikan pelayanan kesehatan yang akurat, terpercaya, serta
                                mendukung proses pemeriksaan laboratorium Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <!-- Doctors Section -->
        <section id="doctors" class="doctors section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    @foreach ($dokters as $dk)
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">

                            <div class="doctor-card">

                                <div class="doctor-image">
                                    <img src="{{ asset('uploads/dokters/' . $dk->foto) }}" alt="dokter" class="img-fluid">
                                </div>

                                <div class="doctor-content">

                                    <h4>{{ $dk->nama }}</h4>

                                    <span class="specialty">
                                        {{ $dk->spesialis->nama_spesialis ?? '-' }}
                                    </span>

                                    <p>
                                        {{ $dk->deskripsi }}
                                    </p>

                                    <div class="doctor-meta">
                                        <div class="experience">
                                            <i class="bi bi-award"></i>
                                            <span>{{ $dk->pengalaman }} Tahun Pengalaman</span>
                                        </div>
                                    </div>

                                    <a href="{{ route('kontak') }}" class="btn-appointment">
                                        Hubungi Klinik
                                    </a>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </section><!-- /Doctors Section -->

    </main>
@endsection
