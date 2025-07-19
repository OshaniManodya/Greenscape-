<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\LandscapingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;

// Welcome route (choose ONE approach - Inertia or Blade)
Route::get('/', function () {
    return Inertia::render('Welcome'); // Inertia approach
    // OR for Blade:
    // return view('welcome');
})->name('welcome');

// Home route
Route::get('/home', function () {
    return view('home');
})->name('home');

// Plant category routes
Route::get('/indoor-plants', [PlantController::class, 'indoor'])->name('plants.indoor');
Route::get('/outdoor-plants', [PlantController::class, 'outdoor'])->name('plants.outdoor');
Route::get('/herb-plants', [PlantController::class, 'herb'])->name('plants.herb');
Route::get('/flowering-plants', [PlantController::class, 'flowering'])->name('plants.flowering');

// Other page routes
Route::get('/landscaping', [LandscapingController::class, 'index'])->name('landscaping');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Authentication routes
Route::get('/login', function () {
    return view('auth.login'); // Better to put login in auth folder
})->name('login');

// Remove these duplicate or unnecessary routes:
// Route::get('/counter', function () {
//     return view('counter');
// });
// 
// Route::get('/index', function () {
//     return view('index');
// });
// 
// Route::get('/loginForm', function () {
//     return view('loginForm');
// });

// Include additional route files (ONCE)
require __DIR__.'/auth.php';
require __DIR__.'/settings.php';