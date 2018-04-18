@extends('layout.layout')

@section('content')

<h1>Add New Order</h1>
<hr>
<form action="/orders" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Food Type</label>
        <input type="text" class="form-control" id="foodType" name="type">
    </div>
    <div class="form-group">
        <label for="description">Order Description</label>
        <input type="text" class="form-control" id="orderDescription" name="description">
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
    <button type="submit" class="btn btn-primary">Order Up!</button>
</form>
@endsection