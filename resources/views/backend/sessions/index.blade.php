@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Sessions</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <a href="sessions/create" class="btn btn-primary btn-raised">Create</a>

            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Movie</th>
                    <th>Cinema</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Movie</th>
                    <th>Cinema</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($sessions as $session)

                    <tr>
                        <th>{{$session->movie_id}}</th>
                        <th>{{$session->cinema_id}}</th>
                        <th>{{$session->session_time}}</th>

                        <th>
                            | {!! link_to_action('Admin\MovieSessionController@destroy','Remove', $session->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

