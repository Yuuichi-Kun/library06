@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data DDC</h5>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDdcModal">
                    <i class="ti ti-plus me-1"></i> Tambah DDC
                </button>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Rak</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Kode DDC</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama DDC</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Keterangan</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ddcs as $index => $ddc)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{ $ddc->rak->rak }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $ddc->kode_ddc }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $ddc->ddc }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $ddc->keterangan }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editDdcModal{{ $ddc->id_ddc }}">
                                    <i class="ti ti-edit"></i>
                                </button>
                                <form action="{{ route('admin.ddc.destroy', $ddc->id_ddc) }}" method="POST" class="d-inline">
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

<!-- Add DDC Modal -->
<div class="modal fade" id="addDdcModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah DDC Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.ddc.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Rak</label>
                        <select class="form-select" name="id_rak" required>
                            <option value="">Pilih Rak</option>
                            @foreach($raks as $rak)
                                <option value="{{ $rak->id_rak }}">{{ $rak->rak }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode DDC</label>
                        <input type="text" class="form-control" name="kode_ddc" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama DDC</label>
                        <input type="text" class="form-control" name="ddc" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3"></textarea>
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

<!-- Edit DDC Modals -->
@foreach($ddcs as $ddc)
<div class="modal fade" id="editDdcModal{{ $ddc->id_ddc }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit DDC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.ddc.update', $ddc->id_ddc) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Rak</label>
                        <select class="form-select" name="id_rak" required>
                            @foreach($raks as $rak)
                                <option value="{{ $rak->id_rak }}" {{ $ddc->id_rak == $rak->id_rak ? 'selected' : '' }}>
                                    {{ $rak->rak }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode DDC</label>
                        <input type="text" class="form-control" name="kode_ddc" value="{{ $ddc->kode_ddc }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama DDC</label>
                        <input type="text" class="form-control" name="ddc" value="{{ $ddc->ddc }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3">{{ $ddc->keterangan }}</textarea>
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