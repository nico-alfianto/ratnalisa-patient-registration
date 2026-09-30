@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Layanan</h1>
                            <p class="mb-0">
                                Pilih layanan pemeriksaan laboratorium yang sesuai dengan kebutuhan kesehatan Anda.
                                Ratnalisa Laboratorium Klinik dan Patologi Anatomi menyediakan berbagai layanan
                                pemeriksaan dengan hasil yang akurat, cepat, dan terpercaya untuk membantu
                                pemantauan kondisi kesehatan secara menyeluruh.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Page Title -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Kategori Layanan Pemeriksaan Laboratorium</h2>
                <p>
                    Temukan berbagai pilihan layanan pemeriksaan kesehatan yang dapat membantu
                    mendeteksi, memantau, dan menjaga kondisi kesehatan Anda secara berkala.
                </p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    @foreach ($layanans as $ly)
                        <!-- Screening Diabetes -->
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item">
                                <div class="service-image">
                                    <img src="{{ asset('uploads/layanans/' . $ly->gambar) }}" class="img-fluid"
                                        alt="layanan.jpg">
                                </div>
                                <div class="service-content">
                                    <h3>{{ $ly->nama_layanan }}</h3>
                                    <p>
                                        {{ $ly->deskripsi }}
                                    </p>
                                    <a href="{{ route('detail_layanan', $ly->slug) }}" class="service-btn">
                                        <span>Lihat Detail & Daftar</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </section>
        <!-- End Services Section -->

    </main>
@endsection
