@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Il Mio Profilo</h1>
        <p>Nome: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

        <h2>Corsi Prenotati</h2>
        <ul>
        @foreach ($bookings as $booking)
    <li>{{ $booking->course->name }} - Data e Ora: {{ $booking->date_time }}
        <form action="{{ route('bookings.destroy', $booking) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Annulla Prenotazione</button>
        </form>
    </li>
@endforeach

