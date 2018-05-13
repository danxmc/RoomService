@extends('layouts.app')
@section('css')
<link href="/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="menu-title">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                        <h1>Orders</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
        <section class="section-dishes">
            <div class="container ">
                <div class="row center-title text-center">
                <h3>History of all orders</h3>
                        <span class="center-line"></span>
                        </div>
                        <div class="row">
                    <div class="col-sm-4">
                    <h3>
                    <a href="{{ URL::to('orders-pending') }}" class="list-group-item"><i class="pe-7s-pin"></i>Pending Orders</a>
                    
                    <a href="{{ URL::to('orders-delivered') }}" class="list-group-item"><i class="pe-7s-check"></i>Delivered Orders</a>
                    
                    <a href="{{ URL::to('orders') }}" class="list-group-item"><i class="pe-7s-albums"></i>All Orders</a>
                        </h3>
                        </div>
                    <div class="col-sm-8 ">
<table id="datatable" class="table dt-responsive nowrap">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client</th>
            <th scope="col">Order Description</th>
            <th scope="col">Order Room</th>
            <th scope="col">Items</th>
            <th scope="col">Order Status</th>
            <th scope="col">Total $</th>
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
            <td>{{$order->description}}</td>
            <td>{{$order->user->room->room}}</td>
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

            <td>
                @php($total = 0)
                @foreach($order->meals as $meal)
                    @php($total += $meal->price * $meal->pivot->meal_quantity)
                @endforeach
                {{ $total }}
            </td>

            @if (Auth::user()->role == "ADMIN" || Auth::user()->role == "COOK" )
            <td>
            @if( $order->status != true)
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('orders/' . $order->id . '/edit') }}">
                        <button type="button" class="btn btn-warning">Modify</button>
                    </a>&nbsp;
                    <form action="{{url('orders', [$order->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                </div>
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
                    </div> 
                    
                    </div>
                </div>
            </div>
        </section><!--section dishes-->
@section('scripts')
<script src="/datatables/jquery.dataTables.min.js"></script>
        <script src="/datatables/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {
        $('#datatable').dataTable();
        });
        </script>
@endsection
@endsection