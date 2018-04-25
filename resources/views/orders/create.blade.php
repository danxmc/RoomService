@extends('layouts.app')

@section('content')

<h1>Add New Order</h1>
<hr>
<form action="/orders" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" readonly>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" class="form-control" id="orderPhone" name="phone">
    </div>
    <div class="form-group">
        <label for="description">Order Description</label>
        <textarea class="form-control" rows="5" id="orderDescription" name="description"></textarea>
    </div>
    <div class="form-group">
        @foreach($meals as $meal)
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $meal->id }}" name="orderMeal[]">
                    <label class="form-check-label" for="orderMeal[]">{{ $meal->name }}</label>
                </div>
            </div>
            <div class="col">
                <label for="orderMealQuantity[]">Quantity</label>
                <input type="number" class="form-control" id="orderRoom" name="orderMealQuantity[]" step="1">
            </div>
        </div>
        @endforeach
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