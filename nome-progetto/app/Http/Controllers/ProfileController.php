<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user(); // Otteniamo l'utente autenticato
        $bookings = $user->bookings()->with('course')->get(); // Recupera le prenotazioni dell'utente con i relativi corsi
        return view('profile', compact('user', 'bookings'));
    }
}
