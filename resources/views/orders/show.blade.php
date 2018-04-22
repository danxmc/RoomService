@extends('layouts.app')
 
@section('content')
<h1>Showing Order {{ $order->id }}</h1>
 
    <div class="jumbotron text-center">
        <p>
            <strong>Client Name:</strong> {{ $order->name }}<br>
            <strong>Client's Phone:</strong> {{ $order->phone }}<br>
            <strong>Order Description:</strong> {{ $order->description }}<br>
            <strong>Order Room:</strong> {{ $order->room }}<br>
            <strong>Status:</strong>
            @if($order->status == true)
            Delivered
            @else
            Not Delivered
            @endif
            <br>
        </p>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Meal Id</th>
                    <th scope="col">Meal Name</th>
                    <th scope="col">Quantity Ordered</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Line Total</th>
                </tr>
            </thead>
            <tbody>
                @php($total = 0)
                @php($linetotal = 0)
                @foreach($order->meals as $meal)
                <tr>
                    <th scope="row"><a href="/meals/{{$meal->id}}">{{$meal->id}}</a></th>
                    <td>{{$meal->name}}</td>
                    <td>{{$meal->pivot->meal_quantity}}</td>
                    <td>{{$meal->price}}</td>
                    <td>
                        @php($linetotal = $meal->price * $meal->pivot->meal_quantity)
                        @php($total += $linetotal)
                        {{$linetotal}}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4">Total</td>
                    <td>{{$total}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection