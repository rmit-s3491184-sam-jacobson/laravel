@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Session</h1>
            {!! Form::open(['url'=>'/admin/sessions', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Session Time:') !!}
                {!! Form::text('session_time', null, ['class' => 'form-control', 'placeholder' => 'Enter Time eg. 2016-09-17 10:17:14 ']) !!}
            </div>

            <div class="form-group">
                <label>Select Movie:</label><br>
                <select class="form-control" name="status">
                    @foreach(\App\Movie::all()->where('status', 'now showing') as $movie)
                        <option value="{{$movie->id}}">{{$movie->title}}</option>
                        @endforeach
                </select>
            </div>

            <div class="form-group">
            <label>Select Cinema:</label><br>
            <select class="form-control" name="status">
                @foreach(\App\Cinema::all() as $cinema)
                    <option value="{{$cinema->id}}">{{$cinema->name}}</option>
                @endforeach
            </select>
            </div>


            {!! Form::submit('Add Movie', ['class'=>'btn btn-primary']) !!}
            <a href="../movies" class="btn btn-primary btn-raised">Cancel</a>
            {!! Form::close() !!}

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="divider"></div>

        </div>
    </div>
@endsection
