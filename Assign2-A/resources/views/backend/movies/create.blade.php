@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Movie</h1>
            {!! Form::open(['url'=>'/admin/movie']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Image:') !!}
                {!! Form::text('image', null, ['class' => 'form-control', 'placeholder' => 'Image']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Minutes:') !!}
                {!! Form::text('minutes', null, ['class' => 'form-control', 'placeholder' => 'Minutes']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Actors:') !!}
                {!! Form::textarea('actors', null, ['class' => 'form-control', 'placeholder' => 'Actors']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Directors:') !!}
                {!! Form::text('directors', null, ['class' => 'form-control', 'placeholder' => 'Directors']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Classification:') !!}
                {!! Form::text('classification', null, ['class' => 'form-control', 'placeholder' => 'Classification']) !!}
            </div>


            {!! Form::submit('Add Content', ['class'=>'btn btn-primary']) !!}
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
