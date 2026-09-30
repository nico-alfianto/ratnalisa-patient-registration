@extends('layouts.admin')

@section('title', 'Tambah Kategori Agama')

@section('content')

    <div class="page-heading">
        <h3>Tambah Jadwal Layanan</h3>
    </div>

    <div class="page-content">


        <section class="section">

            <div class="card">

                <div class="card-header">
                    <h5>Form Tambah Jadwal Layanan</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('jadwal-layanan.store') }}" method="POST" enctype="multipart/form-data" novalidate>

                        @csrf

                        <div class="mb-3">
                            <label for="nama_layanan" class="form-label">
                                Layanan
                            </label>
                            <select name="layanan_id" id="layanan_id" class="form-control">
                                <option selected disabled>-- Pilih Layanan Layanan --</option>
                                @foreach ($layanans as $layanan)
                                    <option value="{{ $layanan->id }}">
                                        {{ $layanan->nama_layanan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('layanan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select name="hari" id="hari" class="form-control">
                                <option selected disabled>-- Pilih Kategori Hari --</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Sesi</label>
                            <select name="sesi" id="sesi" class="form-control">
                                <option selected disabled>-- Pilih Kategori Sesi --</option>
                                <option value="Pagi">Pagi (07:00 - 11:00)</option>
                                <option value="Siang">Siang (11:00 - 15:00)</option>
                                <option value="Sore">Sore (15:00 - 18:00)</option>
                                <option value="Malam">Malam (18:00 - 20:00)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kuota" class="form-label">Kuota</label>
                            <input type="number" name="kuota" id="kuota" class="form-control">
                        </div>

                        <a href="{{ route('jadwal-layanan.index') }}" class="btn btn-secondary">
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
