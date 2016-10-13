@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit</h1>
            {!! Form::model($ticket, [
            'method' => 'PATCH',
            'action' => ['Admin\TicketController@update', $ticket->id]
]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Type:') !!}
                {!! Form::text('type', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Price:') !!}
                {!! Form::text('price', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
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