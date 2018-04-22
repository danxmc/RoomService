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
    @php($key)
    @php($mealIds = array())
    @foreach($order->meals as $oMeal)
        @php($mealIds[] = array('id' => $oMeal->id, 'quantity'=> $oMeal->pivot->meal_quantity))
    @endforeach
    <div class="form-group">
        @foreach($meals as $meal)
        <div class="row">
            <div class="col">
                <div class="form-check">
                    @if(in_array($meal->id, array_column($mealIds, 'id')))
                    <input class="form-check-input" type="checkbox" value="{{ $meal->id }}" name="orderMeal[]" checked>
                    @else
                    <input class="form-check-input" type="checkbox" value="{{ $meal->id }}" name="orderMeal[]">
                    @endif
                    <label class="form-check-label" for="orderMeal[]">{{ $meal->name }}</label>
                </div>
            </div>
            <div class="col">
                <label for="orderMealQuantity[]">Quantity</label>
                @if(in_array($meal->id, array_column($mealIds, 'id')))
                @php($key = array_search($meal->id, array_column($mealIds, 'id')))
                <input type="number" value="{{ $mealIds[$key]['quantity'] }}" class="form-control" id="orderRoom" name="orderMealQuantity[]" step="1">
                @else
                <input type="number" class="form-control" id="orderRoom" name="orderMealQuantity[]" step="1">
                @endif  
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
    <button type="submit" class="btn btn-primary">Change Order!</button>
</form>
@endsection