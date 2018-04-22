@extends('layouts.app')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client</th>
            <th scope="col">Client's Phone</th>
            <th scope="col">Order Description</th>
            <th scope="col">Order Room</th>
            <th scope="col">Food</th>
            <th scope="col">Order Status</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <th scope="row"><a href="/orders/{{$order->id}}">{{$order->id}}</a></th>
            <td>{{$order->name}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->description}}</td>
            <td>{{$order->room}}</td>
            <td>
                @foreach($order->meals as $meal)
                {{ $meal->name }} - ${{$meal->price}} x {{ $meal->pivot->meal_quantity }}<br>
                @endforeach
            </td>

            @if($order->status == true)
            <td><b>Delivered</b></td>
            @else
            <td><b>Not Delivered</b></td>
            @endif

            <td>$
                @php($total = 0)
                @foreach($order->meals as $meal)
                    @php($total += $meal->price * $meal->pivot->meal_quantity)
                @endforeach
                {{ $total }}
            </td>


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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection