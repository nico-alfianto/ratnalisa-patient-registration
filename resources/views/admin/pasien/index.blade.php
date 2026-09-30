@extends('layouts.admin')

@section('title', 'Data Pasien')

@section('content')


    <div class="page-heading mb-3">
        <h3>Data Pasien</h3>
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
                        Daftar Pasien
                    </h5>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="table-light">

                                <tr class="text-center">
                                    <th width="5%">NO</th>
                                    <th>GAMBAR</th>
                                    <th>NAMA PASIEN</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>PEKERJAAN</th>
                                    <th width="15%">Aksi</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($users as $user)
                                    <tr class="text-center">

                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            @if ($user->foto_profil)
                                                <img src="{{ asset('uploads/profils/' . $user->foto_profil) }}"
                                                    width="80" class="rounded">
                                            @else
                                                <span class="text-muted">Tidak Ada</span>
                                            @endif
                                        </td>

                                        <td>
                                            <strong>{{ $user->nama }}</strong>
                                        </td>

                                        <td>
                                            <strong>{{ $user->jenis_kelamin }}</strong>
                                        </td>

                                        <td>
                                            <strong>{{ $user->pekerjaan->nama_pekerjaan ?? '-' }}</strong>
                                        </td>

                                        <td>
                                            <a href="{{ route('pasien.show', $user->id) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            {{-- <a href="{{ route('pasien.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a> --}}

                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-id="{{ $user->id }}"
                                                data-name="{{ $user->nama }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Belum ada data pasien.
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
                    'Yakin ingin menghapus pasien <b>' + nama + '</b>?';

                document.getElementById('deleteForm').action =
                    '/admin/pasien/' + id;
            });

        });
    </script>
@endsection
