<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SimpleViewController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Route::get('/hello', [SimpleViewController::class, 'hello']);
// Route::get('/user/{id}', [SimpleViewController::class, 'showUserById']);
// Route::get('/user/{name?}', [SimpleViewController::class, 'showUserByName']);
Route::get('/dashboard', [SimpleViewController::class, 'dashboard'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [SimpleViewController::class, 'adminDashboard']);
    Route::get('/users', [SimpleViewController::class, 'adminUsers']);
});

// Route::get('/404', [SimpleViewController::class, 'notFound'])->name('404');

Route::fallback(function () {
    return "404 - Not Found";
});

Route::get('/hello', function () {
    return "Hello, World";
});

Route::get('/user/{id}', function ($id) {
    return "User ID: " . $id;
});

Route::get('/user/{name?}', function ($name = 'Guest') {
    return "Hello, " . $name;
});

Route::get('/data-form', function () {
    return view('data');
});

Route::get('/data', function () { return "GET Request"; });
Route::post('/data', function () { return "POST Request"; });
Route::put('/data', function () { return "PUT Request"; });
Route::delete('/data', function () { return "DELETE Request"; });
Route::patch('/data', function () { return "PATCH Request"; });

Route::get('/greeting', function () {
    // Simulasi user (tanpa login)
    $user = (object) ['role' => 'admin']; //  'admin' 'user'
    
    return view('greeting', [
        'name' => 'John',
        'user' => $user
    ]);
});

Route::get('/home', function () {
    $user = new class {
        public function isAdmin() { return true; } // "Admin Panel"
        public function isEditor() { return false; } // "Editor Panel"
    };

    // 'completed' atau 'pending'
    $status = 'completed';

    return view('home', compact('user', 'status'));
});

Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::post('/book', [BookController::class, 'store']);
Route::put('/book/{id}', [BookController::class, 'update']);
Route::delete('/book/{id}', [BookController::class, 'destroy']);

Route::resource('books', BookController::class);

// Route::get('/data', function () {
//     return "GET Request";
// });
// Route::post('/data', function () {
//     return "POST Request";
// });
// Route::put('/data', function () {
//     return "PUT Request";
// });
// Route::delete('/data', function () {
//     return "DELETE Request";
// });
// Route::patch('/data', function () {
//     return "PATCH Request";
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// $url = route('dashboard');

// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return "Admin Dashboard";
//     });

//     Route::get('/users', function () {
//         return "Admin Users";
//     });
// });

// Add your other routes here
