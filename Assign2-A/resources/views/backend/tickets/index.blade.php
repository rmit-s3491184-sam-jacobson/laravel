@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Tickets</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <a href="ticket/create" class="btn btn-primary btn-raised">Create</a>

            <table id="example" class="table table-striped">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($tickets as $ticket)

                    <tr>
                        <th>{{$ticket->type}}</th>
                        <th>{{$ticket->price}}</th>

                        <th>{!!link_to_action('Admin\TicketController@edit', 'Edit', $ticket->id) !!}
                            | {!! link_to_action('Admin\TicketController@destroy','Remove', $ticket->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

