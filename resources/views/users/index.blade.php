@extends('layouts.app')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table">
    <thead class="thead-dark">
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
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('users/' . $user->id . '/edit') }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
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
@endsection