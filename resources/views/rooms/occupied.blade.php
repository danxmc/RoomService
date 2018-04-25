@extends('layouts.app')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1>Occupied Rooms</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Room</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td><a href="/room/{{$room->id}}">{{$room->room}}</a></td>
            <td>
            @if($room->status == true)
            <b>{{$room->user->name}}</b>
            @else
            <b>---</b>
            @endif
            </td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('rooms/' . $room->id . '/edit') }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                    <form action="{{url('rooms', [$room->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection