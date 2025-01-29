@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Jenis Anggota</h5>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJenisAnggotaModal">
                    <i class="ti ti-plus me-1"></i> Tambah Jenis Anggota
                </button>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Jenis Anggota</th>
                            <th>Maksimal Pinjam</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenisAnggota as $index => $ja)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ja->kode_jenis_anggota }}</td>
                            <td>{{ $ja->jenis_anggota }}</td>
                            <td>{{ $ja->max_pinjam }}</td>
                            <td>{{ $ja->keterangan }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editJenisAnggotaModal{{ $ja->id_jenis_anggota }}">
                                    <i class="ti ti-edit"></i>
                                </button>
                                <form action="{{ route('admin.jenis-anggota.destroy', $ja->id_jenis_anggota) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addJenisAnggotaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.jenis-anggota.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Jenis Anggota</label>
                        <input type="text" class="form-control" name="kode_jenis_anggota" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Anggota</label>
                        <input type="text" class="form-control" name="jenis_anggota" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Maksimal Pinjam</label>
                        <input type="number" class="form-control" name="max_pinjam" required min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modals -->
@foreach($jenisAnggota as $ja)
<div class="modal fade" id="editJenisAnggotaModal{{ $ja->id_jenis_anggota }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jenis Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.jenis-anggota.update', $ja->id_jenis_anggota) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Jenis Anggota</label>
                        <input type="text" class="form-control" name="kode_jenis_anggota" value="{{ $ja->kode_jenis_anggota }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Anggota</label>
                        <input type="text" class="form-control" name="jenis_anggota" value="{{ $ja->jenis_anggota }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Maksimal Pinjam</label>
                        <input type="number" class="form-control" name="max_pinjam" value="{{ $ja->max_pinjam }}" required min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{ $ja->keterangan }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection 