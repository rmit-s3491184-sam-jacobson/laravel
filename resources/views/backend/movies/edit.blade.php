@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit</h1>
            {!! Form::model($movie, [
            'method' => 'PATCH',
            'enctype'=> "multipart/form-data",
            'action' => ['Admin\MovieController@update', $movie->id
            ]
]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Image:') !!}

                {!! Form::file('image', null) !!}

            </div>

            <div class="form-group">
                {!! Form::label('name', 'Minutes:') !!}
                {!! Form::text('minutes', null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Actors:') !!}
                {!! Form::text('actors', null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Directors:') !!}
                {!! Form::text('directors', null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Classification:') !!}
                {!! Form::text('classification', null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label>Select Status:</label><br>
                <select class="form-control" name="status">
                    @if($movie->status == "now showing")
                        <option selected value="now showing">Now Showing</option>
                        <option value="coming soon">Coming Soon</option>
                    @else
                        <option value="now showing">Now Showing</option>
                        <option selected value="coming soon">Coming Soon</option>
                    @endif
                </select>
            </div>
        </div>

        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
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
@endsection