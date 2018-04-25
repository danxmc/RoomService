@extends('layouts.app')

@section('content')

<h1>Add New Room</h1>
<hr>
<form action="/rooms" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="room">Room</label>
        <input type="number" class="form-control" id="orderRoom" name="room" step="1">
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
    <button type="submit" class="btn btn-primary">Create Room!</button>
</form>
@endsection