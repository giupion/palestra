@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Attività Disponibili</h1>
        @foreach ($activities as $activity)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $activity->name }}</h5>
                    <p class="card-text">{{ $activity->description }}</p>
                    <p class="card-text">Orari Disponibili: {{ $activity->schedule }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
