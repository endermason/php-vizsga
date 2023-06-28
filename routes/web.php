<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index']);
Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']);
Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']);
Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store']);
Route::get('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']);
Route::put('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']);
Route::delete('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']);
Route::get('/comment/create/{id}', [\App\Http\Controllers\CommentController::class, 'create']);
Route::post('/comment/create/{id}', [\App\Http\Controllers\CommentController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
