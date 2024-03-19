<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user(); // Otteniamo l'utente autenticato
        return view('profile', compact('user'));
    }
}
