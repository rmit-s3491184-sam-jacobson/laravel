@extends('layouts.master')

@section('header')
    <!-- /.parallax full screen background image -->
    <div class="fullscreen landing parallax" style="background-image:url({{URL::asset('images/Petes-Dragon2.jpg')}});" data-img-width="2000" data-img-height="1333" data-diff="100">

        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">

                        <!-- /.logo -->
                        <div class="logo wow fadeInDown"> <a href=""><img src="images/logo.png" alt="logo"></a></div>

                        <!-- /.main title -->
                        <h1 class="wow fadeInLeft">
                            Petes Dragon
                        </h1>

                        <!-- /.header paragraph -->
                        <div class="landing-text wow fadeInUp">
                            <p>A reimagining of Disney's cherished family film, &quot;Pete’s Dragon&quot; is the adventure of an orphaned boy named Pete and his best friend Elliott, who just so happens to be a dragon.</p>
                        </div>

                      {{--  <!-- /.header button -->
                        <div class="head-btn wow fadeInLeft">
                            <a href="#feature" class="btn-primary">Features</a>
                            <a href="#download" class="btn-default">Download</a>
                        </div>--}}



                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('content')
    <div id="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center feature-title">

                    <!-- /.feature title -->
                    <h2>Welcome to MI Cinema</h2>



                </div>
            </div>

        </div>
    </div>
@endsection
