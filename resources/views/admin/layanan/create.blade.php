@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')

    <div class="page-heading">
        <h3>Tambah Layanan</h3>
    </div>

    <div class="page-content">


        <section class="section">

            <div class="card">

                <div class="card-header">
                    <h5>Form Tambah Layanan</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data" novalidate>

                        @csrf

                        <div class="mb-3">
                            <label for="nama_layanan" class="form-label">
                                Nama Layanan
                            </label>
                            <input type="text" name="nama_layanan" id="nama_layanan" value="{{ old('nama_layanan') }}"
                                class="form-control @error('nama_layanan') is-invalid @enderror"
                                placeholder="Masukkan nama layanan" required>
                            @error('nama_layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">
                                Deskripsi Singkat Layanan
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan deskripsi singkat layanan">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">
                                Harga Layanan
                            </label>
                            <input type="number" name="harga" id="harga"
                                class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}"
                                placeholder="Masukkan harga layanan" required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">
                                Gambar Layanan
                            </label>
                            <input type="file" name="gambar" id="file-upload"
                                class="form-control @error('gambar') is-invalid @enderror"
                                value="{{ old('gambar') }}"accept="image/*" onchange="previewImage(event);">
                            <img class="mt-2" id="preview-selected-image" width="130px">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_singkat" class="form-label">
                                Deskripsi Detail Layanan
                            </label>
                            <textarea name="deskripsi_singkat" id="deskripsi_singkat" rows="3"
                                class="form-control @error('deskripsi_singkat') is-invalid @enderror"
                                placeholder="Masukkan deskripsi detail layanan">{{ old('deskripsi_singkat') }}</textarea>
                            @error('deskripsi_singkat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_lengkap" class="form-label">
                                Deskripsi Lengkap Layanan
                            </label>
                            <textarea name="deskripsi_lengkap" id="task-textarea" id="deskripsi_lengkap" rows="8"
                                class="form-control @error('deskripsi_singkat') is-invalid @enderror"
                                placeholder="Masukkan deskripsi lengkap layanan">{{ old('deskripsi_lengkap') }}</textarea>
                            @error('deskripsi_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Layanan</label>

                            <select name="status" id="status" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                        </div>

                        <a href="{{ route('layanan.index') }}" class="btn btn-secondary">
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
