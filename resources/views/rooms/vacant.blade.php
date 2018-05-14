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
                        <h1>Rooms</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
        <section class="section-dishes">
            <div class="container ">
                <div class="row center-title text-center">
                <h3>Vacant Rooms</h3>
                        <span class="center-line"></span>
                        </div>
                        <div class="row">
                    <div class="col-sm-4">
                    <h3>
                    @if(Auth::check())
                    @if(Auth::user()->role =='ADMIN')
                    <a href="{{ URL::to('rooms/create') }}" class="list-group-item"><i class="pe-7s-plus"></i>Add Room</a>
                    @endif
                    @endif                    <a href="{{ URL::to('rooms-occupied') }}" class="list-group-item"><i class="pe-7s-key"></i>Occupied Rooms</a>
                    <a href="{{ URL::to('rooms-vacant') }}" class="list-group-item"><i class="pe-7s-like2"></i>Vacant Rooms</a>
                    <a href="{{ URL::to('rooms') }}" class="list-group-item"><i class="pe-7s-note2"></i>All Rooms</a>
                    </h3>
                        </div>
                    <div class="col-sm-8 ">
<table id="datatable" class="table dt-responsive nowrap">
    <thead>
    <tr>
            <th scope="col">Room</th>
            <th scope="col">Description</th>
            <th scope="col">Capacity</th>
            <th scope="col">Price</th>
            @if(Auth::check())
            @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'LOBBY')
            <th scope="col">Action</th>
            @endif
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td><a href="/rooms/{{$room->id}}">{{$room->room}}</a></td>
            <td>
            @if($room->description != NULL)
            {{$room->description}}
            @else
            ---
            @endif
            </td>
            <td>{{$room->capacity}}</td>
            <td>${{$room->price}} the night</td>
            @if(Auth::check())
            @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'LOBBY')
            <td>
            <div class="col-sm-6">
                <form action="/room/occupy" method="POST" onsubmit="return confirm('Do you really want to set the room as occupied?')">
                @csrf
                    <input type="hidden" name="id" value="{{$room->id}}">
                        <button type="submit" class="btn btn-warning">Occupy</button>
                    </form>
                </div>
                @if(Auth::user()->role == 'ADMIN')
                <div class="col-sm-6">
                    <form action="{{url('rooms', [$room->id])}}" method="POST" onsubmit="return confirm('Do you really want to delete the room?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                </div>
                @endif
            
            </td>
            @endif
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