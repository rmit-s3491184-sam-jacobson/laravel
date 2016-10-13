@extends('layouts.master')

@section('content')
    {{--<script src="{{URL::asset('js\ajax-crud.js')}}"></script>--}}
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2>{{$movie->title}}</h2>
                <img src="/WDAAssign2/Assign2-A/{{ $movie->image }}" height="200" width="150">
                <p>{{ $movie->description }}</p>
            </div>
            <div class="col-sm-4">
            <h2>Purchase tickets!</h2>
            {!! Form::open(array('action'=>'MoviePageController@cart', 'files'=>true)) !!}
                    <label>Select a Cinema:</label><br>
                    <select id = "cinema" name = "cinema">
                        <option value="">Choose an option:</option>
                        @foreach ($join as $cinema)
                            <option value="{{$cinema->cinema_id}}">{{$cinema->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <label>Select a session:</label>
                    <br>
                    <select id = "sesh" name = "sesh">
                        <option value=""></option>
                    </select>
                    <br>
                    <label>Type of ticket:</label>
                    <br>
                    <select id= ="ticket" name = "ticket">
                        <option value="adult">Adult</option>
                        <option value="concession">Concession</option>
                        <option value="children">Children</option>
                    </select>

                    <br>
                    <label>Number of tickets:</label><br>
                    <select id = "count" name ="count">
                        @for ($i = 1; $i < 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <br><br>
                    <input type="submit" value="Submit">
                {!!Form::close()!!}
            </div>
        </div>
    </div>
<script>
    $('#cinema').on('change', function(e){
        console.log(e)
        var cinema_id = e.target.value;



    //ajax
        $.get('{{ url('/ajax-subcat') }}?cinema_id=' + cinema_id, function(data){
        //success data
        console.log(data)
        $('#sesh').empty();
        $.each(data, function(index, subcatObj){
            $('#sesh').append('<option value="'+subcatObj.id+'">'+subcatObj.session_time+'</option>');;
         });
    });
    });
</script>
@endsection

