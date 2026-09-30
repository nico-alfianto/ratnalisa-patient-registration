@extends('layouts.app')
@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content">

                            <h1 data-aos="fade-right" data-aos-delay="300">
                                <span class="highlight">Ratnalisa</span> Laboratorium Klinik dan Patologi Anatomi
                            </h1>

                            <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
                                Laboratorium Klinik dan Patologi Anatomi yang menyediakan layanan pemeriksaan kesehatan
                                secara profesional, cepat, akurat, dan terpercaya. Didukung oleh tenaga medis berpengalaman
                                serta teknologi laboratorium modern untuk membantu masyarakat menjaga kesehatan dengan lebih
                                baik.
                            </p>

                            <div class="hero-stats mb-4" data-aos="fade-right" data-aos-delay="500">
                                <div class="stat-item">
                                    <h3>
                                        <span data-purecounter-start="0" data-purecounter-end="10"
                                            data-purecounter-duration="2" class="purecounter"></span>+
                                    </h3>
                                    <p>Tahun Pengalaman</p>
                                </div>
                                <div class="stat-item">
                                    <h3>
                                        <span data-purecounter-start="0" data-purecounter-end="1000"
                                            data-purecounter-duration="2" class="purecounter"></span>+
                                    </h3>
                                    <p>Pemeriksaan Dilayani</p>
                                </div>
                                <div class="stat-item">
                                    <h3>
                                        <span data-purecounter-start="0" data-purecounter-end="20"
                                            data-purecounter-duration="2" class="purecounter"></span>+
                                    </h3>
                                    <p>Tenaga Profesional</p>
                                </div>
                            </div>

                            <div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
                                <a href="{{ route('layanan') }}" class="btn btn-primary">Lihat Layanan</a>
                                <a href="{{ route('kontak') }}" class="btn btn-outline glightbox">
                                    <i class="bi bi-telephone me-2"></i>
                                    Hubungi Kami
                                </a>
                            </div>

                            <div class="emergency-contact" data-aos="fade-right" data-aos-delay="700">
                                <div class="emergency-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div class="emergency-info">
                                    <small>Telepon</small>
                                    <strong>(0251) 8366707 | 0812 8282 0191</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
                            <div class="main-image">
                                <img src="assets/img/ratna1.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="background-elements">
                                <div class="element element-1"></div>
                                <div class="element element-2"></div>
                                <div class="element element-3"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Hero Section -->

        <!-- Home About Section -->
        <section id="home-about" class="home-about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
                        <div class="about-content">
                            <h2 class="section-heading">Profil Singkat Ratnalisa Laboratorium Klinik</h2>
                            <p class="lead-text">Ratnalisa Laboratorium Klinik dan Patologi Anatomi hadir sebagai fasilitas
                                kesehatan yang berkomitmen memberikan hasil pemeriksaan yang akurat, cepat, dan terpercaya.
                            </p>

                            <p> Kami menyediakan berbagai layanan pemeriksaan laboratorium mulai dari hematologi, kimia
                                klinik, imunologi, mikrobiologi, hingga patologi anatomi. Dengan dukungan tenaga profesional
                                dan peralatan modern, kami siap membantu kebutuhan pemeriksaan kesehatan masyarakat maupun
                                institusi.</p>
                            <div class="cta-section">
                                <a href="{{ route('tentang') }}" class="btn-primary">Tentang Kami</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="about-visual">
                            <div class="main-image">
                                <img src="assets/img/ratna2.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="background-elements">
                                <div class="element element-1"></div>
                                <div class="element element-2"></div>
                                <div class="element element-3"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Home About Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="hero-content">
                    <div class="row align-items-center">

                        <div class="col-lg-6">
                            <div class="content-wrapper" data-aos="fade-up" data-aos-delay="200">
                                <h1>Jaga Kesehatan Anda Bersama Ratnalisa</h1>
                                <p>Lakukan pemeriksaan kesehatan secara rutin dengan layanan laboratorium yang cepat,
                                    akurat, dan terpercaya untuk mendukung kualitas hidup yang lebih baik.</p>

                                <div class="cta-wrapper">
                                    <a href="{{ route('layanan') }}" class="primary-cta">
                                        <span>Daftar Layanan</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                    <a href="{{ route('kontak') }}" class="secondary-cta">
                                        <span>Hubungi Kami</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="image-container" data-aos="fade-left" data-aos-delay="300">
                                <img src="assets/img/health/facilities-9.webp" alt="Medical Excellence"
                                    class="img-fluid">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="features-section">

                    <div class="row g-0">

                        <div class="col-lg-4">
                            <div class="feature-block" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <h3>Hasil Akurat</h3>
                                <p>Menggunakan peralatan laboratorium modern dengan standar pemeriksaan yang terpercaya.</p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="feature-block" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-icon">
                                    <i class="bi bi-clock"></i>
                                </div>
                                <h3>Pelayanan Cepat</h3>
                                <p>Proses pemeriksaan yang efisien untuk memberikan hasil tepat waktu kepada pasien.</p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="feature-block" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <h3>Tenaga Profesional</h3>
                                <p>Didukung oleh tenaga medis dan analis laboratorium yang berpengalaman..</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Call To Action Section -->

    </main>
@endsection
