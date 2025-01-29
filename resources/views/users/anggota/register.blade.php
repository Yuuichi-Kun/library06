@extends('layouts.user')

@section('content')
<main id="main">
    <section class="register-section section">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <h2 class="text-center mb-4">Pendaftaran Anggota Perpustakaan</h2>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis Keanggotaan</label>
                                        <select name="id_jenis_anggota" class="form-select" required>
                                            <option value="">Pilih Jenis Anggota</option>
                                            @foreach($jenisAnggota as $ja)
                                                <option value="{{ $ja->id_jenis_anggota }}">
                                                    {{ $ja->jenis_anggota }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_anggota" 
                                               value="{{ old('nama_anggota') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat" 
                                               value="{{ old('tempat') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" 
                                               value="{{ old('tgl_lahir') }}" required>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" 
                                               value="{{ old('alamat') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. Telepon</label>
                                        <input type="text" class="form-control" name="no_telp" 
                                               value="{{ old('no_telp') }}" required>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Foto</label>
                                        <input type="file" class="form-control" name="foto" accept="image/*">
                                        <small class="text-muted">Format: JPG, JPEG, PNG (max. 2MB)</small>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" 
                                               value="{{ old('username') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection 