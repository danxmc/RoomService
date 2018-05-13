        <!--header start-->
        <header class="header">
            <!--top bar-->
            <div class="top-bar" style="background-color: #fff; height: 30px;">
                <div class="container">
                    <div class="row" style="padding-bottom:2px">
                        <div class="col-sm-6 hidden-xs">
                        @if(Auth::check())
                            <span>Welcome {{@Auth::user()->name}}</span>
                        @else
                            <span>Please log in</span>
                        @endif
                        </div>
                        <div class="col-sm-6 text-right">
                            <ul class="list-inline">
                        @if(Auth::check())
                            <li class="hidden-xs"><a href="{{ URL::to('users/' . Auth::user()->id) }}"><i class="pe-7s-user"></i>Profile</a></li>
                            <li class="hidden-xs"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="pe-7s-door-lock"></i>LogOut</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </li>
                            
                        @else
                            <li><a href="/login"><i class="pe-7s-lock"></i> Login</a></li>
                        @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--top bar end-->


            <!--main navigation start-->
                        <!-- Static navbar -->
                        <nav class="navbar navbar-default navbar-static-top yamm sticky">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">RoomService</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                        <li><a href="/meals">Menu</a></li>
                            @if(Auth::check())
                            @if(Auth::user()->role != "LOBBY")
                            <li><a href="/orders">Orders</a></li>
                            @endif
                            @if(Auth::user()->role == "ADMIN" || Auth::user()->role == "LOBBY")
                            <li><a href="/rooms">Rooms</a></li>
                            @endif
                            @if(Auth::user()->role == "ADMIN")
                            <li><a href="/users">Users</a></li>
                            @endif
                            @if(Auth::user()->role == "LOBBY")
                            <li><a href="/users">Guests</a></li>
                            @endif
                            @endif
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
            <!--main navigation end-->
           
        </header>