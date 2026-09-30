@extends('layouts.admin')

@section('title', 'Tambah Kategori Pekerjaan')

@section('content')

    <div class="page-heading">
        <h3>Tambah Pekerjaan</h3>
    </div>

    <div class="page-content">


        <section class="section">

            <div class="card">

                <div class="card-header">
                    <h5>Form Tambah Pekerjaan</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('pekerjaan.store') }}" method="POST" enctype="multipart/form-data" novalidate>

                        @csrf

                        <div class="mb-3">
                            <label for="nama_pekerjaan" class="form-label">
                                Nama Pekerjaan
                            </label>
                            <input type="text" name="nama_pekerjaan" id="nama_pekerjaan"
                                value="{{ old('nama_pekerjaan') }}"
                                class="form-control @error('nama_pekerjaan') is-invalid @enderror"
                                placeholder="Masukkan nama pekerjaan" required>
                            @error('nama_pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <a href="{{ route('pekerjaan.index') }}" class="btn btn-secondary">
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
