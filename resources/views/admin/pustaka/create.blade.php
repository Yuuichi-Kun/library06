@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Pustaka</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.pustaka.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul_pustaka" class="form-label">Judul Pustaka</label>
                            <input type="text" class="form-control @error('judul_pustaka') is-invalid @enderror" id="judul_pustaka" name="judul_pustaka" value="{{ old('judul_pustaka') }}">
                            @error('judul_pustaka')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" value="{{ old('isbn') }}">
                            @error('isbn')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_pengarang" class="form-label">Pengarang</label>
                                    <select class="form-select @error('id_pengarang') is-invalid @enderror" id="id_pengarang" name="id_pengarang">
                                        <option value="">Pilih Pengarang</option>
                                        @foreach($pengarangs as $pengarang)
                                        <option value="{{ $pengarang->id_pengarang }}" {{ old('id_pengarang') == $pengarang->id_pengarang ? 'selected' : '' }}>
                                            {{ $pengarang->nama_pengarang }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_pengarang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_penerbit" class="form-label">Penerbit</label>
                                    <select class="form-select @error('id_penerbit') is-invalid @enderror" id="id_penerbit" name="id_penerbit">
                                        <option value="">Pilih Penerbit</option>
                                        @foreach($penerbits as $penerbit)
                                        <option value="{{ $penerbit->id_penerbit }}" {{ old('id_penerbit') == $penerbit->id_penerbit ? 'selected' : '' }}>
                                            {{ $penerbit->nama_penerbit }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_penerbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_ddc" class="form-label">DDC</label>
                                    <select class="form-select @error('id_ddc') is-invalid @enderror" id="id_ddc" name="id_ddc">
                                        <option value="">Pilih DDC</option>
                                        @foreach($ddcs as $ddc)
                                        <option value="{{ $ddc->id_ddc }}" {{ old('id_ddc') == $ddc->id_ddc ? 'selected' : '' }}>
                                            {{ $ddc->ddc }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('id_ddc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_format" class="form-label">Format</label>
                                    <select class="form-select @error('id_format') is-invalid @enderror" id="id_format" name="id_format">
                                        <option value="">Pilih Format</option>
                                        @foreach($formats as $format)
                                        <option value="{{ $format->id_format }}" {{ old('id_format') == $format->id_format ? 'selected' : '' }}>
                                            {{ $format->format }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('id_format')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                    <input type="text" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
                                    @error('tahun_terbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="keyword" class="form-label">Keyword</label>
                                    <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" value="{{ old('keyword') }}">
                                    @error('keyword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="abstraksi" class="form-label">Abstraksi</label>
                            <textarea class="form-control @error('abstraksi') is-invalid @enderror" id="abstraksi" name="abstraksi" rows="3">{{ old('abstraksi') }}</textarea>
                            @error('abstraksi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="harga_buku" class="form-label">Harga Buku</label>
                                    <input type="number" class="form-control @error('harga_buku') is-invalid @enderror" id="harga_buku" name="harga_buku" value="{{ old('harga_buku') }}">
                                    @error('harga_buku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="kondisi_buku" class="form-label">Kondisi Buku</label>
                                    <select class="form-select @error('kondisi_buku') is-invalid @enderror" id="kondisi_buku" name="kondisi_buku">
                                        <option value="">Pilih Kondisi</option>
                                        <option value="Baik" {{ old('kondisi_buku') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                        <option value="Rusak" {{ old('kondisi_buku') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                    </select>
                                    @error('kondisi_buku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="fp" class="form-label">Status</label>
                                    <select class="form-select @error('fp') is-invalid @enderror" id="fp" name="fp">
                                        <option value="1" {{ old('fp') == '1' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="0" {{ old('fp') == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
                                    </select>
                                    @error('fp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jml_pinjam" class="form-label">Jumlah Pinjam</label>
                                    <input type="number" class="form-control @error('jml_pinjam') is-invalid @enderror" id="jml_pinjam" name="jml_pinjam" value="{{ old('jml_pinjam', 0) }}">
                                    @error('jml_pinjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="denda_terlambat" class="form-label">Denda Terlambat</label>
                                    <input type="number" class="form-control @error('denda_terlambat') is-invalid @enderror" id="denda_terlambat" name="denda_terlambat" value="{{ old('denda_terlambat', 0) }}">
                                    @error('denda_terlambat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="denda_hilang" class="form-label">Denda Hilang</label>
                                    <input type="number" class="form-control @error('denda_hilang') is-invalid @enderror" id="denda_hilang" name="denda_hilang" value="{{ old('denda_hilang', 0) }}">
                                    @error('denda_hilang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.pustaka.index') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 