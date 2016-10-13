@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Ticket</h1>
            {!! Form::open(['url'=>'/admin/ticket']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Type:') !!}
                {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Type']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Price:') !!}
                {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price eg. 19.00']) !!}
            </div>

            {!! Form::submit('Add Ticket', ['class'=>'btn btn-primary']) !!}
            <a href="../ticket" class="btn btn-primary btn-raised">Cancel</a>
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
