@extends('layouts.master')

@section('content')

    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Now Showing</a></li>
            <li><a data-toggle="tab" href="#menu1">Coming Soon</a></li>
            <li><a data-toggle="tab" href="#menu2">Search</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div id="feature">
                    <div class="container">
                        @foreach ($movies as $movie)
                            @if ($movie->status == 'now showing')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="{{ URL::to("movie/ticketpage/{$movie->id}") }}">
                                            <h3>{{ $movie->title }}</h3></a>
                                        {!! HTML::image($movie->image, null, array('height' => '200', 'width' => '150')) !!}

                                    </div>
                                    <div class="col-sm-4">
                                        <h3>Description</h3>
                                        <p>{{ $movie->description }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div id="feature">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Your Wish List</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('wishlist.create') }}"> Add Movie To Wish
                                    List</a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        @foreach ($movies as $movie)
                            @if ($movie->status == 'coming soon')
                                <div class="row">
                                    <div class="col-sm-4">

                                        <h3>{{ $movie->title }}</h3>
                                        {!! HTML::image($movie->image, null, array('height' => '200', 'width' => '150')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <h3>Description</h3>
                                        <p>{{ $movie->description }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div id="feature">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-xs-11">
                                {!!  Form::open(array('url' => 'movie/searchResult', 'method' => 'GET')) !!}
                                <p>Search by Movie</p>
                                {!! Form::text('Search', null, array('class' => 'form-control', 'placeholder' => 'Search by Movie')) !!}
                                {!! Form::submit('Search',array('class' => 'btn btn-primary')) !!}
                                {!! Form::close() !!}

                                {!!  Form::open(array('url' => 'movie/searchResult', 'method' => 'POST')) !!}
                                <p>Search by Cinema</p>
                                {!! Form::text('Search', null, array('class' => 'form-control', 'placeholder' => 'Search by Movie')) !!}
                                {!! Form::submit('Search', array('class' => 'btn btn-primary')) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
