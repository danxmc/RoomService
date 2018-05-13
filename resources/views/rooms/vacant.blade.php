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
                <h3>Occupied Rooms</h3>
                        <span class="center-line"></span>
                        </div>
                        <div class="row">
                    <div class="col-sm-4">
                    <h3>
                    <a href="{{ URL::to('rooms/create') }}" class="list-group-item"><i class="pe-7s-plus"></i>Add Room</a>
                    <a href="{{ URL::to('rooms-occupied') }}" class="list-group-item"><i class="pe-7s-key"></i>Occupied Rooms</a>
                    <a href="{{ URL::to('rooms-vacant') }}" class="list-group-item"><i class="pe-7s-like2"></i>Vacant Rooms</a>
                    <a href="{{ URL::to('rooms') }}" class="list-group-item"><i class="pe-7s-note2"></i>All Rooms</a>
                    </h3>
                        </div>
                    <div class="col-sm-8 ">
<table id="datatable" class="table dt-responsive nowrap">
    <thead>
    <tr>
            <th scope="col">Room</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td><a href="/rooms/{{$room->id}}">{{$room->room}}</a></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('rooms/' . $room->id . '/edit') }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                    <form action="{{url('rooms', [$room->id])}}" method="POST">
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