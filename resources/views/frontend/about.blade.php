@extends("frontend.layouts.master")


@section("content")

    <div class="content">
        <!---start-about-us----->
        <div class="about-us">
            <div class="wrap">
                <div class="about-header">
                    <h3>About Angkorcab.com</h3>
                    <h3> 	&nbsp;</h3><h3>	&nbsp;</h3>
                    <div class="clear"> </div>
                </div>
                <div class="about-info">
                    <p>It was 2017 and legend has it, a few friends were enjoying some tea together. As is common with Southeast Asians, they started ranting about how hard it was to get a taxi.

                        But afterwards, they did something uncommon.</p>

                    <p>They decided to solve the problem. They started us, Angkorcab.com ,  Pretty soon, our simple goal had transformed into something bigger – to make Southeast Asia a better place</p>
                    <h3> 	&nbsp;</h3><h3>	&nbsp;</h3>
                </div>

            </div>

            <div class="testmonials">

            </div>
            <!---End-about---->
        </div>
        <!---End-about-us----->
        <div class="bottom-grids">
            @include("frontend.includes.button-grid")
        </div>
    </div>

@endsection
