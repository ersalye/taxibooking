@extends('frontend.layouts.master')


@section("scripts")
    {{ Html::script("public/js/jquery.easing.1.3.js") }}
    {{ Html::script("public/js/camera.min.js") }}
@endsection

@section('content')

    <div class="content">
        <div class="top-grids">
            <div class="wrap">
                <h3>You can download </h3>


                <img src="public/images/googleplay.png"/>

            </div>

        </div>
        <div class="mid-grids">
            <div class="wrap">
                <div class="mid-grid">
                    <h3>Easiest way around</h3>
                    <a href="#"><img src="public/images/1.png" title="repair" /></a>
                    <h4>It long established</h4>
                    <p>
                        One tap and a car comes directly to you. Hop in—your driver knows exactly where to go. And when you get there, just step out. Payment is completely seamless
                    </p>
                   ​
                   ​
                </div>
                <div class="mid-grid">
                    <h3>Anywhere, anytime</h3>
                    <a href="#"><img src="public/images/2.png" title="spares" /></a>
                    <h4>It long established</h4>
                    <p>

                        Daily commute. Errand across town. Early morning flight. Late night drinks. Wherever you’re headed, count on Uber for a ride—no reservations required.

                    </p>
                   ​
                </div>
                <div class="mid-grid">
                    <h3>Low-cost to luxury</h3>
                    <a href="#"><img src="public/images/3.png" title="sales" /></a>
                    <h4>It long established</h4>
                    <p>

                        Economy cars at everyday prices are always available. For special occasions, no occasion at all, or when you just a need a bit more room, call a black car or SUV.

                    </p>
                 ​
                </div>
                <div class="clear"> </div>
            </div>
        </div>
        <div class="bottom-grids">
            @include("frontend.includes.button-grid")
        </div>
    </div>



@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
        console.log(test1);

    </script>
@stop