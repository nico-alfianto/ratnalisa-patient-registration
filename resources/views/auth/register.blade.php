@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Registrasi Pasien</h1>
                            <p class="mb-0">
                                Silakan lengkapi data diri Anda untuk membuat akun pasien.
                                Data yang telah didaftarkan akan digunakan saat melakukan
                                pendaftaran pemeriksaan sehingga Anda tidak perlu mengisi ulang
                                data pribadi setiap kali melakukan pendaftaran layanan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Section -->
        <section class="section py-5">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="card border-0 shadow-lg rounded-4">

                            <div class="card-body p-5">

                                <div class="text-center mb-5">
                                    <h2 class="fw-bold">Form Registrasi Pasien</h2>
                                    <p class="text-muted">
                                        Lengkapi seluruh data berikut dengan benar.
                                    </p>
                                </div>

                                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data"
                                    novalidate>

                                    @csrf

                                    <div class="row">

                                        <!-- Foto Profil -->
                                        <div class="col-12 mb-4">
                                            <label for="foto_profil" class="form-label fw-semibold">
                                                Foto Profil
                                            </label>
                                            <input type="file" name="foto_profil" id="file-upload"
                                                class="form-control @error('foto_profil') is-invalid @enderror"
                                                value="{{ old('foto_profil') }}"accept="image/*"
                                                onchange="previewImage(event);">
                                            <img class="mt-2" id="preview-selected-image" width="130px">
                                            @error('foto_profil')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- NIK -->
                                        <div class="col-md-6 mb-4">
                                            <label for="nik" class="form-label fw-semibold">
                                                Nomor KTP (NIK)
                                            </label>
                                            <input type="number" name="nik" id="nik" value="{{ old('nik') }}"
                                                class="form-control @error('nik') is-invalid @enderror"
                                                placeholder="Masukkan nomor KTP pasien" required>
                                            @error('nik')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Nama -->
                                        <div class="col-md-6 mb-4">
                                            <label for="nama" class="form-label fw-semibold">
                                                Nama Lengkap
                                            </label>
                                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Masukkan nama lengkap pasien" required>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Tempat Lahir -->
                                        <div class="col-md-6 mb-4">
                                            <label for="tempat_lahir" class="form-label fw-semibold">
                                                Tempat Lahir
                                            </label>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                value="{{ old('tempat_lahir') }}"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                placeholder="Masukkan tempat lahir pasien" required>
                                            @error('tempat_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Tanggal Lahir -->
                                        <div class="col-md-6 mb-4">
                                            <label for="tanggal_lahir" class="form-label fw-semibold">
                                                Tanggal Lahir
                                            </label>
                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                value="{{ old('tanggal_lahir') }}"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                placeholder="Masukkan tanggal lahir pasien" required>
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="col-md-6 mb-4">
                                            <label for="jenis_kelamin" class="form-label fw-semibold">
                                                Jenis Kelamin
                                            </label>

                                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" id="jenis_kelamin">
                                                <option selected disabled>
                                                    Pilih Jenis Kelamin
                                                </option>
                                                <option value="Laki-Laki"
                                                    {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                                    Laki-Laki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-6 mb-4">
                                            <label for="status" class="form-label fw-semibold">
                                                Status
                                            </label>
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                name="status" id="status">
                                                <option selected disabled>
                                                    Pilih Status
                                                </option>
                                                <option value="Belum Menikah"
                                                    {{ old('status') == 'Belum Menikah' ? 'selected' : '' }}>
                                                    Belum Menikah
                                                </option>
                                                <option value="Menikah" {{ old('status') == 'Menikah' ? 'selected' : '' }}>
                                                    Menikah
                                                </option>
                                            </select>
                                            @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Agama -->
                                        <div class="col-md-6 mb-4">
                                            <label for="agama" class="form-label fw-semibold">
                                                Agama
                                            </label>
                                            <select name="agama_id" id="agama_id"
                                                class="form-control @error('agama_id') is-invalid @enderror">
                                                <option selected disabled>-- Pilih Agama --
                                                </option>
                                                @foreach ($agamas as $agama)
                                                    <option value="{{ $agama->id }}"
                                                        {{ old('agama_id') == $agama->id ? 'selected' : '' }}>
                                                        {{ $agama->nama_agama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('agama')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </select>
                                        </div>

                                        <!-- Pendidikan -->
                                        <div class="col-md-6
                                                    mb-4">
                                            <label for="pendidikan" class="form-label fw-semibold">
                                                Pendidikan Terakhir
                                            </label>
                                            <select name="pendidikan_id" id="pendidikan_id"
                                                class="form-control @error('pendidikan_id') is-invalid @enderror">
                                                <option selected disabled>-- Pilih Pendidikan --
                                                </option>
                                                @foreach ($pendidikans as $pendidikan)
                                                    <option value="{{ $pendidikan->id }}"
                                                        {{ old('pendidikan_id') == $pendidikan->id ? 'selected' : '' }}>
                                                        {{ $pendidikan->nama_pendidikan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pendidikan')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </select>
                                        </div>

                                        <!-- Pekerjaan -->
                                        <div class="col-md-6
                                                    mb-4">
                                            <label for="pekerjaan" class="form-label fw-semibold">
                                                Pekerjaan
                                            </label>
                                            <select name="pekerjaan_id" id="pekerjaan_id"
                                                class="form-control @error('pekerjaan_id') is-invalid @enderror">
                                                <option selected disabled>-- Pilih Pekerjaan --
                                                </option>
                                                @foreach ($pekerjaans as $pekerjaan)
                                                    <option value="{{ $pekerjaan->id }}"
                                                        {{ old('pekerjaan_id') == $pekerjaan->id ? 'selected' : '' }}>
                                                        {{ $pekerjaan->nama_pekerjaan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pekerjaan')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            </select>
                                        </div>

                                        <!-- No HP -->
                                        <div class="col-md-6 mb-4">
                                            <label for="no_hp" class="form-label fw-semibold">
                                                Nomor Handphone
                                            </label>
                                            <input type="number" name="no_hp" id="no_hp"
                                                value="{{ old('no_hp') }}"
                                                class="form-control @error('no_hp') is-invalid @enderror"
                                                placeholder="Masukkan no handphone pasien" required>
                                            @error('no_hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6 mb-4">
                                            <label for="email" class="form-label fw-semibold">
                                                Email
                                            </label>
                                            <input type="email" name="email" id="email"
                                                value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Masukkan email pasien" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="col-md-6 mb-4">
                                            <label for="password" class="form-label fw-semibold">
                                                Password
                                            </label>
                                            <input type="password" name="password" id="password"
                                                value="{{ old('password') }}"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukkan passowrd pasien" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label for="password_confirmation" class="form-label fw-semibold">
                                                Konfirmasi Password
                                            </label>
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation" value="{{ old('password') }}"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukkan konfirmasi passowrd pasien" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-danger btn-lg">
                                            <i class="bi bi-person-plus-fill me-2"></i>
                                            Daftar Akun Pasien
                                        </button>
                                    </div>

                                    <div class="text-center mt-4">
                                        <span class="text-muted">
                                            Sudah memiliki akun?
                                        </span>

                                        <a href="{{ route('login') }}"
                                            class="text-danger fw-semibold text-decoration-none">
                                            Login Sekarang
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
