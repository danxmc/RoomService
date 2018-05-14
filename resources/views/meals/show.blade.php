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
                        <h1>{{ $meal->category }}</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
        <section class="section-dishes">
            <div class="container">
                <div class="row single-product">
                    <div class="col-sm-5 col-sm-offset-1">
                            <div id="product-single"  class="owl-carousel owl-theme single-product-slider">
                            @if($meal->images != NULL)
                            @foreach($meal->images as $image)
                                <div class="item">
                                    <a href="{{$image->route}}" data-lightbox="roadtrip"> <img src="{{$image->route}}" alt="Product image" class="img-responsive"></a>                              
                                </div>
                            @endforeach
                            @else
                            <p>No picture available</p>
                            @endif
                            </div>
                        </div>
                        <div class="col-sm-6 center-title text-center">
                        <h3>{{ $meal->name }} <span class="price-dishes">${{ $meal->price }}</span></h3>
                        
                        <span class="center-line"></span>
                        
                        <p>
                        {{ $meal->description }}
                        </p>
                        @if(Auth::check())
                        @if (Auth::user()->role == "ADMIN" || Auth::user()->role == "COOK") 
                <div class="col-sm-6">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('meals/' . $meal->id . '/edit') }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                </div>
                </div>
                <div class="col-sm-6">
                    <form action="{{url('meals', [$meal->id])}}" method="POST" onsubmit="return confirm('Do you really want to delete the item?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                </div>
            @endif
            @endif
                    </div>  
                    </div> 
                    
                    </div>
                </div>
            </div>
        </section><!--section dishes-->
        <section class="section-dishes">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 center-title text-center">
                        <h3>Similar Dishes</h3>
                        <span class="center-line"></span>
                        <p>
                            Checkout the other {{$meal->category}}s
                        </p>
                    </div>
                </div><!--section title-->
                <div class="row">
                    <div id="dishes-slider" class="owl-carousel owl-theme dishes-slider">
                    @foreach($meals as $meal)
                        <div class="item">
                            <div class="dishes-box">
                            @if($meal->images != NULL)
                                <img src="{{$meal->images[0]->route}}" class="img-responsive" alt="">
                                @else
                                <img src="/img/resto/img-4.jpg" class="img-responsive" alt="">
                                @endif
                                <span class="price-dishes">${{$meal->price}}</span>
                                <div class="dishes-desc">
                                    <h3><a href="/meals/{{$meal->id}}">{{$meal->name}}</a></h3>
                                    <p>
                                        {{$meal->description}}
                                    </p>                                    
                                </div>
                            </div>
                        </div><!--item carousel-->
                        @endforeach
                    </div>
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