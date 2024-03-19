@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Il Mio Profilo</h1>
        <p>Nome: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
    </div>
@endsection
