@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Edit Pendaftaran Pemeriksaan</h1>
                            <p class="mb-0">
                                Perbarui data pemeriksaan Anda sebelum melanjutkan ke tahap pembayaran.
                                Pastikan seluruh informasi yang diinput sudah sesuai.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Edit Pemeriksaan -->
        <section class="section py-5">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="card border-0 shadow-lg rounded-4">

                            <div class="card-body p-5">

                                <div class="text-center mb-5">
                                    <h2 class="fw-bold">
                                        Edit Data Pendaftaran Pemeriksaan
                                    </h2>

                                    <p class="text-muted">
                                        Data pribadi pasien diambil dari akun yang terdaftar dan tidak dapat diubah dari
                                        halaman ini.
                                    </p>
                                </div>

                                <form action="{{ route('daftar_update', $pemeriksaan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">

                                        <!-- Layanan -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Layanan Pemeriksaan
                                            </label>

                                            <input type="text" name="nama_layanan" id="nama_layanan"
                                                class="form-control bg-light"
                                                value="{{ $pemeriksaan->layanan->nama_layanan }}" readonly>
                                        </div>

                                        <!-- Nomor Pemeriksaan -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Nomor Pendaftaran
                                            </label>

                                            <input type="text" name="no_registrasi" id="no_registrasi"
                                                class="form-control bg-light" value="{{ $pemeriksaan->no_registrasi }}"
                                                readonly>
                                        </div>

                                        <!-- NIK -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Nomor KTP (NIK)
                                            </label>

                                            <input type="text" name="nik" id="nik"
                                                class="form-control bg-light" value="{{ $pemeriksaan->user->nik }}"
                                                readonly>
                                        </div>

                                        <!-- Nama -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Nama Lengkap
                                            </label>

                                            <input type="text" name="nama" id="nama"
                                                class="form-control bg-light" value="{{ $pemeriksaan->user->nama }}"
                                                readonly>
                                        </div>

                                        <!-- Tempat Lahir -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Tempat Lahir
                                            </label>

                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                class="form-control bg-light" value="{{ $pemeriksaan->user->tempat_lahir }}"
                                                readonly>
                                        </div>

                                        <!-- Tanggal Lahir -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Tanggal Lahir
                                            </label>

                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                class="form-control bg-light"
                                                value="{{ $pemeriksaan->user->tanggal_lahir->format('Y-m-d') }}" readonly>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Jenis Kelamin
                                            </label>

                                            <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                                                class="form-control bg-light"
                                                value="{{ $pemeriksaan->user->jenis_kelamin }}" readonly>
                                        </div>

                                        <!-- No HP -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Nomor Handphone
                                            </label>

                                            <input type="text" name="no_hp" id="no_hp"
                                                class="form-control bg-light" value="{{ $pemeriksaan->user->no_hp }}"
                                                readonly>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Email
                                            </label>

                                            <input type="email" name="email" id="email"
                                                class="form-control bg-light" value="{{ $pemeriksaan->user->email }}"
                                                readonly>
                                        </div>

                                        <!-- Status Pemeriksaan -->
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">
                                                Status
                                            </label>

                                            <input type="text" name="status" id="status"
                                                class="form-control bg-warning-subtle" value="{{ $pemeriksaan->status }}"
                                                readonly>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-semibold">
                                                Alamat Lengkap
                                            </label>
                                            <textarea name="alamat" id="alamat" class="form-control" val rows="3">{{ old('alamat', $pemeriksaan->alamat) }}</textarea required>
                                        </div>

                                        <!-- Kelurahan -->
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label fw-semibold">
                                                Kelurahan
                                            </label>
                                            <input type="text" name="kelurahan" id="kelurahan" class="form-control"
                                                value="{{ $pemeriksaan->kelurahan }}" required>
                                        </div>

                                        <!-- Kota -->
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label fw-semibold">
                                                Kota / Kabupaten
                                            </label>

                                            <input type="text" name="kota" id="kota" class="form-control"
                                                value="{{ $pemeriksaan->kota }}" required>
                                        </div>

                                        <!-- Negara -->
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label fw-semibold">
                                                Negara
                                            </label>
                                            <input type="text" name="negara" id="negara" class="form-control"
                                                value="{{ $pemeriksaan->negara }}" required>
                                        </div>

<div class="col-md-6 mb-4">

    <label class="form-label fw-semibold">
        Jadwal Pemeriksaan
    </label>

    <select
        name="jadwal_layanan_id"
        class="form-control"
        required>

        <option disabled>
            Pilih Jadwal Pemeriksaan
        </option>

        @foreach ($jadwals as $jadwal)
@php
    $terisi = $jadwal->pemeriksaans()->count();
    $sisa = $jadwal->kuota - $terisi;
@endphp

            @if ($sisa > 0 || $jadwal->id == $pemeriksaan->jadwal_layanan_id)
<option
                    value="{{ $jadwal->id }}"
                    {{ $jadwal->id == $pemeriksaan->jadwal_layanan_id ? 'selected' : '' }}>

                    {{ $jadwal->hari }}
                    -

                    @switch($jadwal->sesi)
@case('Pagi')
Pagi (07:00 - 11:00)
@break

@case('Siang')
Siang (11:00 - 15:00)
@break

@case('Sore')
Sore (15:00 - 18:00)
@break

@case('Malam')
Malam (18:00 - 20:00)
@break
@endswitch

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

                                            <textarea name="catatan" id="catatan" class="form-control" rows="4">{{ old('catatan', $pemeriksaan->catatan) }}</textarea>
                                        </div>

                                    </div>

                                    <!-- Tombol -->
                                    <div class="row mt-4">

                                        <div class="col-md-6 mb-3">
                                            <a href="{{ route('pemeriksaan') }}"
                                                class="btn btn-outline-secondary btn-lg w-100">
                                                <i class="bi bi-arrow-left me-2"></i>
                                                Kembali
                                            </a>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <button type="submit" class="btn btn-danger btn-lg w-100">
                                                <i class="bi bi-save me-2"></i>
                                                Simpan Perubahan
                                            </button>
                                        </div>

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
