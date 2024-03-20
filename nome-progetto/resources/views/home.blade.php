
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Lista Corsi con Attività</h1>
                @foreach ($courses as $course)
                    @if ($course->activities->count() > 0)
                        <div class="card mb-4">
                            <div class="card-header">{{ $course->name }}</div>
                            <div class="card-body">
                                <p class="card-text">{{ $course->description }}</p>
                                <h3>Attività associate:</h3>
                                <ul>
                                    @foreach ($course->activities as $activity)
                                        <li>{{ $activity->name }} - {{ $activity->schedule }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

