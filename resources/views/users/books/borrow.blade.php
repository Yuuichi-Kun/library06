@extends('layouts.user')

@section('content')
<main id="main">
    <!-- Notifications Section -->
    @if(session('error'))
    <div class="notification-section">
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <section class="borrow-section section">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <h2 class="text-center mb-4">Form Pengajuan Peminjaman</h2>

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="book-info mb-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset($book->gambar ?? 'assets/img/book-placeholder.jpg') }}" 
                                             class="img-fluid rounded" 
                                             alt="{{ $book->judul_pustaka }}">
                                    </div>
                                    <div class="col-md-8">
                                        <h4>{{ $book->judul_pustaka }}</h4>
                                        <p class="mb-1"><strong>Pengarang:</strong> {{ $book->pengarang->nama_pengarang }}</p>
                                        <p class="mb-1"><strong>Penerbit:</strong> {{ $book->penerbit->nama_penerbit }}</p>
                                        <p><strong>ISBN:</strong> {{ $book->isbn ?? 'Tidak tersedia' }}</p>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('books.borrow.request', $book->id_pustaka) }}" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                                    <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" 
                                           id="tgl_pinjam" name="tgl_pinjam" 
                                           min="{{ date('Y-m-d') }}"
                                           value="{{ old('tgl_pinjam', date('Y-m-d')) }}" 
                                           required>
                                    @error('tgl_pinjam')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Pilih tanggal peminjaman (minimal hari ini)</small>
                                </div>

                                <div class="mb-3">
                                    <label for="durasi" class="form-label">Durasi Peminjaman</label>
                                    <select class="form-select @error('durasi') is-invalid @enderror" 
                                            id="durasi" name="durasi" required>
                                        <option value="7">7 Hari</option>
                                        <option value="14">14 Hari</option>
                                    </select>
                                    @error('durasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                                    <input type="date" class="form-control" 
                                           id="tgl_kembali" 
                                           readonly>
                                    <small class="text-muted">Tanggal pengembalian akan dihitung otomatis</small>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="{{ route('books.show', $book->id_pustaka) }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-book"></i> Ajukan Peminjaman
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('styles')
<style>
.notification-section {
    padding: 1rem 0;
    position: relative;
    z-index: 1000;
}

.alert {
    margin-bottom: 0;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}

.alert .bi {
    font-size: 1.1em;
    vertical-align: -2px;
}

.alert-dismissible .btn-close {
    padding: 1.25rem;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tglPinjamInput = document.getElementById('tgl_pinjam');
    const durasiSelect = document.getElementById('durasi');
    const tglKembaliInput = document.getElementById('tgl_kembali');

    function updateTglKembali() {
        const tglPinjam = new Date(tglPinjamInput.value);
        const durasi = parseInt(durasiSelect.value);
        
        if (tglPinjam && durasi) {
            const tglKembali = new Date(tglPinjam);
            tglKembali.setDate(tglKembali.getDate() + durasi);
            
            // Format tanggal ke YYYY-MM-DD
            const formattedDate = tglKembali.toISOString().split('T')[0];
            tglKembaliInput.value = formattedDate;
        }
    }

    tglPinjamInput.addEventListener('change', updateTglKembali);
    durasiSelect.addEventListener('change', updateTglKembali);

    // Initialize tanggal kembali
    updateTglKembali();

    // Auto-hide notifications after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            const closeButton = alert.querySelector('.btn-close');
            if (closeButton) {
                closeButton.click();
            }
        });
    }, 5000);
});
</script>
@endpush
@endsection 