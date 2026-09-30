@extends('layouts.admin')

@section('title', 'Data Invoice')

@section('content')


    <div class="page-heading mb-3">
        <h3>Data Invoice Pasien</h3>
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
                        Daftar Invoice Pasien
                    </h5>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="table-light">

                                <tr class="text-center">
                                    <th width="5%">NO</th>
                                    <th>NOMOR INVOICE</th>
                                    <th>NO REGISTRASI</th>
                                    <th>NAMA PASIEN</th>
                                    <th>LAYANAN</th>
                                    <th>TANGGAL</th>
                                    <th>TOTAL TAGIHAN</th>
                                    <th>STATUS</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($invoices as $invoice)
                                    <tr class="text-center">

                                        <td>
                                            <strong>
                                                {{ $loop->iteration }}
                                            </strong>
                                        </td>

                                        <td>

                                            <strong>
                                                {{ $invoice->nomor_invoice }}
                                            </strong>

                                        </td>

                                        <td>
                                            <strong>
                                                {{ $invoice->pemeriksaan->no_registrasi }}
                                            </strong>
                                        </td>

                                        <td>
                                            <strong>
                                                {{ $invoice->pemeriksaan->user->nama }}
                                            </strong>
                                        </td>

                                        <td>
                                            <strong>
                                                {{ $invoice->pemeriksaan->layanan->nama_layanan }}
                                            </strong>
                                        </td>

                                        <td>
                                            <strong>
                                                {{ \Carbon\Carbon::parse($invoice->tanggal_invoice)->format('d-m-Y') }}
                                            </strong>
                                        </td>

                                        <td>
                                            <strong>
                                                Rp {{ number_format($invoice->total_tagihan, 0, ',', '.') }}
                                            </strong>
                                        </td>

                                        <td>
                                            <strong>
                                                @if ($invoice->status == 'Selesai')
                                                    <span class="badge bg-success">
                                                        Selesai
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning">
                                                        {{ $invoice->status }}
                                                    </span>
                                                @endif
                                            </strong>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="9" class="text-center">

                                            Belum ada data invoice pasien.

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
