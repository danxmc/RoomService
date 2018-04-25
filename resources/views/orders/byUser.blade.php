@extends('layouts.app')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1>My Orders</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client</th>
            <th scope="col">Client's Phone</th>
            <th scope="col">Order Description</th>
            <th scope="col">Order Room</th>
            <th scope="col">Food</th>
            <th scope="col">Total</th>
            @if (Auth::user()->role == "ADMIN" || Auth::user()->role == "COOK")
            <th scope="col">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <th scope="row"><a href="/orders/{{$order->id}}">{{$order->id}}</a></th>
            <td>{{$order->user->name}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->description}}</td>
            <td>{{$order->room}}</td>
            <td>
                @foreach($order->meals as $meal)
                {{ $meal->name }} - ${{$meal->price}} x {{ $meal->pivot->meal_quantity }}<br>
                @endforeach
            </td>

            <td>$
                @php($lineTotal = 0)
                @php($total = 0)
                @foreach($order->meals as $meal)
                    @php($lineTotal += $meal->price * $meal->pivot->meal_quantity)
                @endforeach
                @php($total += $lineTotal)
                {{ $lineTotal }}
            </td>
            
            @if (Auth::user()->role == "ADMIN" || Auth::user()->role == "COOK")
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('orders/' . $order->id . '/edit') }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                    <form action="{{url('orders', [$order->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                </div>
            </td>
            @endif
        </tr>
        @endforeach
        <tr>
            <td colspan="6">Total</td>
            <td>$ {{$total}}</td>
        </tr>
    </tbody>
</table>
@endsection