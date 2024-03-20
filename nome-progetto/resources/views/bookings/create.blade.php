@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Prenotazione Corso: {{ $course->name }}</h1>
        <p><strong>Orario Attività:</strong> {{ $course->activities->first()->schedule }}</p>
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <div class="form-group">
                <label for="date_time">Seleziona Data e Ora:</label>
                <input type="datetime-local" id="date_time" name="date_time" class="form-control">
            </div>
            <!-- Aggiungi altri campi del form, se necessario -->
            <button type="submit" class="btn btn-primary">Prenota</button>
        </form>
    </div>
@endsection

