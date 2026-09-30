@extends('layouts.admin')

@section('title', 'Edit Kategori Agama')

@section('content')

    <div class="page-heading">
        <h3>Edit Jadwal Layanan</h3>
    </div>

    <div class="page-content">


        <section class="section">

            <div class="card">

                <div class="card-header">
                    <h5>Form Edit Jadwal Layanan</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('jadwal-layanan.update', $jadwal_layanan->id) }}" method="POST"
                        enctype="multipart/form-data" novalidate>

                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_layanan" class="form-label">
                                Layanan
                            </label>
                            <select name="layanan_id" id="layanan_id" class="form-control">
                                <option selected disabled>-- Pilih Layanan Layanan --</option>
                                @foreach ($layanans as $layanan)
                                    <option
                                        value="{{ $layanan->id }}"{{ old('layanan_id', $jadwal_layanan->layanan_id) == $layanan->id ? 'selected' : '' }}>
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
                                <option value="Senin"{{ old('hari', $jadwal_layanan->hari) == 'Senin' ? 'selected' : '' }}>
                                    Senin</option>
                                <option
                                    value="Selasa"{{ old('hari', $jadwal_layanan->hari) == 'Selasa' ? 'selected' : '' }}>
                                    Selasa</option>
                                <option value="Rabu"{{ old('hari', $jadwal_layanan->hari) == 'Rabu' ? 'selected' : '' }}>
                                    Rabu</option>
                                <option value="Kamis"{{ old('hari', $jadwal_layanan->hari) == 'Kamis' ? 'selected' : '' }}>
                                    Kamis</option>
                                <option value="Jumat"{{ old('hari', $jadwal_layanan->hari) == 'Jumat' ? 'selected' : '' }}>
                                    Jumat</option>
                                <option
                                    value="Sabtu"{{ old('hari', $jadwal_layanan->hari) == 'Sabtu' ? 'selected' : '' }}>
                                    Sabtu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="sesi" class="form-label">
                                Sesi
                            </label>

                            <select name="sesi" id="sesi" class="form-control">

                                <option value="">
                                    -- Pilih Kategori Sesi --
                                </option>

                                <option value="Pagi"
                                    {{ old('sesi', $jadwal_layanan->sesi) == 'Pagi' ? 'selected' : '' }}>
                                    Pagi (07:00 - 11:00)
                                </option>

                                <option value="Siang"
                                    {{ old('sesi', $jadwal_layanan->sesi) == 'Siang' ? 'selected' : '' }}>
                                    Siang (11:00 - 15:00)
                                </option>

                                <option value="Sore"
                                    {{ old('sesi', $jadwal_layanan->sesi) == 'Sore' ? 'selected' : '' }}>
                                    Sore (15:00 - 18:00)
                                </option>

                                <option value="Malam"
                                    {{ old('sesi', $jadwal_layanan->sesi) == 'Malam' ? 'selected' : '' }}>
                                    Malam (18:00 - 20:00)
                                </option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kuota" class="form-label">Kuota</label>
                            <input type="number" name="kuota" id="kuota"
                                value="{{ old('kuota', $jadwal_layanan->kuota) }}" class="form-control">
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
