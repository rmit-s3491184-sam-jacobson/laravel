@extends('layouts.master')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>

            <th>Odrer ID</th>
            <th>Movie</th>
            <th>Cinema</th>
            <th>Session</th>
            <th>Type</th>
            <th>Quantity</th>
        </tr>
        </thead>

        <tbody>

        @foreach ($tickets as $ticket)

            <tr>
                {{--<td>{{ ++$i }}</td>--}}
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->movieName}}</td>
                <td>{{ $ticket->cinemaName}}</td>
                <td>{{ $ticket->sessionTime}}</td>
                <td>{{ $ticket->type}}</td>
                <td>{{ $ticket->qty}}</td>

            </tr>
        @endforeach
        </tbody>


    </table>
@endsection