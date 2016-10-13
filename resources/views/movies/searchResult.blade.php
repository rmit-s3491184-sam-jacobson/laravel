@extends('layouts.master')

@section('content')
    <div id="feature">
        <div class="container">
            {{var_dump($cinema)}}
            @if ($movie != 1)
                @foreach(json_decode($movie, true) as $mov)
                    @if ($mov['status'] == 'now showing')
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{ URL::to("movie/ticketpage/{$mov['id']}") }}"><h3>{{ $mov['title'] }}</h3></a>
                                <img src="/WDAAssign2/Assign2-A/{{ $mov['image'] }}" height="200" width="150">
                            </div>
                            <div class="col-sm-4">
                                <h3>Description</h3>
                                <p>{{ $mov['description'] }}</p>
                            </div>
                        </div>
                    @elseif ($mov['status'] == 'coming soon')
                        <div class="row">
                            <div class="col-sm-4">
                                <h3>{{ $mov['title'] }}</h3>
                                <img src="/WDAAssign2/Assign2-A/{{ $mov['image'] }}" height="200" width="150">
                            </div>
                            <div class="col-sm-4">
                                <h3>Description</h3>
                                <p>{{ $mov['description'] }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @elseif ($cinema != 1)
                @foreach(json_decode($cinema, true) as $c)
                     <div class="row">
                         <div class="col-sm-4">
                             <h3>{{ $c['name'] }}</h3>

                         </div>
                         <div class="col-sm-4">
                             <h3>Address</h3>
                             <p>{{ $c['address'] }}</p>
                         </div>
                     </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-sm-4">
                        <h3>Search did not return any results</h3>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection