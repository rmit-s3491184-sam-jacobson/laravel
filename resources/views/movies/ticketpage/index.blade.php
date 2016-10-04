@extends('layouts.master')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2>{{$movie->title}}</h2>
                <img src="/WDAAssign2/Assign2-A/{{ $movie->image }}" height="200" width="150">
                <p>{{ $movie->description }}</p>
            </div>
            <div class="col-sm-4">
            <h2>Purchase tickets!</h2>
                <form action="action_page.php">
                    Select a Cinema:<br>
                    <select>
                        @foreach ($cinemas as $cinema)
                            <option value="{{$cinema->id}}">{{$cinema->cinema}}</option>
                        @endforeach
                    </select>
                    <br>
                    Select a session:
                    <br>
                    <select>
                        @foreach ($sessions as $session)
                            <option value="{{$session->id}}">{{$session->time}}</option>
                        @endforeach
                    </select>
                    <br>
                    Number of tickets:<br>
                    <select>
                        @for ($i = 1; $i < 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection

