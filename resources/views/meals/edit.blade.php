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
                <form action="{{url('meals', [$meal->id])}}" method="POST">
    <input type="hidden" name="_method" value="PUT" enctype="multipart/form-data"> 
    {{ csrf_field() }}
                    <div class="col-sm-5 col-sm-offset-1">
                            <div id="product-single"  class="owl-carousel owl-theme single-product-slider">
                            <!--foreach-->
                            @foreach($meal->images as $image)
                                <div class="item">
                                    <a href="{{$image->route}}" data-lightbox="roadtrip"> <img src="{{$image->route}}" alt="Product image" class="img-responsive"></a>                              
                                    <input type="checkbox" name="del_img[]" value="{{$image->id}}">Delete
                                </div>
                            @endforeach
                            </div>

                        </div>
                        <div class="col-sm-6 ">
                        
    <div class="form-group">
        <label for="name">Meal Name</label>
        <input type="text" value="{{$meal->name}}" class="form-control" id="mealName" name="name">
    </div>
    <div class="form-group">
        <label for="description">Meal Description</label>
        <input type="text" value="{{$meal->description}}" class="form-control" id="mealDescription" name="description">
    </div>
    <div class="form-group">
        <label for="price">Meal Price</label>
        <input type="number" value="{{$meal->price}}" class="form-control" id="mealPrice" name="price" placeholder="$" step="any">
    </div>
    <div class="form-group">
        <label for="price">Meal Category</label>
        <select name ="category" required>
        <option value="food">Food</option>
        <option value="drink">Drink</option>
        <option value="dessert">Dessert</option>
        </select>
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
    <button type="submit" class="btn btn-primary">Change Meal!</button>

                    </div>
                    </form>  
                    </div> 
                    
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