@extends('layouts.user')

@section('content')
<main id="main">
    <!-- Notifications Section -->
    @if(session('success'))
    <div class="notification-section">
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

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

    <!-- Book Details Section -->
    <section class="book-details section">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="book-image">
                        <img src="{{ asset($book->gambar ?? 'assets/img/book-placeholder.jpg') }}" 
                             class="img-fluid rounded" 
                             alt="{{ $book->judul_pustaka }}"
                             style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="book-info">
                        <h2 class="book-title">{{ $book->judul_pustaka }}</h2>
                        
                        <div class="book-meta my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong><i class="bi bi-person"></i> Pengarang:</strong> 
                                        {{ $book->pengarang->nama_pengarang }}
                                    </p>
                                    <p><strong><i class="bi bi-building"></i> Penerbit:</strong> 
                                        {{ $book->penerbit->nama_penerbit }}
                                    </p>
                                    <p><strong><i class="bi bi-calendar"></i> Tahun Terbit:</strong> 
                                        {{ $book->tahun_terbit }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong><i class="bi bi-upc"></i> ISBN:</strong> 
                                        {{ $book->isbn ?? 'Tidak tersedia' }}
                                    </p>
                                    <p><strong><i class="bi bi-tags"></i> Kategori:</strong> 
                                        {{ $book->ddc->ddc }}
                                    </p>
                                    <p><strong><i class="bi bi-book"></i> Format:</strong> 
                                        {{ $book->format->format }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if($book->abstraksi)
                        <div class="book-description mb-4">
                            <h4>Deskripsi</h4>
                            <p>{{ $book->abstraksi }}</p>
                        </div>
                        @endif

                        @if($book->keyword)
                        <div class="book-keywords mb-4">
                            <h4>Kata Kunci</h4>
                            <div class="keywords">
                                @foreach(explode(',', $book->keyword) as $keyword)
                                    <span class="badge bg-secondary me-1">{{ trim($keyword) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class="book-availability">
                            <div class="alert {{ $book->fp == 1 ? 'alert-success' : 'alert-warning' }}">
                                <i class="bi {{ $book->fp == 1 ? 'bi-check-circle' : 'bi-exclamation-circle' }}"></i>
                                Status: {{ $book->fp == 1 ? 'Tersedia' : 'Tidak Tersedia' }}
                            </div>
                        </div>

                        <div class="book-actions mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            
                            @auth
                                @if($book->fp == 1)
                                    @if(auth()->user()->anggota)
                                        <a href="{{ route('books.borrow.form', $book->id_pustaka) }}" class="btn btn-primary">
                                            <i class="bi bi-book"></i> Ajukan Peminjaman
                                        </a>
                                    @else
                                        <a href="{{ route('anggota.register') }}" class="btn btn-info">
                                            <i class="bi bi-person-plus"></i> Daftar Anggota untuk Meminjam
                                        </a>
                                    @endif
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($relatedBooks->count() > 0)
    <!-- Related Books Section -->
    <section class="related-books section">
        <div class="container" data-aos="fade-up">
            <h3 class="mb-4">Buku Terkait</h3>
            
            <div class="row gy-4">
                @foreach($relatedBooks as $relatedBook)
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100">
                        <img src="{{ asset($relatedBook->gambar ?? 'assets/img/book-placeholder.jpg') }}" 
                             class="card-img-top" 
                             alt="{{ $relatedBook->judul_pustaka }}"
                             style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($relatedBook->judul_pustaka, 50) }}</h5>
                            <p class="card-text mb-0">
                                <small class="text-muted">
                                    <i class="bi bi-person"></i> {{ $relatedBook->pengarang->nama_pengarang }}
                                </small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="bi bi-building"></i> {{ $relatedBook->penerbit->nama_penerbit }}
                                </small>
                            </p>
                            <a href="{{ route('books.show', $relatedBook->id_pustaka) }}" 
                               class="btn btn-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
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

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
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
// Auto-hide notifications after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
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