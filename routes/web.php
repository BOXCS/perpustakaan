<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SimpleViewController;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/hello', [SimpleViewController::class, 'hello']);
Route::get('/user/{id}', [SimpleViewController::class, 'showUserById']);
Route::get('/user/{name?}', [SimpleViewController::class, 'showUserByName']);
Route::get('/dashboard', [SimpleViewController::class, 'dashboard'])->name('dashboard');

// Route::get('/hello', function () {
//     return "Hello, World";
// });

// Route::get('/user/{id}', function ($id) {
//     return "User ID: " . $id;
// });

// Route::get('/user/{name?}', function ($name = 'Guest') {
//     return "Hello, " . $name;
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// $url = route('dashboard');

// Add your other routes here
