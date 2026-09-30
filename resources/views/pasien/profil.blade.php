@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Profil Pasien</h1>
                            <p class="mb-0">
                                Kelola dan perbarui informasi pribadi Anda untuk memastikan
                                data pemeriksaan dan hasil laboratorium selalu akurat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profil -->
        <section class="section py-5">

            <div class="container">

                <div class="row g-4">

                    <!-- FOTO PROFIL -->
                    <div class="col-lg-4">

                        <div class="card border-0 shadow rounded-4">

                            <div class="card-body text-center p-5">

                                <img src="{{ asset('uploads/profils/' . $user->foto_profil) }}" alt="Foto Profil"
                                    class="rounded-circle img-fluid mb-4"
                                    style="width: 180px; height: 180px; object-fit: cover;">

                                <h4 class="fw-bold">
                                    {{ $user->nama }}
                                </h4>

                                <p class="text-muted">
                                    Pasien Ratnalisa Laboratorium Klinik dan Patologi Anatomi
                                </p>

                                <hr>
                                <img src="{{ asset('assets/img/ratnalisa-logo-full.png') }}" alt="Logo Ratnalisa"
                                    width="200">
                            </div>

                        </div>

                    </div>

                    <!-- DATA PASIEN -->
                    <div class="col-lg-8">

                        <div class="card border-0 shadow rounded-4">

                            <div class="card-header bg-danger text-white py-3">
                                <h5 class="mb-0 text-white">
                                    <i class="bi bi-person-vcard me-2"></i>
                                    Data Pribadi Pasien
                                </h5>
                            </div>
                            <br>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                    <button class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            <div class="card-body p-4">
                                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')
                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">
                                                Nomor KTP (NIK)
                                            </label>
                                            <input type="text" name="nik" id="nik"
                                                class="form-control editable" value="{{ $user->nik }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">
                                                Nama Lengkap
                                            </label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control editable" value="{{ $user->nama }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">
                                                Email
                                            </label>
                                            <input type="email" name="email" id="email"
                                                class="form-control editable" value="{{ $user->email }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">
                                                No Handphone
                                            </label>
                                            <input type="text" name="no_hp" id="no_hp"
                                                class="form-control editable" value="{{ $user->no_hp }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">
                                                Tempat Lahir
                                            </label>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                class="form-control editable" value="{{ $user->tempat_lahir }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">
                                                Tanggal Lahir
                                            </label>
                                            <input type="date" name="tanggal_lahir" class="form-control editable"
                                                value="{{ old('tanggal_lahir', optional($user->tanggal_lahir)->format('Y-m-d')) }}">
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">
                                                Jenis Kelamin
                                            </label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control editable">
                                                <option value="Laki-Laki"
                                                    {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                                    Laki-Laki
                                                </option>

                                                <option value="Perempuan"
                                                    {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">Status</label>

                                            <select name="status" id="status" class="form-control editable">
                                                <option value="Belum Menikah"
                                                    {{ old('status', $user->status) == 'Belum Menikah' ? 'selected' : '' }}>
                                                    Belum Menikah
                                                </option>

                                                <option value="Menikah"
                                                    {{ old('status', $user->status) == 'Menikah' ? 'selected' : '' }}>
                                                    Menikah
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">
                                                Agama
                                            </label>
                                            <select name="agama_id" id="agama_id" class="form-control editable">

                                                @foreach ($agamas as $agama)
                                                    <option value="{{ $agama->id }}"
                                                        {{ old('agama_id', $user->agama_id) == $agama->id ? 'selected' : '' }}>

                                                        {{ $agama->nama_agama }}

                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="fw-bold">
                                                Pendidikan
                                            </label>
                                            <select name="pendidikan_id" id="pendidikan_id" class="form-control editable"
                                                value="{{ old('pendidikan_id', $user->pendidikan_id) }}">
                                                @foreach ($pendidikans as $pendidikan)
                                                    <option value="{{ $pendidikan->id }}"
                                                        {{ old('pendidikan_id', $user->pendidikan_id) == $pendidikan->id ? 'selected' : '' }}>

                                                        {{ $pendidikan->nama_pendidikan }}

                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">
                                                Pekerjaan
                                            </label>
                                            <select name="pekerjaan_id" id="pekerjaan_id" class="form-control editable">

                                                @foreach ($pekerjaans as $pekerjaan)
                                                    <option value="{{ $pekerjaan->id }}"
                                                        {{ old('pekerjaan_id', $user->pekerjaan_id) == $pekerjaan->id ? 'selected' : '' }}>

                                                        {{ $pekerjaan->nama_pekerjaan }}

                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>


                                    </div>

                                    <div class="d-flex gap-2 mt-3">

                                        <button type="submit" id="btnEdit" class="btn btn-danger">

                                            <i class="bi bi-pencil-square me-2"></i>
                                            Edit Profil

                                        </button>

                                        <a href="{{ route('dashboard_pasien') }}" class="btn btn-outline-secondary">

                                            <i class="bi bi-arrow-left-circle me-2"></i>
                                            Kembali

                                        </a>

                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- INFORMASI AKUN -->
                <div class="card border-0 shadow rounded-4 mt-4">

                    <div class="card-header bg-danger text-white py-3">
                        <h5 class="mb-0 text-white">
                            <i class="bi bi-shield-check me-2"></i>
                            Informasi Akun
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label class="fw-bold">
                                    Tanggal Registrasi
                                </label>
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                @endphp
                                <input type="text" class="form-control"
                                    value="{{ $user->created_at->translatedFormat('d F Y') }}" readonly>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="fw-bold">
                                    Terakhir Diperbarui
                                </label>
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                @endphp
                                <input type="text" class="form-control"
                                    value="{{ $user->updated_at->translatedFormat('d F Y') }}" readonly>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="fw-bold">
                                    Status Akun
                                </label>

                                <input type="text" class="form-control text-success fw-bold" value="Aktif" readonly>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
