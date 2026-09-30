@extends('layouts.admin')

@section('title', 'Lihat Data Pasien')

@section('content')

    <div class="page-heading">
        <h3>Lihat Data Pasien</h3>
    </div>

    <div class="page-content">


        <section class="section">

            <div class="card">

                <div class="card-header">
                    <h5>Form Lihat Data Pasien</h5>
                </div>

                <div class="card-body">

                    <form action="#" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="nik" class="fw-bold">
                                Nomor KTP (NIK)
                            </label>
                            <input type="text" name="nik" id="nik"
                                class="form-control @error('nik') is-invalid @enderror"
                                value="{{ old('nik', $users->nik) }}" required readonly>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="fw-bold">
                                Nama Lengkap
                            </label>
                            <input type="text" name="nama" id="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $users->nama) }}" required readonly>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="fw-bold">
                                Email
                            </label>
                            <input type="text" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $users->email) }}" required readonly>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="fw-bold">
                                No Handphone
                            </label>
                            <input type="text" name="no_hp" id="no_hp"
                                class="form-control @error('no_hp') is-invalid @enderror"
                                value="{{ old('no_hp', $users->no_hp) }}" required readonly>
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="fw-bold">
                                Tempat Lahir
                            </label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                value="{{ old('tempat_lahir', $users->tempat_lahir) }}" required readonly>
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="fw-bold">
                                Tanggal Lahir
                            </label>
                            @php
                                \Carbon\Carbon::setLocale('id');
                            @endphp
                            <input type="text" name="tanggal_lahir" id="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                value="{{ old('tanggal_lahir', $users->tanggal_lahir) }}" required readonly>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="fw-bold">
                                Jenis Kelamin
                            </label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                value="{{ old('jenis_kelamin', $users->jenis_kelamin) }}" disabled>
                                <option value="Laki-Laki"
                                    {{ old('jenis_kelamin', $users->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $users->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="fw-bold">
                                Status
                            </label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                                value="{{ old('status', $users->status) }}" disabled>
                                <option value="Belum Menikah"
                                    {{ old('status', $users->status) == 'Belum Menikah' ? 'selected' : '' }}>
                                    Belum Menikah
                                </option>
                                <option value="Menikah"{{ old('status', $users->status) == 'Menikah' ? 'selected' : '' }}>
                                    Menikah
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="agama_id" class="fw-bold">
                                Agama
                            </label>
                            <select name="agama_id" id="agama_id"
                                class="form-control @error('agama_id') is-invalid @enderror"
                                value="{{ old('agama_id', $users->agama_id) }}" disabled>
                                @foreach ($agamas as $agama)
                                    <option value="{{ $agama->id }}"
                                        {{ old('agama_id', $users->agama_id) == $agama->id ? 'selected' : '' }}>
                                        {{ $agama->nama_agama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('agama_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan" class="fw-bold">
                                Pendidikan
                            </label>
                            <select name="pendidikan_id" id="pendidikan_id"
                                class="form-control @error('pendidikan_id') is-invalid @enderror"
                                value="{{ old('pendidikan', $users->pendidikan) }}" disabled>
                                @foreach ($pendidikans as $pendidikan)
                                    <option value="{{ $pendidikan->id }}"
                                        {{ old('pendidikan_id', $users->pendidikan_id) == $pendidikan->id ? 'selected' : '' }}>
                                        {{ $pendidikan->nama_pendidikan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pendidikan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan" class="fw-bold">
                                Pekerjaan
                            </label>
                            <select name="pekerjaan_id" id="pekerjaan_id"
                                class="form-control @error('pekerjaan_id') is-invalid @enderror"
                                value="{{ old('pekerjaan', $users->pekerjaan) }}" disabled>
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value="{{ $pekerjaan->id }}"
                                        {{ old('pekerjaan_id', $users->pekerjaan_id) == $pekerjaan->id ? 'selected' : '' }}>
                                        {{ $pekerjaan->nama_pekerjaan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pekerjaan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                    </form>

                </div>

            </div>

        </section>


    </div>

@endsection
