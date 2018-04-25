@extends('layouts.app')
 
@section('content')
<h1>Showing Room {{ $room->room }}</h1>
 
    <div class="jumbotron text-center">
        <p>
            <strong>Room:</strong> {{ $room->room }}<br>
            <strong>Status:</strong>
            @if($room->status == true)
            Occupied
            @else
            Vacant
            @endif<br>
        </p>
    </div>
@endsection