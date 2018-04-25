@extends('layouts.app')
 
@section('content')
<h1>Showing User {{ $user->id }}</h1>
 
    <div class="jumbotron text-center">
        <p>
            <strong>Name:</strong> {{ $user->name }}<br>
            <strong>Email:</strong> {{ $user->email }}<br>
            <strong>Role:</strong> {{ $user->role }}<br>
            @if($user->room == NULL)
            <strong>Room:</strong> No Room<br>
            @else
            <strong>Room:</strong> {{ $user->room->room }}<br>
            @endif
        </p>
    </div>
@endsection