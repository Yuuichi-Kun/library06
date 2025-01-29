@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Daftar Transaksi</h5>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Anggota</th>
                                    <th>Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id_transaksi }}</td>
                                        <td>{{ $transaction->anggota->user->name }}</td>
                                        <td>{{ $transaction->pustaka->judul_pustaka }}</td>
                                        <td>{{ $transaction->tgl_pinjam->format('d/m/Y') }}</td>
                                        <td>{{ $transaction->tgl_kembali->format('d/m/Y') }}</td>
                                        <td>
                                            @if($transaction->fp == '0')
                                                <span class="badge bg-warning">Menunggu Persetujuan</span>
                                            @elseif($transaction->fp == '1' && !$transaction->tgl_pengembalian)
                                                <span class="badge bg-info">Dipinjam</span>
                                            @elseif($transaction->tgl_pengembalian)
                                                <span class="badge bg-success">Dikembalikan</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($transaction->fp == '0')
                                                <form action="{{ route('admin.transaksi.approve', $transaction->id_transaksi) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="bi bi-check-lg"></i> Setujui
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.transaksi.reject', $transaction->id_transaksi) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-x-lg"></i> Tolak
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 