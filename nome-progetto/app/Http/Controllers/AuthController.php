<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
{
    $this->middleware('guest')->except('logout');
    $this->middleware('redirectIfAdmin')->only('showLoginForm', 'login');
}
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard'); // Reindirizza all'admin dashboard se l'utente è un amministratore
        }
    
        return redirect('/home'); // Altrimenti, reindirizza alla home page
    }
    
    
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validazione dei dati del form di registrazione
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin', // Aggiungi il campo per il ruolo durante la registrazione
        ]);
    
        // Creazione dell'utente
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => $request->role, // Salva anche il ruolo dell'utente
        ]);
    
        // Autenticazione dell'utente
        Auth::login($user);
    
        // Redirect alla home page o alla pagina di gestione delle prenotazioni
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->intended($this->redirectPath());
        }
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors(['email' => 'Credenziali non valide.']);
    }

  

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Reindirizza l'utente alla dashboard admin dopo il logout
        return redirect()->route('admin.dashboard');
    }
    
}
