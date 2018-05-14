@extends('layouts.app')
 
@section('content')
<div class="menu-title">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                        <h1>Rooms</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
        <section class="section-dishes">
            <div class="container ">
                <div class="row center-title text-center">
                <h3>New Room</h3>
                <span class="center-line"></span>
                </div>
                <div class="row">
                <div class="col-sm-4">
                    <h3>
                    @if(Auth::check())
                    @if(Auth::user()->role =='ADMIN')
                    <a href="{{ URL::to('rooms/create') }}" class="list-group-item"><i class="pe-7s-plus"></i>Add Room</a>
                    @endif
                    @endif
                    <a href="{{ URL::to('rooms-occupied') }}" class="list-group-item"><i class="pe-7s-key"></i>Occupied Rooms</a>
                    <a href="{{ URL::to('rooms-vacant') }}" class="list-group-item"><i class="pe-7s-like2"></i>Vacant Rooms</a>
                    <a href="{{ URL::to('rooms') }}" class="list-group-item"><i class="pe-7s-note2"></i>All Rooms</a>
                    </h3>
                        </div>
                <div class="col-sm-8">
                    <form action="/rooms" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Number:</label>
                    <div class="col-sm-7">
                    <input type="number" class="form-control" id="orderRoom" name="room" step="1">
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Description:</label>
                    <div class="col-sm-7">
                    <textarea rows="5" class="form-control" name="description" >
                    </textarea>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">No. of People:</label>
                    <div class="col-sm-7">
                    <input type="number" class="form-control" name="capacity" step="1">
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Price:</label>
                    <div class="col-sm-7">
                    <input type="number" class="form-control" name="price" >
                    </div>
                    </div>
                    <div class="row pull-right">
                    <button type="submit" class="btn btn-primary">Create Room!</button>
                        </form>
                    </div>
                        </div>
                        </div>
                    
                    
                   
                    
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
                </div>
            </div>
        </section><!--section dishes-->
@endsection