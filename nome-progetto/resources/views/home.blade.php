@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista Corsi con Attività</h1>
        <div class="row">
            @foreach ($courses as $course)
                @if ($course->activities->count() > 0)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-header">{{ $course->name }}</div>
                            <div class="card-body d-flex flex-column align-items-start">
                                <p class="card-text">{{ $course->description }}</p>
                                <h3>Attività associate:</h3>
                                <ul class="list-unstyled"> <!-- Rimuove il puntino dalla lista -->
                                    @foreach ($course->activities as $activity)
                                        <li>{{ $activity->name }} - {{ $activity->schedule }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('bookings.create', $course->id) }}" class="btn btn-primary">Prenota</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

