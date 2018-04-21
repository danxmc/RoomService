@extends('layouts.app')

@section('content')

<h1>Edit Meal</h1>
<hr>
<form action="{{url('meals', [$meal->id])}}" method="POST">
    <input type="hidden" name="_method" value="PUT"> 
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Meal Name</label>
        <input type="text" value="{{$meal->name}}" class="form-control" id="mealName" name="name">
    </div>
    <div class="form-group">
        <label for="description">Meal Description</label>
        <input type="text" value="{{$meal->description}}" class="form-control" id="mealDescription" name="description">
    </div>
    <div class="form-group">
        <label for="price">Meal Price</label>
        <input type="number" value="{{$meal->price}}" class="form-control" id="mealPrice" name="price" placeholder="$" step="any">
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
    <button type="submit" class="btn btn-primary">Change Meal!</button>
</form>
@endsection