@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Pendaftaran Pemeriksaan</h1>
                            <p class="mb-0">
                                Lengkapi data pemeriksaan Anda. Data pribadi pasien
                                telah diambil dari akun yang terdaftar sehingga tidak
                                perlu diisi kembali.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Pemeriksaan -->
        <section class="section py-5">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="card border-0 shadow-lg rounded-4">

                            <div class="card-body p-5">

                                <div class="text-center mb-5">
                                    <h2 class="fw-bold">
                                        Form Pendaftaran Pemeriksaan
                                    </h2>

                                    <p class="text-muted">
                                        Pastikan data yang ditampilkan sudah sesuai.
                                    </p>
                                </div>

                                <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data"
                                    novalidate>
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            {{ session('error') }}
                                            <button class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif
                                    @csrf
                                    <div class="row">

                                        <!-- Layanan -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Layanan Pemeriksaan
                                            </label>

                                            <input type="hidden" id="layanan_id" name="layanan_id" class="form-control"
                                                value="{{ $layanan->id }}">
                                            <input type="text" name="nama_layanan" id="nama_layanan" class="form-control"
                                                value="{{ $layanan->nama_layanan }}" readonly>
                                        </div>

                                        <!-- NIK -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Nomor KTP (NIK)
                                            </label>

                                            <input type="text" name="nik" id="nik" class="form-control"
                                                value="{{ $user->nik }}" readonly>
                                        </div>

                                        <!-- Nama -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Nama Lengkap
                                            </label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                value="{{ $user->nama }}" readonly>
                                        </div>

                                        <!-- Tempat Lahir -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Tempat Lahir
                                            </label>

                                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                                value="{{ $user->tempat_lahir }}" readonly>
                                        </div>

                                        <!-- Tanggal Lahir -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Tanggal Lahir
                                            </label>
                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                class="form-control"
                                                value="{{ old('tanggal_lahir', optional($user->tanggal_lahir)->format('Y-m-d')) }}"
                                                readonly>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Jenis Kelamin
                                            </label>

                                            <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                                                class="form-control" value="{{ $user->jenis_kelamin }}" readonly>
                                        </div>

                                        <!-- No HP -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Nomor Handphone
                                            </label>

                                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                                value="{{ $user->no_hp }}" readonly>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Email
                                            </label>

                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ $user->email }}" readonly>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-semibold">
                                                Alamat Lengkap
                                            </label>
                                            <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                                            @error('alamat')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Kelurahan -->
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label fw-semibold">
                                                Kelurahan
                                            </label>
                                            <input type="text" name="kelurahan" id="kelurahan" class="form-control"
                                                placeholder="Kelurahan">
                                            @error('kelurahan')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Kota -->
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label fw-semibold">
                                                Kota / Kabupaten
                                            </label>
                                            <input type="text" name="kota" id="kota" class="form-control"
                                                placeholder="Kota / Kabupaten">
                                            @error('kota')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Negara -->
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label fw-semibold">
                                                Negara
                                            </label>
                                            <input type="text" name="negara" id="negara" class="form-control"
                                                placeholder="Negara">
                                            @error('negara')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">

                                            <label class="form-label fw-semibold">
                                                Jadwal Pemeriksaan
                                            </label>

                                            <select name="jadwal_layanan_id" class="form-control" required>

                                                <option selected disabled>
                                                    Pilih Jadwal Pemeriksaan
                                                </option>

                                                @foreach ($layanan->jadwals as $jadwal)
                                                    @php
                                                        $terisi = $jadwal->pemeriksaans()->count();
                                                        $sisa = $jadwal->kuota - $terisi;
                                                    @endphp

                                                    @if ($sisa > 0)
                                                        <option value="{{ $jadwal->id }}">

                                                            {{ $jadwal->hari }}
                                                            -
                                                            @if ($jadwal->sesi == 'Pagi')
                                                                Pagi (07:00 - 11:00)
                                                            @elseif ($jadwal->sesi == 'Siang')
                                                                Siang (11:00 - 15:00)
                                                            @elseif ($jadwal->sesi == 'Sore')
                                                                Sore (15:00 - 18:00)
                                                            @elseif ($jadwal->sesi == 'Malam')
                                                                Malam (18:00 - 20:00)
                                                            @endif

                                                            (Sisa {{ $sisa }} Kuota)
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            @error('jadwal_layanan_id')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Catatan -->
                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-semibold">
                                                Catatan Tambahan
                                            </label>
                                            <textarea class="form-control" name="catatan" id="catatan" rows="4"
                                                placeholder="Tambahkan catatan apabila diperlukan"></textarea>

                                        </div>

                                    </div>

                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-danger btn-lg">
                                            <i class="bi bi-calendar-check me-2"></i>
                                            Daftar Pemeriksaan
                                        </button>
                                        <br>
                                        <a href="{{ route('detail_layanan', $layanan->slug) }}"
                                            class="btn btn-outline-secondary btn-lg">
                                            <i class="bi bi-arrow-left-circle me-2"></i>
                                            Kembali
                                        </a>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
