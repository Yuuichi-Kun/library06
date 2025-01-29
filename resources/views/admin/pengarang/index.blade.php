@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Pengarang</h5>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPengarangModal">
                    <i class="ti ti-plus me-1"></i> Tambah Pengarang
                </button>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Lengkap</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengarangs as $index => $pengarang)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pengarang->kode_pengarang }}</td>
                            <td>
                                {{ $pengarang->gelar_depan }} 
                                {{ $pengarang->nama_pengarang }} 
                                {{ $pengarang->gelar_belakang }}
                            </td>
                            <td>{{ $pengarang->no_telp }}</td>
                            <td>{{ $pengarang->email }}</td>
                            <td>{{ $pengarang->website }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editPengarangModal{{ $pengarang->id_pengarang }}">
                                    <i class="ti ti-edit"></i>
                                </button>
                                <form action="{{ route('admin.pengarang.destroy', $pengarang->id_pengarang) }}" method="POST" class="d-inline">
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

<!-- Add Pengarang Modal -->
<div class="modal fade" id="addPengarangModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengarang Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.pengarang.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Pengarang</label>
                        <input type="text" class="form-control" name="kode_pengarang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gelar Depan</label>
                        <input type="text" class="form-control" name="gelar_depan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Pengarang</label>
                        <input type="text" class="form-control" name="nama_pengarang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gelar Belakang</label>
                        <input type="text" class="form-control" name="gelar_belakang">
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
                        <label class="form-label">Website</label>
                        <input type="url" class="form-control" name="website">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Biografi</label>
                        <textarea class="form-control" name="biografi" rows="3"></textarea>
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

<!-- Edit Pengarang Modals -->
@foreach($pengarangs as $pengarang)
<div class="modal fade" id="editPengarangModal{{ $pengarang->id_pengarang }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pengarang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.pengarang.update', $pengarang->id_pengarang) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Pengarang</label>
                        <input type="text" class="form-control" name="kode_pengarang" value="{{ $pengarang->kode_pengarang }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gelar Depan</label>
                        <input type="text" class="form-control" name="gelar_depan" value="{{ $pengarang->gelar_depan }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Pengarang</label>
                        <input type="text" class="form-control" name="nama_pengarang" value="{{ $pengarang->nama_pengarang }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gelar Belakang</label>
                        <input type="text" class="form-control" name="gelar_belakang" value="{{ $pengarang->gelar_belakang }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telp" value="{{ $pengarang->no_telp }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $pengarang->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="url" class="form-control" name="website" value="{{ $pengarang->website }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Biografi</label>
                        <textarea class="form-control" name="biografi" rows="3">{{ $pengarang->biografi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{ $pengarang->keterangan }}">
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