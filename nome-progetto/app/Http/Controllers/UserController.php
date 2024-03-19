<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // L'utente è autenticato, reindirizzalo alla tua pagina protetta
        return redirect()->intended('/dashboard');
    }

    // Autenticazione fallita, reindirizza all'area di login con un messaggio di errore
    return redirect()->back()->withInput()->withErrors(['email' => 'Credenziali non valide.']);
}
}
