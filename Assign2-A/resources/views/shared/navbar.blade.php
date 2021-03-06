<!-- NAVIGATION -->
<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                {!!  Form::open(array('url' => 'movie/searchResult', 'method' => 'GET')) !!}
                <div class="col-md-4">
                    {!! Form::text('Search', null, array('class' => 'form-control', 'placeholder' => 'Search by Movie')) !!}
                </div>
                <div class="col-md-2">
                    {!! Form::submit('Search', array('class'=>'')) !!}
                </div>

                {!! Form::close() !!}

                {!!  Form::open(array('url' => 'movie/searchResult', 'method' => 'POST')) !!}
                <div class="col-md-4">
                    {!! Form::text('Search', null, array('class' => 'form-control', 'placeholder' => 'Search by Cinema')) !!}
                </div>
                <div class="col-md-2">
                    {!! Form::submit('Search', array('class'=>'')) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>


    </div>
</div>
<div id="menu">
    <nav class="navbar-wrapper navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-backyard">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand site-name" href="#top"><span class="logo-name">MI CINEMA</span></a>
            </div>

            <div id="navbar-scroll" class="collapse navbar-collapse navbar-backyard navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/movies') }}">Movies</a></li>
                </ul>


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::check())
                        @if(Auth::user()->hasRole('Admin'))
                            {{--<li>{!!link_to_action('Admin\PageController@dashboard', 'Dashboard') !!} </li>--}}
                            <li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ 'My Account' }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu pull-right clearfix">
                                <li><a href="{{ url('/shoppingcart') }}"><i
                                                class="glyphicon glyphicon-shopping-cart"></i> Shopping Cart</a></li>
                                <li><a href="{{ url('/wishlist') }}"><i class="glyphicon glyphicon-heart"></i> Wish List</a>
                                </li>
                                <li><a href="{{ url('/booking') }}"><i class="glyphicon glyphicon-ok"></i> My Booking</a>
                                </li>
                            </ul>
                        </li>



                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu pull-right clearfix">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>
</div>