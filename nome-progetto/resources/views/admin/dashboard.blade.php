@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Amministratore</h1>
        
        <h2>Prenotazioni degli Utenti</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Utente</th>
                    <th>Corso</th>
                    <th>Data e Ora</th>
                    <th>Status</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->course->name }}</td>
                        <td>{{ $booking->date_time }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
                            <form action="{{ route('admin.bookings.accept', $booking) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Accetta</button>
                            </form>
                            <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Rifiuta</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
