<?php 
 
use Illuminate\Support\Facades\Route; 
 
use App\Http\Controllers\PostController; // panggil 
use App\Http\Controllers\PenggunaController; // panggil 
use App\Http\Controllers\AdminController; // panggil 
use App\Http\Controllers\SuperadminController; // panggil 
use App\Http\Controllers\PemantauController; // panggil 
 
 
Route::get('/', function () { 
    return view('welcome'); 
}); 
 
Route::post('/api/posts', [PostController::class, 'create'])->name('posts.create'); 
Route::post('/api/pengguna', [PenggunaController::class, 'create'])->name('posts.create'); 
Route::post('/api/admin', [AdminController::class, 'create'])->name('posts.create'); 
Route::post('/api/superadmin', [SuperadminController::class, 'create'])->name('posts.create'); 
Route::post('/api/pemantau', [PemantauController::class, 'create'])->name('posts.create'); 
// api/posts  alamat link 
    
// Route untuk mendapatkan semua post 
Route::get('/api/posts', [PostController::class, 'index'])->name('posts.index'); 
Route::get('/api/admin', [PostController::class, 'index'])->name('posts.index'); 
Route::get('/api/superadmin', [PostController::class, 'index'])->name('posts.index'); 
Route::get('/api/pemantau', [PostController::class, 'index'])->name('posts.index'); 
 
// Route untuk mendapatkan satu post berdasarkan ID 
Route::get('/api/posts/{id}', [PostController::class, 'show'])->name('posts.show'); 
Route::get('/api/admin/{id}', [PostController::class, 'show'])->name('posts.show'); 
Route::get('/api/superadmin/{id}', [PostController::class, 'show'])->name('posts.show'); 
Route::get('/api/pemantau/{id}', [PostController::class, 'show'])->name('posts.show'); 

// Route untuk update post berdasarkan ID 
Route::put('/api/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::put('/api/admin/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::put('/api/superadmin/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::put('/api/pemantau/update/{id}', [PostController::class, 'update'])->name('posts.update');

// Route untuk delete post berdasarkan ID 
Route::delete('/api/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
Route::delete('/api/admin/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
Route::delete('/api/superadmin/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
Route::delete('/api/pemantau/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');