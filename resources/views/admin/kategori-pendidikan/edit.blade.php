@extends('layouts.admin')

@section('title', 'Edit Kategori Pendidikan')

@section('content')

    <div class="page-heading">
        <h3>Edit Pendidikan</h3>
    </div>

    <div class="page-content">


        <section class="section">

            <div class="card">

                <div class="card-header">
                    <h5>Form Edit Pendidikan</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('pendidikan.update', $pendidikan->id) }}" method="POST"
                        enctype="multipart/form-data" novalidate>

                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_pendidikan" class="form-label">
                                Nama Pendidikan
                            </label>
                            <input type="text" name="nama_pendidikan" id="nama_pendidikan"
                                value="{{ old('nama_pendidikan', $pendidikan->nama_pendidikan) }}"
                                class="form-control @error('nama_pendidikan') is-invalid @enderror"
                                placeholder="Masukkan nama pendidikan" required>
                            @error('nama_pendidikan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">
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
