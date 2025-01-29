@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Profil Perpustakaan</h5>
            <form action="{{ route('admin.perpustakaan.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Perpustakaan</label>
                        <input type="text" class="form-control" name="nama_perpustakaan" value="{{ $perpustakaan->nama_perpustakaan ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Pustakawan</label>
                        <input type="text" class="form-control" name="nama_pustakawan" value="{{ $perpustakaan->nama_pustakawan ?? '' }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $perpustakaan->alamat ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $perpustakaan->email ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Website</label>
                        <input type="url" class="form-control" name="website" value="{{ $perpustakaan->website ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telp" value="{{ $perpustakaan->no_telp ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{ $perpustakaan->keterangan ?? '' }}">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-device-floppy me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 