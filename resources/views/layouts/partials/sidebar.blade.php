<div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-3 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
                <div class="list-group border-0 card text-center text-md-left">

                <a href="{{ URL::to('home') }}" class="list-group-item d-inline-block collapsed"><i class="fa fa-user"></i> <span class="d-none d-md-inline">Profile</span></a>

                @if (Auth::user()->role == "ADMIN" || Auth::user()->role == "COOK") 
                <a href="#menu1" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-list-ul"></i> <span class="d-none d-md-inline">Orders</span> </a>
                <div class="collapse" id="menu1" data-parent="#sidebar">
                    <a href="{{ URL::to('orders-pending') }}" class="list-group-item">Pending Orders</a>
                    <a href="{{ URL::to('orders-delivered') }}" class="list-group-item">Delivered Orders</a>
                    <a href="{{ URL::to('orders') }}" class="list-group-item">All Orders</a>
                </div>
                @else
                <a href="#menu1" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-list-ul"></i> <span class="d-none d-md-inline">Orders</span> </a>
                <div class="collapse" id="menu1" data-parent="#sidebar">
                    <a href="{{ URL::to('orders/create') }}" class="list-group-item">Add Order</a>
                    <a href="{{ URL::to('orders') }}" class="list-group-item">All Orders</a>
                </div>
                @endif

                @if (Auth::user()->role == "ADMIN" || Auth::user()->role == "COOK") 
                <a href="#menu2" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">Menu</span> </a>
                <div class="collapse" id="menu2" data-parent="#sidebar">
                    <a href="{{ URL::to('meals') }}" class="list-group-item">View Menu</a>
                    <a href="{{ URL::to('meals/create') }}" class="list-group-item">Add Meal to Menu</a>
                </div>
                @else
                <a href="{{ URL::to('meals') }}" class="list-group-item d-inline-block collapsed"><i class="fa fa-book"></i> <span class="d-none d-md-inline">View Menu</span></a>
                @endif

                @if (Auth::user()->role == "ADMIN") 
                <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-users"></i> <span class="d-none d-md-inline">Users</span> </a>
                <div class="collapse" id="menu3" data-parent="#sidebar">
                    <a href="{{ URL::to('users/create') }}" class="list-group-item">Add User</a>
                    <a href="{{ URL::to('users') }}" class="list-group-item">All Users</a>
                </div>
                @endif
            </div>
        </div>