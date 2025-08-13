<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\LandscapingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProjectController;


// Public Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Guest-only routes
Route::middleware('guest')->group(function () {
    // Laravel Breeze/Fortify default auth routes
    require __DIR__.'/auth.php';

    // Custom login/register if you have them
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated-only routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin/projects', fn() => view('admin.projects'))->name('admin.projects');

    // Plants
    Route::get('/plants/indoor', [PlantController::class, 'indoor'])->name('plants.indoor');
    Route::get('/plants/outdoor', [PlantController::class, 'outdoor'])->name('plants.outdoor');
    Route::get('/plants/herb', [PlantController::class, 'herb'])->name('plants.herb');
    Route::get('/plants/flowering', [PlantController::class, 'flowering'])->name('plants.flowering');

    // Other
    Route::get('/landscaping', [LandscapingController::class, 'index'])->name('landscaping');
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    
    // Your existing routes...
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/password/change', [ProfileController::class, 'changePassword'])->name('password.change');
    Route::get('/quotes/request', [QuoteController::class, 'showForm'])->name('quotes.request'); // if GET
    Route::post('/quotes/request', [QuoteController::class, 'submit'])->name('quotes.request'); // if POST

    Route::get('/appointments/book', [AppointmentController::class, 'showForm'])->name('appointments.book');
    Route::post('/appointments/book', [AppointmentController::class, 'submit'])->name('appointments.book');

    Route::get('/support', [SupportController::class, 'index'])->name('support');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');

    Route::get('/privacy/settings', [ProfileController::class, 'privacySettings'])->name('privacy.settings');
    Route::get('/billing/history', [BillingController::class, 'history'])->name('billing.history');

    Route::get('/rewards/program', [RewardsController::class, 'index'])->name('rewards.program');
    Route::get('/activity', [ActivityController::class, 'index'])->name('activity.all');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
});


