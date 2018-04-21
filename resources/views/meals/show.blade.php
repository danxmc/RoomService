@extends('layouts.app')
 
@section('content')
<h1>Showing Meal {{ $meal->id }}</h1>
 
    <div class="jumbotron text-center">
        <p>
            <strong>Meal Name:</strong> {{ $meal->name }}<br>
            <strong>Meal Description:</strong> {{ $meal->description }}<br>
            <strong>Meal Price:</strong> $ {{ $meal->price }}
        </p>
    </div>
@endsection