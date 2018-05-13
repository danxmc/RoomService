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
                        <h1>User Details</h1>
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
                <div class="row single-product">
                <div class="col-sm-5 col-sm-offset-1 ">
                    
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Name:</label>
                    <div class="col-sm-7">
                        <p>{{$user->name}}</p>
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
                        <p>{{$user->email}}</p>
                    </div>
                    </div>
                        </div>
                    <div class="col-sm-6 ">
                    @if($user->role != 'CLIENT')
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Description:</label>
                    <div class="col-sm-7">
                    @if($user->description != NULL)
                    <p>{{$user->description}}</p>
                    @endif
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
                    </div>
                    </div>
                    @else
                    <div class="row form-group">
                        <label class="col-sm-3 control-label">Room:</label>
                    <div class="col-sm-7">
                        <p>{{$user->room->room}}</p>
                    </div>
                    </div>
                    @endif
                    </div> 
                    @if(Auth::user()->role == 'ADMIN')
                    <div class="row pull-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('users/' . $user->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>&nbsp;
                        </div>
                    </div>
                    @endif
                
                </div>
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