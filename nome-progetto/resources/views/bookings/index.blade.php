<!-- resources/views/bookings/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestione Prenotazioni</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Utente</th>
                    <th>Corso</th>
                    <th>Data e Ora</th>
                    <th>Status</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->course->name }}</td>
                        <td>{{ $booking->date_time }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancella</button>
                                <!-- Aggiungi altri pulsanti per accettare o respingere la prenotazione, se necessario -->
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
