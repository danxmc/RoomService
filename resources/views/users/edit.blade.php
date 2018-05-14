@extends('layouts.app')
@section('css')
<!-- owl slider css -->
<link href="/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
        <link href="/owl-carousel/assets/owl.theme.default.css" rel="stylesheet" type="text/css" media="screen">
@endsection
@section('content')
<div class="menu-title">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                        <h1>User Edit</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
        <section class="section-dishes">
            <div class="container ">
            <div class="row center-title text-center">
                <h3>{{$user->role}} {{$user->name}}</h3>
                        <span class="center-line"></span>
                        </div>
    <form action="{{url('users', [$user->id])}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to save these changes?')">
    <input type="hidden" name="_method" value="PUT"> 
    {{ csrf_field() }}
    <input type="hidden" name="role" value="{{$user->role}}"
                <div class="row single-product">
                <div class="col-sm-5 col-sm-offset-1 ">
                    
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Name:</label>
                    <div class="col-sm-7">
                    <input type="text" value="{{$user->name}}" class="form-control" id="userName" name="name">
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Role:</label>
                    <div class="col-sm-7">
                        <p>{{$user->role}}</p>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Token:</label>
                    <div class="col-sm-7">
                        <input type="text" value="{{$user->email}}" class="form-control" id="userEmail" name="email">
                    </div>
                    </div>
                        </div>
                    <div class="col-sm-6 ">
                    @if($user->role != 'CLIENT')
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">New Password:</label>
                    <div class="col-sm-7">
                        <input type="password"  class="form-control" name="password">
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Description:</label>
                    <div class="col-sm-7">
                    <textarea rows="5" class="form-control" name="description">@if($user->description != NULL)
                    {{$user->description}}
                    @endif
                    </textarea>
                    </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Profile Picture:</label>
                    <div class="col-sm-7">
                    <div id="product-single"  class="owl-carousel owl-theme single-product-slider">
                                <div class="item">
                                @if($user->image != NULL)
                                    <a href="{{$user->image->route}}" data-lightbox="roadtrip"> <img src="{{$user->image->route}}" alt="Product image" class="img-responsive"></a>                              
                                @else
                                    <p>No Picture Available</p>
                                @endif
                                </div>
                    </div>
                    <span>Change image</span>
                    <input type="file" name="user_image">
                    </div>
                    </div>
                    @else
                    <input type="hidden" value="guest" name="password">
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Room:</label>
                    <div class="col-sm-7">
                    <select class="form-control" id="room" name="room_id">
                    @foreach($rooms as $room)
                    <option value="{{$room->id}}">{{$room->room}}</option>
                    @endforeach
                    </select>
                    </div>
                    </div>
                    @endif
                    <div class="row pull-right">
                    <button type="submit" class="btn btn-primary">Edit User!</button>
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
        </section><!--section dishes-->
    @section('scripts')
    <!--owl carousel slider js-->
    <script src="/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <script src="/bower_components/lightbox2/dist/js/lightbox.min.js" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
  $("#product-single").owlCarousel({
    loop:true,
    margin:0,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
});
    jQuery(document).ready(function () {
jQuery("#owl-slider").owlCarousel({
loop:true,
margin:0,
nav:false,
responsive:{
    0:{
        items:1
    },
    600:{
        items:3
    },
    1000:{
        items:4
    }
}
});

});
</script>
@endsection
@endsection