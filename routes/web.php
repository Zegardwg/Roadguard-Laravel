<?php 
 
use Illuminate\Support\Facades\Route; 
 
use App\Http\Controllers\PostController; // panggil 
 
 
Route::get('/', function () { 
    return view('welcome'); 
}); 
 
Route::post('/api/posts', [PostController::class, 
'create'])->name('posts.create'); 
// api/posts  alamat link 
    
