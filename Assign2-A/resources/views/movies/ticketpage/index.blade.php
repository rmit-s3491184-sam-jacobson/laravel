@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <h2>{{$movie->title}}</h2>
                <div class="row">
                <div class="col-md-6 col-xs-12">
                    {!! HTML::image($movie->image, null, array('height' => '200', 'width' => '150')) !!}
                </div>

                    <div class="col-md-6 col-xs-12">
                        <label>Running time</label>
                        <p>{{$movie->minutes}}</p>

                        <label>Classification</label>
                        <p>{{$movie->classification}}</p>
                    </div>

                </div>
                <h4>Description</h4>
                <p>{{ $movie->description }}</p>
                <h4></h4>
            </div>
            <div class="col-md-4 col-xs-12">
                <h2>Purchase tickets!</h2>
                @if(Auth::check())


                {!! Form::open(array('action'=>'MoviePageController@cart', 'files'=>true)) !!}
                <label>Select a Cinema:</label><br>
                <select class="form-control" id="cinema" name="cinema">
                    <option value="">Choose an option:</option>
                    @foreach ($join as $cinema)
                        <option value="{{$cinema->id}}">{{$cinema->name}}</option>
                    @endforeach
                </select>
                <br>
                <label>Select a session:</label>
                <br>
                <select class="form-control" id="sesh" name="sesh">
                    <option value=""></option>
                </select>
                <br>
                <label>Type of ticket:</label>
                <br>
                <select class="form-control" id="ticket" name="ticket">
                    @foreach(\App\TicketType::all() as $tickets)
                        <option value="{{$tickets->type}}">{{$tickets->type}} ${{$tickets->price}}</option>
                        @endforeach

                </select>
               <input id="movieId" value="{{$movie->id}}" type="hidden">
                <br>
                <label>Number of tickets:</label><br>
                <select class="form-control" id="count" name="count">
                    @for ($i = 1; $i < 10; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <br><br>
                <button type="submit" value="Submit">Add to Cart</button>
                {!!Form::close()!!}
                    @else
                    <h3>You need to login before purchasing tickets</h3>
                    @endif
            </div>
        </div>
    </div>
    <script>
        $('#cinema').on('change', function (e) {
            console.log(e);
            var cinema_id = e.target.value;
            var movie_id = $('#movieId').val();


            //ajax
            $.get('{{ url('/ajax-subcat') }}?cinema_id=' + cinema_id + '&movie_id=' + movie_id, function (data) {
                //success data
                console.log(data)
                $('#sesh').empty();
                $.each(data, function (index, subcatObj) {
                    $('#sesh').append('<option value="' + subcatObj.id + '">' + subcatObj.session_time + '</option>');
                    ;
                });
            });
        });
    </script>
@endsection

