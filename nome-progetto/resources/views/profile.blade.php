<!-- resources/views/profile.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profilo Utente</h1>
        <p><strong>Nome:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <!-- Aggiungi altri dettagli del profilo se necessario -->
    </div>
@endsection
