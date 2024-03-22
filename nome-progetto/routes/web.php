<?php
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;

// Rotte per l'autenticazione
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rotte accessibili solo agli utenti autenticati
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/bookings/create/{id}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
});

// Rotte accessibili solo agli amministratori
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard dell'amministratore
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Visualizza e gestisci le prenotazioni degli utenti
    Route::get('/bookings', [AdminController::class, 'adminIndex'])->name('admin.bookings.index');
    Route::post('/bookings/{booking}/accept', [AdminController::class, 'accept'])->name('admin.bookings.accept');
    Route::post('/bookings/{booking}/reject', [AdminController::class, 'reject'])->name('admin.bookings.reject');
});

