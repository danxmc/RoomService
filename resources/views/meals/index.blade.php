@extends('layouts.app')
@section('css')

@endsection
@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<section id="home">
<div class="home-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-center">
                            <h3>Welcome to our Menu</h3>
                            <div class="flexslider intro-slider">
                                <ul class="slides">
                                    <li>
                                        Great Service
                                    </li>
                                    <li>
                                        Delicious restaurant
                                    </li>
                                    <li>
                                        Quality foods
                                    </li>
                                </ul>
                            </div><!--flex slider-->

                        </div>
                    </div>
                </div>
            </div>
            </section>

            <section id="menu" class="menu-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 center-title text-center">
                        <h3>Menu</h3>
                        <span class="center-line"></span>
                        <p>
                            Look at the great menu we have for you.
                            Make your order and we will take it to your room.
                        </p>
                        @if(Auth::check())
                        @if(Auth::user()->role == 'ADMIN')
                        <a href="{{ URL::to('meals/create') }}" class="list-group-item">Add Meal to Menu</a>
                        @endif
                        @endif
                    </div>
                </div><!--section title-->
                <div class="row">
                <h2>Food</h2>
                    <div class="col-sm-5 col-sm-offset-1">
                        <ul class="menu-style list-unstyled">
                        @foreach($foods as $key=> $meal)
                        @if(($key+1)%2 != 0)
                            <li class="clearfix">
                            @if($meal->images != NULL)
                                <img src="{{$meal->images[0]->route}}" class="img-responsive" width="90" alt="menu-img">
                                @else
                                <img src="/img/resto/img-4.jpg" class="img-responsive" width="90" alt="menu-img">
                                @endif

                                <div class="detail">
                                    <h4> <a href="/meals/{{$meal->id}}">{{$meal->name}}</a></h4>
                                    {{$meal->description}}
                                    <span class="price">${{$meal->price}}</span>
                                </div>
                            </li>
                        @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-5">
                        <ul class="menu-style list-unstyled">
                        @foreach($foods as $key=> $meal)
                        @if(($key+1)%2 == 0)
                            <li class="clearfix">
                            @if($meal->images != NULL)
                                <img src="{{$meal->images[0]->route}}" class="img-responsive" width="90" alt="menu-img">
                                @else
                                <img src="/img/resto/img-4.jpg" class="img-responsive" width="90" alt="menu-img">
                                @endif

                                <div class="detail">
                                    <h4> <a href="/meals/{{$meal->id}}">{{$meal->name}}</a></h4>
                                    {{$meal->description}}
                                    <span class="price">${{$meal->price}}</span>
                                </div>
                            </li>
                        @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                <h2>Desserts</h2>
                    <div class="col-sm-5 col-sm-offset-1">
                        <ul class="menu-style list-unstyled">
                        @foreach($desserts as $key=> $meal)
                        @if(($key+1)%2 != 0)
                            <li class="clearfix">
                            @if($meal->images != NULL)
                                <img src="{{$meal->images[0]->route}}" class="img-responsive" width="90" alt="menu-img">
                                @else
                                <img src="/img/resto/img-4.jpg" class="img-responsive" width="90" alt="menu-img">
                                @endif

                                <div class="detail">
                                    <h4> <a href="/meals/{{$meal->id}}">{{$meal->name}}</a></h4>
                                    {{$meal->description}}
                                    <span class="price">${{$meal->price}}</span>
                                </div>
                            </li>
                        @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-5">
                        <ul class="menu-style list-unstyled">
                        @foreach($desserts as $key=> $meal)
                        @if(($key+1)%2 == 0)
                            <li class="clearfix">
                            @if($meal->images != NULL)
                                <img src="{{$meal->images[0]->route}}" class="img-responsive" width="90" alt="menu-img">
                                @else
                                <img src="/img/resto/img-4.jpg" class="img-responsive" width="90" alt="menu-img">
                                @endif

                                <div class="detail">
                                    <h4> <a href="/meals/{{$meal->id}}">{{$meal->name}}</a></h4>
                                    {{$meal->description}}
                                    <span class="price">${{$meal->price}}</span>
                                </div>
                            </li>
                        @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                <h2>Drinks</h2>
                    <div class="col-sm-5 col-sm-offset-1">
                        <ul class="menu-style list-unstyled">
                        @foreach($drinks as $key=> $meal)
                        @if(($key+1)%2 != 0)
                            <li class="clearfix">
                            @if($meal->images != NULL)
                                <img src="{{$meal->images[0]->route}}" class="img-responsive" width="90" alt="menu-img">
                                @else
                                <img src="/img/resto/img-4.jpg" class="img-responsive" width="90" alt="menu-img">
                                @endif

                                <div class="detail">
                                    <h4> <a href="/meals/{{$meal->id}}">{{$meal->name}}</a></h4>
                                    {{$meal->description}}
                                    <span class="price">${{$meal->price}}</span>
                                </div>
                            </li>
                        @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-5">
                        <ul class="menu-style list-unstyled">
                        @foreach($drinks as $key=> $meal)
                        @if(($key+1)%2 == 0)
                            <li class="clearfix">
                                @if($meal->images != NULL)
                                <img src="{{$meal->images[0]->route}}" class="img-responsive" width="90" alt="menu-img">
                                @else
                                <img src="/img/resto/img-4.jpg" class="img-responsive" width="90" alt="menu-img">
                                @endif
                                <div class="detail">
                                    <h4> <a href="/meals/{{$meal->id}}">{{$meal->name}}</a></h4>
                                    {{$meal->description}}
                                    <span class="price">${{$meal->price}}</span>
                                </div>
                            </li>
                        @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>                             
        </section><!--menu section end here-->

        <section class="our-chefs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 center-title text-center">
                        <h3>Our Chefs</h3>
                        <span class="center-line"></span>
                        <p>
                            Here are our top chefs of the month
                        </p>
                    </div>
                </div><!--section title-->
                <div class="row">
                @foreach($users as $key=> $user)
                @if($key<= 2)
                    <div class="col-sm-4 margin-b-30">
                        <div class="chef-box">
                            <div class="chef-thumb">
                            @if($user->image != NULL)
                                <img src="{{$user->image->route}}" class="img-responsive" alt="">
                            @else
                            <img src="/img/team-1.jpg" class="img-responsive" alt="">
                            @endif
                                <div class="chef-overlay">
                                    <div class="chef-social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div><!--chef thumb-->
                            <div class="chef-desc">
                                <h4>{{$user->name}}</h4>
                                <em>{{$user->role}}</em>
                                <p>
                                    <!--descripción de USER-->
                                    {{$user->description}}
                                </p>
                            </div>
                        </div><!--chef desc-->
                    </div><!--chef column-->
                    @else
                    @php
                        break;
                    @endphp
                @endif
                @endforeach
                </div>
            </div>
        </section><!--Chefs section-->
@section('scripts')

@endsection
@endsection
