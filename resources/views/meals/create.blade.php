@extends('layouts.app')

@section('content')

<h1>Add New Meal</h1>
<hr>
<form action="/meals" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Meal Name</label>
        <input type="text" class="form-control" id="mealName" name="name">
    </div>
    <div class="form-group">
        <label for="description">Meal Description</label>
        <input type="text" class="form-control" id="mealDescription" name="description">
    </div>
    <div class="form-group">
        <label for="description">Meal Price</label>
        <input type="number" class="form-control" id="mealPrice" name="price" placeholder="$" step="any">
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
    <button type="submit" class="btn btn-primary">Add to Menu!</button>
</form>
@endsection