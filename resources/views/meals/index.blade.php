@extends('layouts.app')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Meal Name</th>
            <th scope="col">Meal Details</th>
            <th scope="col">Meal Price</th>
            @if (Auth::user()->role == "ADMIN" || Auth::user()->role == "COOK")
            <th scope="col">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($meals as $meal)
        <tr>
            <th scope="row">{{$meal->id}}</th>
            <td>
                <a href="/meals/{{$meal->id}}">{{$meal->name}}</a>
            </td>
            <td>{{$meal->description}}</td>
            <td>${{$meal->price}}</td>
            @if (Auth::user()->role == "ADMIN" || Auth::user()->role == "COOK") 
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('meals/' . $meal->id . '/edit') }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                    <form action="{{url('meals', [$meal->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                </div>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection