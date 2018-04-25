@extends('layouts.app')

@section('content')

<h1>Add New User</h1>
<hr>
<form action="/users" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="userName" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="userEmail" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="userPassword" name="password">
    </div>
    <div class="form-group">
        <label for="room">Room:</label>
        <select class="form-control" id="room" name="room_id">
            <option value="NoRoom">No Room</option>
            @foreach($rooms as $room)
            <option value="{{$room->id}}">{{$room->room}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="radio-inline"><input type="radio" name="role" value="ADMIN">Admin</label>
        <label class="radio-inline"><input type="radio" name="role" value="COOK">Cook</label>
        <label class="radio-inline"><input type="radio" name="role" value="CLIENT">Client</label>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Create User!</button>
</form>
@endsection