@extends('layouts.admin')

@section('title', 'Edit Dokter')

@section('content')

    <div class="page-heading">
        <h3>Edit Dokter</h3>
    </div>

    <div class="page-content">


        <section class="section">

            <div class="card">

                <div class="card-header">
                    <h5>Form Edit Dokter</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST" enctype="multipart/form-data"
                        novalidate>

                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">
                                Nama Dokter
                            </label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $dokter->nama) }}"
                                class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama dokter"
                                required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">
                                Deskripsi Dokter
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan deskripsi dokter">{{ old('deskripsi', $dokter->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="spesialis" class="form-label">
                                Spesialisasi Dokter
                            </label>
                            <select name="spesialis_id" id="spesialis_id"
                                class="form-control @error('spesialis_id') is-invalid @enderror">
                                <option selected disabled>-- Pilih Kategori Spesialis --</option>
                                @foreach ($spesialis as $spl)
                                    <option value="{{ $spl->id }}"
                                        {{ old('spesialis_id', $dokter->spesialis_id) == $spl->id ? 'selected' : '' }}>
                                        {{ $spl->nama_spesialis }}
                                    </option>
                                @endforeach
                            </select>
                            @error('spesialis')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pengalaman" class="form-label">
                                Pengalaman Dokter
                            </label>
                            <input type="number" name="pengalaman" id="pengalaman"
                                class="form-control @error('pengalaman') is-invalid @enderror"
                                value="{{ old('pengalaman', $dokter->pengalaman) }}"
                                placeholder="Masukkan pengalaman dokter" required>
                            @error('pengalaman')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">
                                Foto Dokter
                            </label>
                            <input type="file" name="foto" id="file-upload"
                                class="form-control @error('foto') is-invalid @enderror"
                                value="{{ old('foto', $dokter->foto) }}"accept="image/*" onchange="previewImage(event);">
                            @if ($dokter->foto)
                                <div class="mt-2">
                                    <img id="preview-selected-image"
                                        src="{{ $dokter->foto ? asset('uploads/dokters/' . $dokter->foto) : '#' }}"
                                        alt="Preview
                                        Gambar"
                                        style="max-height: 130px; display: {{ $dokter->foto ? 'block' : 'none' }};">
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                        </div>

                        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
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
