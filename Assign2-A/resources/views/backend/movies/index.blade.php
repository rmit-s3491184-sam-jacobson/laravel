@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Movies</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <a href="movie/create" class="btn btn-primary btn-raised">Create</a>

            <table id="example" class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Minutes</th>
                    <th>Actors</th>
                    <th>Directors</th>
                    <th>Classification</th>
                    <th>Action</th>

                </tr>
                </thead>

                <tbody>
                @foreach($movies as $movie)

                    <tr>
                        <th>{{$movie->title}}</th>
                        <th>{{$movie->description}}</th>
                        <th>{{$movie->image}}</th>
                        <th>{{$movie->minutes}}</th>
                        <th>{{$movie->actors}}</th>
                        <th>{{$movie->directors}}</th>
                        <th>{{$movie->classification}}</th>
                        <th>{!!link_to_action('Admin\MovieController@edit', 'Edit', $movie->id) !!}
                            | {!! link_to_action('Admin\MovieController@destroy','Remove', $movie->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

