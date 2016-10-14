@extends('layouts.master')

@section('content')
    {{--<script src="{{URL::asset('js\ajax-crud.js')}}"></script>--}}
    <div id="feature">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Your Items:</h2>
                    <h4>Movie: {{$movieTitle->title}}</h4>
                    <h4>Cinema: {{$cinemaDetails->name}}</h4>
                    <h4>Date/Time: {{$session->session_time   }} </h4>
                    <h4>Number of tickets: {{$count}}</h4>
                    <h4>Total cost: ${{$cost}}</h4>
                </div>

                <div class="col-sm-12">
                    {!! Form::open(array('url'=>'paymentrecieved', 'method'=>'post','files'=>true)) !!}
                    <label>Select a payment type:</label><br>
                    <select id="paytype" name="paytype">
                        <option value="Visa">Visa</option>
                        <option value="Mastercard">Mastercard</option>
                    </select>
                    <br>
                    <label>Enter your credit card number:</label><br>
                    {!! Form::text('cardNo', null, ['class' => 'form-control', 'placeholder' => 'Card Number']) !!}
                    {{--<input type="text" name="cardNo" id="cardNo"><br>--}}
                    <label>Enter your CVV (3 numbers on the back of your card):</label><br>
                    {!! Form::text('CVV', null, ['class' => 'form-control', 'placeholder' => 'CVV']) !!}
                    {{--<input type="text" name="CVV" id="CVV"><br>--}}
                    <label>Enter your full name:</label><br>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'CVV']) !!}
                    {{--<input type="text" name="name" id="name"><br>--}}
                    <label>Enter your address:</label><br>
                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'CVV']) !!}
                    {{--<input type="text" name="address" id="address"><br>--}}
                    {!! Form::submit('Checkout', ['class'=>'btn btn-primary']) !!}
                    {{--<button type="submit">checkout</button>--}}
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>

    </div>
    </div>
@endsection

