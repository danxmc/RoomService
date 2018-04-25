@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in to RoomService</p>
                    
                    <p><b><a href="{{ URL::to('users/' . Auth::user()->id) }}">View my information</a></b></p>
                    <p><b><a href="{{ URL::to('users/' . Auth::user()->id . '/edit') }}">Edit my information</a></b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
