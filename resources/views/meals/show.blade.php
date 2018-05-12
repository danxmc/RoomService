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
                            <!--foreach-->
                                <div class="item">
                                    <a href="/img/resto/img-5.jpg" data-lightbox="roadtrip"> <img src="/img/resto/img-5.jpg" alt="Product image" class="img-responsive"></a>                              
                                </div>
                            <!--endforeach-->
                            </div>
                        </div>
                        <div class="col-sm-6 center-title text-center">
                        <h3>{{ $meal->name }} <span class="price-dishes">${{ $meal->price }}</span><button type="button" class="btn btn-primary btn-circle btn-icon"><i class="fa fa-check"></i></button></h3>
                        
                        <span class="center-line"></span>
                        
                        <p>
                        {{ $meal->description }}
                        </p>
                        <
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
                        <h3>Other Dishes</h3>
                        <span class="center-line"></span>
                        <p>
                            Checkout the other dishes like this
                        </p>
                    </div>
                </div><!--section title-->
                <div class="row">
                    <div id="dishes-slider" class="owl-carousel owl-theme dishes-slider">
                    @foreach($meals as $meal)
                        <div class="item">
                            <div class="dishes-box">
                                <img src="/img/resto/img-5.jpg" class="img-responsive" alt="">
                                <span class="price-dishes">${{$meal->price}}</span>
                                <div class="dishes-desc">
                                    <h3>{{$meal->name}}</h3>
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