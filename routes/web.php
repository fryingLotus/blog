<?php
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

use Illuminate\Support\Facades\Route;
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
Route::post('newsletter', NewsletterController::class);
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::delete('posts/{post:slug}/comments/{comment}', [PostCommentsController::class, 'destroy'])->name('comments.destroy');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');
Route::get('profile/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::put('profile/update/{user}', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');
// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
    Route::delete('admin/posts/{post:slug}/comments/{comment}', [PostCommentsController::class, 'destroy']);
});