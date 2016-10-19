@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Movie To Wish List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('wishlist.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'wishlist.store','method'=>'POST')) !!}
        <label>Select a Movie:</label><br>
        <select id = "movie_title" name = "movie_title">
            <option value="">Choose a Movie:</option>
            @foreach ($upComingMovies as $movie)
                <option value="{{$movie->title}}">{{$movie->title}}</option>
            @endforeach
        </select>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Your Name:</strong>
                {!! Form::text('user_name', null, array('placeholder' => 'Your name','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection