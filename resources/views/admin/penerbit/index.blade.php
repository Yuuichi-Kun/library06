@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Penerbit</h5>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPenerbitModal">
                    <i class="ti ti-plus me-1"></i> Tambah Penerbit
                </button>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Penerbit</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penerbits as $index => $penerbit)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $penerbit->kode_penerbit }}</td>
                            <td>{{ $penerbit->nama_penerbit }}</td>
                            <td>{{ $penerbit->alamat_penerbit }}</td>
                            <td>{{ $penerbit->no_telp }}</td>
                            <td>{{ $penerbit->email }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editPenerbitModal{{ $penerbit->id_penerbit }}">
                                    <i class="ti ti-edit"></i>
                                </button>
                                <form action="{{ route('admin.penerbit.destroy', $penerbit->id_penerbit) }}" method="POST" class="d-inline">
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

<!-- Add Penerbit Modal -->
<div class="modal fade" id="addPenerbitModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penerbit Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.penerbit.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Penerbit</label>
                        <input type="text" class="form-control" name="kode_penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control" name="nama_penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat_penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telp" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fax</label>
                        <input type="text" class="form-control" name="fax">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="url" class="form-control" name="website">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kontak Person</label>
                        <input type="text" class="form-control" name="kontak">
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

<!-- Edit Penerbit Modals -->
@foreach($penerbits as $penerbit)
<div class="modal fade" id="editPenerbitModal{{ $penerbit->id_penerbit }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Penerbit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.penerbit.update', $penerbit->id_penerbit) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Penerbit</label>
                        <input type="text" class="form-control" name="kode_penerbit" value="{{ $penerbit->kode_penerbit }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control" name="nama_penerbit" value="{{ $penerbit->nama_penerbit }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat_penerbit" value="{{ $penerbit->alamat_penerbit }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telp" value="{{ $penerbit->no_telp }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $penerbit->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fax</label>
                        <input type="text" class="form-control" name="fax" value="{{ $penerbit->fax }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="url" class="form-control" name="website" value="{{ $penerbit->website }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kontak Person</label>
                        <input type="text" class="form-control" name="kontak" value="{{ $penerbit->kontak }}">
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