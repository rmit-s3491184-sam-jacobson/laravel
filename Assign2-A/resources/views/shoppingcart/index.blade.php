@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Shopping Cart</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('shoppingcart.create') }}"> Add New Tickets</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>

            <th>Ticket ID</th>
            <th>Movie</th>
            <th>Cinema</th>
            <th>Session</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        <?php $i = 1;?>
        @foreach ($tickets as $ticket)

            <tr>
                {{--<td>{{ ++$i }}</td>--}}
                <td>{{ $ticket->rowId }}</td>
                <td>{{ $ticket->name}}</td>
                <td>{{ $ticket->options->cinemaName}}</td>
                <td>{{ $ticket->options->session}}</td>
                <td>{{ $ticket->options->ticketType}}</td>
                <td>{{ $ticket->qty}}</td>
                <td>${{ $ticket->options->subtotal}}</td>
                <td>
                    {{--<a class="btn btn-info" href="{{ route('shoppingcart.show',$ticket->rowId) }}">Show</a>--}}
                    <a class="btn btn-info" href="{{ route('shoppingcart.edit',$ticket->rowId) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['shoppingcart.destroy', $ticket->rowId],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>


    </table>
    <h4>Total cost: ${{$total}}</h4>
    <a class="btn btn-info" href="{{ url('/movie/ticketpage/payment') }}">Check Out!</a>
@endsection