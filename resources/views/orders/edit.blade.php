@extends('layouts.app')

@section('content')

<h1>Edit Order</h1>
<hr>
<form action="{{url('orders', [$order->id])}}" method="POST">
    <input type="hidden" name="_method" value="PUT"> 
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{$order->name}}" class="form-control" id="orderName" name="name">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" value="{{$order->phone}}" class="form-control" id="orderPhone" name="phone">
    </div>
    <div class="form-group">
        <label for="description">Order Description</label>
        <textarea class="form-control" rows="5" id="orderDescription" name="description">{{$order->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="room">Room</label>
        <input type="number" value="{{$order->room}}" class="form-control" id="orderRoom" name="room" step="1">
    </div>
    <div class="form-group">
        @if($order->status == true)
        <label class="radio-inline"><input type="radio" name="status" value="true" checked>Delivered</label>
        <label class="radio-inline"><input type="radio" name="status" value="false">Not Delivered</label>
        @else
        <label class="radio-inline"><input type="radio" name="status" value="true">Delivered</label>
        <label class="radio-inline"><input type="radio" name="status" value="false" checked>Not Delivered</label>
        @endif
    </div>
    <div class="form-group">
        @foreach($meals as $meal)
        <div class="row">
            @foreach($order->meals as $oMeal)
            <div class="col">
                <div class="form-check">
                    @if($meal->id == $oMeal->id)
                    <input class="form-check-input" type="checkbox" value="{{ $meal->id }}" name="orderMeal[]" checked>
                    @else
                    <input class="form-check-input" type="checkbox" value="{{ $meal->id }}" name="orderMeal[]">
                    @endif
                    <label class="form-check-label" for="orderMeal[]">{{ $meal->name }}</label>
                </div>
            </div>
            <div class="col">
                <label for="orderMealQuantity[]">Quantity</label>
                @if($meal->id == $oMeal->id)
                <input type="number" value="{{ $oMeal->pivot->meal_quantity }}" class="form-control" id="orderRoom" name="orderMealQuantity[]" step="1">
                @else
                <input type="number" class="form-control" id="orderRoom" name="orderMealQuantity[]" step="1">
                @endif
            </div>
            @endforeach
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
    <button type="submit" class="btn btn-primary">Change Order!</button>
</form>
@endsection