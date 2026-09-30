@extends('layouts.admin')

@section('title', 'Data Kategori Spesialis')

@section('content')


    <div class="page-heading mb-3">
        <h3>Data Kategori Spesialis</h3>
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
            @if (session('successs'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('successs') }}
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
                        Daftar Kategori Spesialis
                    </h5>

                    <a href="{{ route('spesialis.create') }}" class="btn btn-primary">

                        <i class="bi bi-plus-circle"></i>
                        Tambah Dokter

                    </a>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="table-light">

                                <tr class="text-center">
                                    <th width="5%">NO</th>
                                    <th width="5%">NAMA SPESIALIS</th>
                                    <th width="5%">AKSI</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($spesialis as $spl)
                                    <tr class="text-center">

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>

                                            <strong>
                                                {{ $spl->nama_spesialis }}
                                            </strong>

                                        </td>

                                        <td>

                                            <a href="{{ route('spesialis.edit', $spl->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-id="{{ $spl->id }}"
                                                data-name="{{ $spl->nama_spesialis }}">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3" class="text-center">

                                            Belum ada data kategori spesialis.

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                        <div class="modal fade" id="deleteModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p id="deleteMessage">Apakah Anda yakin ingin menghapus layanan ini?</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>

                                        <form id="deleteForm" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const deleteModal = document.getElementById('deleteModal');

            deleteModal.addEventListener('show.bs.modal', function(event) {

                const button = event.relatedTarget;

                const id = button.getAttribute('data-id');
                const nama = button.getAttribute('data-name');

                document.getElementById('deleteMessage').innerHTML =
                    'Yakin ingin menghapus spesialis <b>' + nama + '</b>?';

                document.getElementById('deleteForm').action =
                    '/admin/spesialis/' + id;
            });

        });
    </script>

@endsection
