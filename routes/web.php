<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\DdcController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\JenisAnggotaController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PustakaController;
use App\Http\Controllers\AnggotaRegistrationController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/books/{id}', [HomeController::class, 'show'])->name('books.show');
    
    // User Profile Routes
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profileUser.edit');
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profileUser.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profileUser.destroy');
    Route::post('/profile/avatar', [UserProfileController::class, 'store'])->name('profileUser.avatar.store');

    Route::get('/books/{id}/borrow', [HomeController::class, 'showBorrowForm'])->name('books.borrow.form');
    Route::post('/books/{id}/borrow', [HomeController::class, 'borrowRequest'])->name('books.borrow.request');

    Route::get('/borrowing/history', [HomeController::class, 'borrowingHistory'])
        ->name('user.borrowing.history');
    Route::delete('/borrowing/{id}/cancel', [HomeController::class, 'cancelBorrowing'])
        ->name('user.borrowing.cancel');

    // User Borrowing Routes
    Route::post('/user/borrowing/{id}/return', [HomeController::class, 'returnBorrowing'])
        ->name('user.borrowing.return')
        ->middleware(['auth']);

    // Password Reset Routes - Fix the duplicate and conflicting route
    Route::put('/profile/password', [App\Http\Controllers\Auth\UserPasswordController::class, 'update'])
    ->name('password.update');

    // User Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [UserProfileController::class, 'edit'])->name('profileUser.edit');
        Route::patch('/', [UserProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [UserProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/', [UserProfileController::class, 'store'])->name('user.profile.store');
    });
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    
    // Rak Routes
    Route::resource('admin/rak', RakController::class, ['as' => 'admin']);
    
    // DDC Routes
    Route::resource('admin/ddc', DdcController::class, ['as' => 'admin']);
    
    // Format Routes
    Route::resource('admin/format', FormatController::class, ['as' => 'admin']);
    
    // Penerbit Routes
    Route::resource('admin/penerbit', PenerbitController::class, ['as' => 'admin']);
    
    // Pengarang Routes
    Route::resource('admin/pengarang', PengarangController::class, ['as' => 'admin']);
    
    // Jenis Anggota Routes
    Route::resource('admin/jenis-anggota', JenisAnggotaController::class, ['as' => 'admin']);
    
    // Perpustakaan Routes
    Route::get('admin/perpustakaan', [PerpustakaanController::class, 'index'])->name('admin.perpustakaan.index');
    Route::put('admin/perpustakaan', [PerpustakaanController::class, 'update'])->name('admin.perpustakaan.update');
    
    // Pustaka Routes
    Route::resource('admin/pustaka', PustakaController::class, ['as' => 'admin']);
    
    // Transaksi Routes
    Route::get('admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
    Route::post('admin/transaksi/{id}/approve', [TransaksiController::class, 'approve'])->name('admin.transaksi.approve');
    Route::post('admin/transaksi/{id}/reject', [TransaksiController::class, 'reject'])->name('admin.transaksi.reject');
    Route::post('admin/transaksi/{id}/return', [TransaksiController::class, 'return'])->name('admin.transaksi.return');

    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/admin/profile', [ProfileController::class, 'store'])->name('admin.profile.store');

    // Password Reset Routes
    Route::put('admin/password', [App\Http\Controllers\Auth\AdminPasswordController::class, 'update'])
        ->name('admin.password.update');
});

Route::get('/register/anggota', [AnggotaRegistrationController::class, 'create'])->name('anggota.register');
Route::post('/register/anggota', [AnggotaRegistrationController::class, 'store'])->name('anggota.store');
