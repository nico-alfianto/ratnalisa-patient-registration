@extends('layouts.admin')

@section('title', 'Data Pemeriksaan Selesai')

@section('content')


    <div class="page-heading mb-3">
        <h3>Data Pemeriksaan Selesai</h3>
    </div>

    <div class="page-content">
        <section class="section">

            {{-- Alert Success --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Alert Error --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h5 class="card-title mb-0">
                        Daftar Pemeriksaan Selesai
                    </h5>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="table-light">

                                <tr class="text-center">
                                    <th width="5%">NO</th>
                                    <th>NOMOR REGISTRASI</th>
                                    <th>LAYANAN</th>
                                    <th>JADWAL PEMERIKSAAN</th>
                                    <th>STATUS</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($pemeriksaans as $pemeriksaan)
                                    <tr class="text-center">

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $pemeriksaan->no_registrasi }}
                                        </td>

                                        <td>
                                            {{ $pemeriksaan->layanan->nama_layanan }}
                                        </td>

                                        <td>

                                            {{ $pemeriksaan->jadwal->hari }}

                                            -

                                            @switch($pemeriksaan->jadwal->sesi)
                                                @case('Pagi')
                                                    07:00 - 11:00
                                                @break

                                                @case('Siang')
                                                    11:00 - 15:00
                                                @break

                                                @case('Sore')
                                                    15:00 - 18:00
                                                @break

                                                @case('Malam')
                                                    18:00 - 20:00
                                                @break
                                            @endswitch

                                        </td>

                                        <td>

                                            <span class="badge bg-success">
                                                Selesai
                                            </span>

                                        </td>

                                    </tr>

                                    @empty

                                        <tr>
                                            <td colspan="5" class="text-center">
                                                Belum ada data pemeriksaan.
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </section>
        </div>

    @endsection
