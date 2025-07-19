<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\LandscapingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('welcome');  

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return Inertia::render('home');
    })->name('home');  
});

// If 'counter.blade.php' is a blade view file in resources/views
Route::get('/counter', function () {
    return view('counter');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/loginForm', function () {
    return view('loginForm');
});

// Home route
Route::get('/', function () {
    return view('welcome'); // Or your home view
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

// Or if you want to render counter with Inertia (JS component)
// Route::get('/counter', function () {
//     return Inertia::render('Counter');
// });

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';




require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
