@extends("frontend.layouts.master")


@section("scripts")

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <script type="text/javascript" src="public/js/jquery.lightbox.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/lightbox.css" media="screen">
    <script type="text/javascript">
        $(function() {
            $('.gallery-grid a').lightBox();
        });
    </script>

@endsection


@section("content")

    <div class="content">
        <!---start-what-we-do----->
        <div class="gallerys">
            <div class="wrap">
                <h3>WHAT WE DO</h3>
                <div class="gallery-grids">
                    <div class="gallery-grid">
                        <a href="public/images/my-driver.png"><img src="public/images/my-driver.png" alt=""></a>
                        <h4>Angkorcab Driver</h4>
                        <p>
                            Whether you are a taxi driver that wants the most efficient way to get a passenger, a car owner that wants to fund your dreams or simply offset costs of your car and help out the community to get rides around town - Grab is the partner for you.

                        </p>

                    </div>
                    <div class="gallery-grid grid2">
                        <a href="public/images/my-passenger.jpg"><img src="public/images/my-passenger.jpg" alt=""></a>
                        <h4>Angkorcab Passenger</h4>
                        <p>
                            Safe enough for us to trust our own mothers, sisters, and daughters to use. So we implemented these measures:

                            That’s what we call our drivers. Not workers. Not contractors. But partners. And we want to give you a way to earn enough to have options in life. We want to make a profit, yes. But never at your expense

                        </p>

                    </div>
                    <div class="gallery-grid">
                        <a href="public/images/car-taxi new.jpg"><img src="public/images/car-taxi new.jpg" alt=""></a>
                        <h4>Angkorcab Taxi</h4>
                        <p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes.</p>

                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="clear"> </div>
                <div class="gallery-grids">
                    <div class="gallery-grid">
                        <a href="public/images/tuktuk.jpg"><img src="public/images/tuktuk.jpg" alt=""></a>
                        <h4>Angkorcab Tuk Tuk</h4>
                        <p>

                            A normal trip that's up to 5 minutes is usually about 4,000-6,000 riel ($1 – $1.50). Across town is usually $3 and anything in between a short trip and an across town trip is $1.50 to $2. From almost anywhere in Phnom Penh to the airport should be $6, but it can be gotten for $5 if there's not a lot of traffic

                        But angkorcab was differience.
                        </p>

                    </div>
                    <div class="gallery-grid grid2">
                        <a href="public/images/motor.png"><img src="public/images/motor.png" alt=""></a>
                        <h4>Angkorcab Moto</h4>
                        <p>
                            A motorcycle (also called a motorbike, bike, or cycle) is a two-[1][2] or three-wheeled[3][4] motor vehicle. Motorcycle design varies greatly to suit a range of different purposes: long distance travel, commuting, cruising, sport including racing, and off-road riding. Motorcycling is riding a motorcycle and related social activity such as joining a motorcycle club and attending motorcycle rallies.

                        </p>

                    </div>
                    <div class="gallery-grid">
                        <a href="public/images/car-taxi new.jpg"><img src="public/images/car-taxi new.jpg" alt=""></a>
                        <h4>Angkorcab Car</h4>
                        <p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                    </div>
                </div>

                <div class="clear"> </div>

            </div>
        </div>
        <!---END-what-we-do----->
        <div class="bottom-grids">

            @include("frontend.includes.button-grid")

        </div>
    </div>

@endsection