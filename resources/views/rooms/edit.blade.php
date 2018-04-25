@extends('layouts.app')

@section('content')

<h1>Edit Room</h1>
<hr>
<form action="{{url('rooms', [$room->id])}}" method="post">
    <input type="hidden" name="_method" value="PUT"> 
    {{ csrf_field() }}
    <div class="form-group">
        <label for="room">Room</label>
        <input type="number" value="{{$room->room}}" class="form-control" id="orderRoom" name="room" step="1">
    </div>
    <div class="form-group">
        @if($room->status == true)
        <label class="radio-inline"><input type="radio" name="status" value="true" checked>Occupied</label>
        <label class="radio-inline"><input type="radio" name="status" value="false">Vacant</label>
        @else
        <label class="radio-inline"><input type="radio" name="status" value="true">Occupied</label>
        <label class="radio-inline"><input type="radio" name="status" value="false" checked>Vacant</label>
        @endif
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
    <button type="submit" class="btn btn-primary">Edit Room!</button>
</form>
@endsection