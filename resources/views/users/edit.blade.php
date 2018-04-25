@extends('layouts.app')

@section('content')

<h1>Edit User</h1>
<hr>
<form action="{{url('users', [$user->id])}}" method="POST">
    <input type="hidden" name="_method" value="PUT"> 
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{$user->name}}" class="form-control" id="userName" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" value="{{$user->email}}" class="form-control" id="userEmail" name="email">
    </div>
    <div class="form-group">
        <label for="room">Room:</label>
        <select class="form-control" id="room" name="room_id">
            @if($user->room == NULL)
            <option value="NoRoom">No Room</option>
            @else
            <option value="{{$user->room->id}}">{{$user->room->room}}</option>
            @endif
            @foreach($rooms as $room)
            <option value="{{$room->id}}">{{$room->room}}</option>
            @endforeach
        </select>
    </div>
    @if($user->role == "ADMIN")
    <div class="form-group">
        @if($user->role == "ADMIN")
        <label class="radio-inline"><input type="radio" name="role" value="ADMIN" checked>Admin</label>
        <label class="radio-inline"><input type="radio" name="role" value="COOK">Cook</label>
        <label class="radio-inline"><input type="radio" name="role" value="CLIENT">Client</label>
        @elseif($user->role == "COOK")
        <label class="radio-inline"><input type="radio" name="role" value="ADMIN">Admin</label>
        <label class="radio-inline"><input type="radio" name="role" value="COOK" checked>Cook</label>
        <label class="radio-inline"><input type="radio" name="role" value="CLIENT">Client</label>
        @else
        <label class="radio-inline"><input type="radio" name="role" value="ADMIN">Admin</label>
        <label class="radio-inline"><input type="radio" name="role" value="COOK">Cook</label>
        <label class="radio-inline"><input type="radio" name="role" value="CLIENT" checked>Client</label>
        @endif
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Edit User!</button>
</form>
@endsection