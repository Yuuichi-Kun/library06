@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Rak Baru</h1>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6">
        <form action="{{ route('admin.rak.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="kode_rak" class="block text-sm font-medium text-gray-700 mb-1">Kode Rak</label>
                <input type="text" name="kode_rak" id="kode_rak" class="form-input w-full rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="rak" class="block text-sm font-medium text-gray-700 mb-1">Nama Rak</label>
                <input type="text" name="rak" id="rak" class="form-input w-full rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" class="form-textarea w-full rounded-lg"></textarea>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.rak.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Batal</a>
                <button type="submit" class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection 