@extends('layouts.admin')

@section('title', 'Edit Kategori Agama')

@section('content')

    <div class="page-heading">
        <h3>Edit Agama</h3>
    </div>

    <div class="page-content">


        <section class="section">

            <div class="card">

                <div class="card-header">
                    <h5>Form Edit Agama</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('agama.update', $agama->id) }}" method="POST" enctype="multipart/form-data"
                        novalidate>

                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_agama" class="form-label">
                                Nama Agama
                            </label>
                            <input type="text" name="nama_agama" id="nama_agama"
                                value="{{ old('nama_agama', $agama->nama_agama) }}"
                                class="form-control @error('nama_agama') is-invalid @enderror"
                                placeholder="Masukkan nama agama" required>
                            @error('nama_agama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <a href="{{ route('agama.index') }}" class="btn btn-secondary">
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
