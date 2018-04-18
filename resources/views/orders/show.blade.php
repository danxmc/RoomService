@extends('layout.layout')
 
@section('content')
<h1>Showing Order {{ $order->id }}</h1>
 
    <div class="jumbotron text-center">
        <p>
            <strong>Food Type:</strong> {{ $order->type }}<br>
            <strong>Description:</strong> {{ $order->description }}
        </p>
    </div>
@endsection