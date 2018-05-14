@extends('layouts.app')
 
@section('content')
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
                <h3>New User</h3>
                <span class="center-line"></span>
                </div>
                <div class="row">
                <div class="col-sm-4">
                    <h3>
                    <a href="{{ URL::to('users/create') }}" class="list-group-item"><i class="pe-7s-plus"></i>Add User</a>
                    <a href="{{ URL::to('users') }}" class="list-group-item"><i class="pe-7s-note2"></i>All Users</a>
                    </h3>
                        </div>
                <div class="col-sm-8">
                <form action="/users" method="post">
    {{ csrf_field() }}
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Role</label>
                    <div class="col-sm-7">
                    <select class="form-control" onchange="selectRole(this.value)" id="role" name="role">
                    <option disabled  selected style="display:none">Chose a role</option>
                        @if(Auth::check())
                        @if(Auth::user()->role == "ADMIN")
                        <option value="ADMIN">Administrator</option>
                        <option value="COOK">Cook</option>
                        <option value="LOBBY">Receptionist</option>
                        @endif
                        <option value="CLIENT">Guest</option>
                        @endif
                    </select>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Name:</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="userName" name="name">
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Token:</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="userToken" name="email">
                    </div>
                    </div>
                    <div id="formbody">
                    </div>
                    <div class="row pull-right">
                    <button type="submit" class="btn btn-primary">Create User!</button>
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
@section('scripts')
<script>
    function selectRole(role)
    {
        if(role == 'CLIENT')
        {
            $('#formbody').html('<input type="hidden"  id="userPassword" name="password" value="guest"><div class="row form-group"><label class="col-sm-3 control-label">Room</label><div class="col-sm-7"><select class="form-control" id="room" name="room_id">@foreach($rooms as $room)<option value="{{$room->id}}">{{$room->room}}</option>@endforeach</select></div></div>');
        }else{
            $('#formbody').html('<input type="hidden" name="room_id" value="NoRoom"><div class="row form-group"><label class="col-sm-3 control-label">Description:</label><div class="col-sm-7"><textarea rows="5" class="form-control" name="decription" ></textarea></div></div><div class="row form-group"><label class="col-sm-3 control-label">Password:</label><div class="col-sm-7"><input type="password" class="form-control" id="userPassword" name="password"></div></div><div class="form-group" ><input type="file" name="image"></div>');
        }
    }
</script>
@endsection
@endsection