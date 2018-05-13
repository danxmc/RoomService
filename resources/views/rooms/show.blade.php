@extends('layouts.app')
 
@section('content')
<div class="menu-title">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                        <h1>Room Details</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
        <section class="section-dishes">
            <div class="container ">
            <div class="row center-title text-center">
                <h3>Room {{$room->room}}</h3>
                        <span class="center-line"></span>
                        </div>
                <div class="row single-product">
                <div class="col-sm-5 col-sm-offset-1 ">
                    
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Number:</label>
                    <div class="col-sm-7">
                        <p>{{ $room->room }}</a</p>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-7">
                        @if($room->status == true)
                        <p>Occupied 
                        @if($room->user != NULL) 
                        by <a href="/users/{{$room->user->id}}">{{$room->user->name}}</a>
                        @endif
                        </p>
                        @if(Auth::check())
                        @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'LOBBY')
                <form action="/room/free" method="POST" onsubmit="return confirm('Do you really want to set the room as available?')">
                @csrf
                    <input type="hidden" name="id" value="{{$room->id}}">
                        <button type="submit" class="btn btn-success">Free</button>
                    </form>
                    @endif
                    @endif
            @else
            <p>Vacant</p>
            @if(Auth::check())
            @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'LOBBY')
            <form action="/room/occupy" method="POST" onsubmit="return confirm('Do you really want to set the room as occupied?')">
                @csrf
                    <input type="hidden" name="id" value="{{$room->id}}">
                        <button type="submit" class="btn btn-warning">Occupy</button>
                    </form>
                    @endif
                    @endif
            @endif
                    </div>
                    </div>
                        </div>
                    <div class="col-sm-6 ">
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Description:</label>
                    <div class="col-sm-7">
                    <p></p>
                    </textarea>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">No. of People:</label>
                    <div class="col-sm-7">
                    <p></p>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Price:</label>
                    <div class="col-sm-7">
                    <p></p>
                    </div>
                    </div>
                    </div> 
                    
                    </div>
                </div>
            </div>
        </section><!--section dishes-->
@endsection