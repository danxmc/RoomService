@extends('layouts.app')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Room</th>
            <th scope="col">User</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td><a href="/rooms/{{$room->id}}">{{$room->room}}</a></td>
            <td>
            @if($room->status == true)
            <b>{{$room->user->name}}</b>
            @else
            <b>---</b>
            @endif
            </td>
            @if($room->status == true)
            <td><b>Occupied</b></td>
            @else
            <td><b>Vacant</b></td>
            @endif
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