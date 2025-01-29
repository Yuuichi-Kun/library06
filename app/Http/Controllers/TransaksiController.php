<?php

namespace App\Http\Controllers;

use App\Models\TglTransaksi;
use App\Models\Pustaka;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    public function index(): View
    {
        $transactions = TglTransaksi::with(['anggota.user', 'pustaka'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.transaksi.index', compact('transactions'));
    }

    public function approve($id): RedirectResponse
    {
        $transaction = TglTransaksi::findOrFail($id);
        
        // Cek status buku
        $book = Pustaka::findOrFail($transaction->id_pustaka);
        if ($book->fp != 1) {
            return back()->with('error', 'Buku tidak tersedia untuk dipinjam.');
        }
        
        // Update status transaksi
        $transaction->fp = '1';
        $transaction->save();
        
        // Update status buku menjadi tidak tersedia
        $book->fp = '0';
        $book->save();
        
        return back()->with('success', 'Peminjaman berhasil disetujui.');
    }
    
    public function reject($id): RedirectResponse
    {
        $transaction = TglTransaksi::findOrFail($id);
        $transaction->delete();
        
        return back()->with('success', 'Peminjaman ditolak.');
    }
    
    public function return($id): RedirectResponse
    {
        $transaction = TglTransaksi::findOrFail($id);
        
        // Update tanggal pengembalian
        $transaction->tgl_pengembalian = now();
        $transaction->save();
        
        // Update status buku menjadi tersedia
        $book = Pustaka::findOrFail($transaction->id_pustaka);
        $book->fp = '1';
        $book->save();
        
        return back()->with('success', 'Buku berhasil dikembalikan.');
    }
} 