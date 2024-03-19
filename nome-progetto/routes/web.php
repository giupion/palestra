<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rotte per l'autenticazione

// Rotte protette dall'autenticazione
Route::middleware(['auth'])->group(function () {
    // Rotte per le attività
    Route::get('/activities', 'ActivityController@index')->name('activities.index');
    // Rotte per le prenotazioni
    Route::get('/bookings/create/{id}', 'BookingController@create')->name('bookings.create');
    Route::post('/bookings', 'BookingController@store')->name('bookings.store');
    // Rotte per il profilo utente
    Route::get('/profile', 'UserController@profile')->name('profile');
    // Rotte per la gestione delle prenotazioni (amministratori)
    Route::get('/bookings', 'BookingController@index')->name('bookings.index'); // Mostra tutte le prenotazioni
    Route::delete('/bookings/{id}', 'BookingController@destroy')->name('bookings.destroy'); // Cancella una prenotazione
});


use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

