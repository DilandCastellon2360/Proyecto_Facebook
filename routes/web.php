<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para usuarios
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Rutas para posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create/{user_id}', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Rutas para pdf
Route::get('/generate-users-pdf', [PdfController::class, 'generateUsersPdf'])->name('users.pdf');
Route::get('/generate-posts-pdf', [PdfController::class, 'generatePostsPdf'])->name('posts.pdf');
