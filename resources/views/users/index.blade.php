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
                        <h1>Users</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
        <section class="section-dishes">
            <div class="container ">
                <div class="row center-title text-center">
                <h3>All users</h3>
                        <span class="center-line"></span>
                        </div>
                        <div class="row">
                    <div class="col-sm-4">
                    <h3>
                    <a href="{{ URL::to('users/create') }}" class="list-group-item"><i class="pe-7s-plus"></i>Add User</a>
                    <a href="{{ URL::to('users') }}" class="list-group-item"><i class="pe-7s-note2"></i>All Users</a>
                    </h3>
                        </div>
                    <div class="col-sm-8 ">
<table id="datatable" class="table dt-responsive nowrap">
    <thead>
    <tr>
            <th scope="col">Name</th>
            <th scope="col">On Room</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><a href="/users/{{$user->id}}">{{$user->name}}</a></td>
            @if($user->room == NULL)
            <td><b>No Room</b></td>
            @else
            <td><b>{{$user->room->room}}</b></td>
            @endif
            <td><b>{{$user->role}}</b></td>
            <td>
            <div class="col-sm-6">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('users/' . $user->id . '/edit') }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                    </div>
                    </diV>
                    <div class="col-sm-6">
                    <form action="{{url('users', [$user->id])}}" method="POST">
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