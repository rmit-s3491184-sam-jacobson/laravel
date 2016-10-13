@extends('layouts.master')

@section('content')
    <div id="feature">
        <div class="container">
            @if (!empty($movie))
                @if ($movie[0]['status'] == 'now showing')
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{ URL::to("movie/ticketpage/{$movie[0]['id']}") }}"><h3>{{ $movie[0]['title'] }}</h3></a>
                            <img src="/WDAAssign2/Assign2-A/{{ $movie[0]['image'] }}" height="200" width="150">
                        </div>
                        <div class="col-sm-4">
                            <h3>Description</h3>
                            <p>{{ $movie[0]['description'] }}</p>
                        </div>
                    </div>
                @else ($movie[0]['status'] == 'coming soon')
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>{{ $movie[0]['title'] }}</h3>
                            <img src="/WDAAssign2/Assign2-A/{{ $movie[0]['image'] }}" height="200" width="150">
                        </div>
                        <div class="col-sm-4">
                            <h3>Description</h3>
                            <p>{{ $movie[0]['description'] }}</p>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    <div class="col-sm-4">
                        <p>Search did not return any results</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection