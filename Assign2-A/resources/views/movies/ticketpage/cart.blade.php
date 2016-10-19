@extends('layouts.master')

@section('content')
    {{--<script src="{{URL::asset('js\ajax-crud.js')}}"></script>--}}
    <div id="feature">
        <div class="container">
            <div class="row">
                <h2>Billing Details</h2>
                {{--<div class="col-sm-4">--}}
                {{--<h2>Your Items:</h2>--}}
                {{--<h4>Movie: {{$movieTitle->title}}</h4>--}}
                {{--<h4>Cinema: {{$cinemaDetails->name}}</h4>--}}
                {{--<h4>Date/Time: {{$session->session_time   }} </h4>--}}
                {{--<h4>Number of tickets: {{$formData['count']}}</h4>--}}
                {{--<h4>Total cost: ${{$cost}}</h4>--}}
                {{--</div>--}}
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="col-sm-4">
                    {!! Form::open(array('action'=>'ShoppingCartController@store', 'files'=>true)) !!}
                    <label>Select a payment type:</label><br>
                    <select class="form-control" id="paytype" name="paytype">
                        <option value="Visa">Visa</option>
                        <option value="Mastercard">Mastercard</option>
                    </select>
                    <br>
                    <label>Enter your credit card number:</label><br>
                    <input class="form-control" type="text" name="cardNo" id="cardNo"><br>
                    <label>Enter your credit card expire date:(e.g. 03/2017)</label><br>
                    <input class="form-control" type="text" name="expire" id="expire"><br>
                    <label>Enter your CVV (3 numbers on the back of your card):</label><br>
                    <input class="form-control" type="text" name="CVV" id="CVV"><br>
                    <label>Enter your full name:</label><br>
                    <input class="form-control" type="text" name="name" id="name"><br>
                    <label>Enter your address:</label><br>
                    <input class="form-control" type="text" name="address" id="address"><br>
                    <button type="submit" class="btn ptn-primary">Pay now!</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>

@endsection

