<!-- home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Lista Attività</h1>
                @foreach ($courses as $course)
                    <div class="card mb-4">
                        <div class="card-header">{{ $course->name }}</div>
                        <div class="card-body">
                            <p class="card-text">{{ $course->description }}</p>
                            <ul>
                                @foreach ($course->activities as $activity)
                                    <li>{{ $activity->name }} - {{ $activity->schedule }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <h1>Lista Corsi</h1>
                <ul class="list-group">
                    @foreach ($courses as $course)
                        <li class="list-group-item">
                            {{ $course->name }} - {{ $course->schedule }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
