@extends('layouts.admin')

@section('title', 'Tambah Spesialis')

@section('content')

    <div class="page-heading">
        <h3>Tambah Spesialis</h3>
    </div>

    <div class="page-content">


        <section class="section">

            <div class="card">

                <div class="card-header">
                    <h5>Form Tambah Spesialis</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('spesialis.store') }}" method="POST" enctype="multipart/form-data" novalidate>

                        @csrf

                        <div class="mb-3">
                            <label for="nama_spesialis" class="form-label">
                                Nama Spesialis
                            </label>
                            <input type="text" name="nama_spesialis" id="nama_spesialis"
                                value="{{ old('nama_spesialis') }}"
                                class="form-control @error('nama_spesialis') is-invalid @enderror"
                                placeholder="Masukkan nama spesialis" required>
                            @error('nama_spesialis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <a href="{{ route('spesialis.index') }}" class="btn btn-secondary">
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
