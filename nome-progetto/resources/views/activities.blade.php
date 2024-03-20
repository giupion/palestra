<!-- resources/views/activities.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Attività Disponibili</h1>
        @foreach($courses as $course)
            <div class="card mb-3">
                <div class="card-header">{{ $course->name }}</div>
                <div class="card-body">
    <p><strong>Descrizione:</strong> {{ $course->description }}</p>
    <p><strong>Orari Disponibili:</strong> {{ $course->schedule }}</p>
    <a href="{{ route('bookings.create', $course->id) }}" class="btn btn-primary">Prenota</a>
</div>

            </div>
        @endforeach
    </div>
@endsection
