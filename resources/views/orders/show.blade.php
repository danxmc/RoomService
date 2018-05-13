@extends('layouts.app')
 
@section('content')
<div class="menu-title">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                        <h1>Order Details</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
        <section class="section-dishes">
            <div class="container center-title">
                <div class="row single-product">
                <div class="col-sm-5 col-sm-offset-1 ">
                    <h2>Client Details</h2>

                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-7">
                        <p><a href="/users/{{$order->user->id}}">{{$order->user->name}}</a></p>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-7">
                        <p>{{ $order->phone }}</p>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Room</label>
                    <div class="col-sm-7">
                        <p>{{$order->user->room->room }}</p>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Comments on order</label>
                    <div class="col-sm-7">
                        <p>{{ $order->description }}</p>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Order Status</label>
                    <div class="col-sm-7">
                        <p> @if($order->status == true)
                                Delivered
                            @else
                           
                                Not Delivered
                                @if(Auth::check())
                                    @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'COOK')
                                    <form action="/orders/deliver" method="POST" onsubmit="return confirm('Do you really want to set the order as delivered?')">
                @csrf
                <input type="hidden" name="id" value="{{$order->id}}">
                        <button type="submit" class="btn btn-warning">Delivered</button>
                    </form>
                                    @endif
                                @endif
                            @endif
                        </p>
                    </div>
                    </div>
                        </div>
                    <div class="col-sm-6 ">
                    <h2>Order {{ $order->id }}</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Meal Name</th>
                    <th scope="col">Quantity Ordered</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @php($total = 0)
                @php($linetotal = 0)
                @foreach($order->meals as $meal)
                <tr>
                    <td><a href="/meals/{{$meal->id}}">{{$meal->name}}</a></td>
                    <td>{{$meal->pivot->meal_quantity}}</td>
                    <td>$ {{$meal->price}}</td>
                    <td>
                        @php($linetotal = $meal->price * $meal->pivot->meal_quantity)
                        @php($total += $linetotal)
                        $ {{$linetotal}}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3">Order Total</td>
                    <td>$ {{$total}}</td>
                </tr>
            </tbody>
        </table>
                    </div> 
                    
                    </div>
                </div>
            </div>
        </section><!--section dishes-->
@endsection