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

    <section class="borrowing-history section">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Riwayat Peminjaman</h2>
                <p>Daftar buku yang Anda pinjam</p>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Denda</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($borrowings as $index => $borrowing)
                                            <tr>
                                                <td>{{ $index + $borrowings->firstItem() }}</td>
                                                <td>
                                                    <a href="{{ route('books.show', $borrowing->pustaka->id_pustaka) }}" 
                                                       class="text-decoration-none">
                                                        {{ $borrowing->pustaka->judul_pustaka }}
                                                    </a>
                                                </td>
                                                <td>{{ $borrowing->tgl_pinjam->format('d/m/Y') }}</td>
                                                <td>{{ $borrowing->tgl_kembali->format('d/m/Y') }}</td>
                                                <td>
                                                    @if($borrowing->fp == '0')
                                                        <span class="badge bg-warning">Menunggu Persetujuan</span>
                                                    @elseif($borrowing->fp == '1' && !$borrowing->tgl_pengembalian)
                                                        <span class="badge bg-info">Sedang Dipinjam</span>
                                                    @elseif($borrowing->tgl_pengembalian)
                                                        <span class="badge bg-success">Dikembalikan pada {{ $borrowing->tgl_pengembalian->format('d/m/Y') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($borrowing->tgl_pengembalian && $borrowing->keterangan)
                                                        <span class="text-danger">{{ $borrowing->keterangan }}</span>
                                                    @elseif($borrowing->fp == '1' && !$borrowing->tgl_pengembalian)
                                                        @php
                                                            $lateFee = $borrowing->calculateLateFee();
                                                        @endphp
                                                        @if($lateFee > 0)
                                                            <span class="text-danger">Estimasi denda: Rp {{ number_format($lateFee, 0, ',', '.') }}</span>
                                                        @else
                                                            @if(Carbon\Carbon::now() > $borrowing->tgl_kembali)
                                                                <span class="text-danger">Terlambat</span>
                                                            @else
                                                                <span class="text-success">Belum ada denda</span>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($borrowing->fp == '0')
                                                        <form action="{{ route('user.borrowing.cancel', $borrowing->id_transaksi) }}" 
                                                              method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Apakah Anda yakin ingin membatalkan peminjaman ini?')">
                                                                <i class="bi bi-x-circle"></i> Batalkan
                                                            </button>
                                                        </form>
                                                    @elseif($borrowing->fp == '1' && !$borrowing->tgl_pengembalian)
                                                        <form action="{{ route('user.borrowing.return', $borrowing->id_transaksi) }}" 
                                                              method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary btn-sm"
                                                                    onclick="return confirm('Apakah Anda yakin ingin mengembalikan buku ini?')">
                                                                <i class="bi bi-arrow-return-left"></i> Kembalikan
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada riwayat peminjaman</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                {{ $borrowings->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('styles')
<style>
.borrowing-history .badge {
    font-size: 0.85em;
    padding: 0.5em 0.8em;
}

.table > :not(caption) > * > * {
    padding: 1rem;
}

.table a {
    color: var(--primary-color);
}

.table a:hover {
    color: var(--primary-color-dark);
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide notifications
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            const closeButton = alert.querySelector('.btn-close');
            if (closeButton) {
                closeButton.click();
            }
        });
    }, 5000);

    // Auto-refresh halaman setiap menit
    setInterval(function() {
        location.reload();
    }, 60000);
});
</script>
@endpush
@endsection 