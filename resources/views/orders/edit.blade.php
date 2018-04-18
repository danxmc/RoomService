@extends('layout.layout')

@section('content')

<h1>Edit Order</h1>
<hr>
<form action="{{url('orders', [$order->id])}}" method="POST">
    <input type="hidden" name="_method" value="PUT"> 
    {{ csrf_field() }}
    <div class="form-group">
        <label for="type">Order Type</label>
        <input type="text" value="{{$order->type}}" class="form-control" id="orderType" name="type">
    </div>
    <div class="form-group">
        <label for="description">Order Description</label>
        <input type="text" value="{{$order->description}}" class="form-control" id="orderDescription" name="description">
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
    <button type="submit" class="btn btn-primary">Change Order!</button>
</form>
@endsection