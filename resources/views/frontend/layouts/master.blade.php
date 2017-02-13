<!DOCTYPE HTML>
<html>
<head>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />

    <title>@yield('title', app_name())</title>

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')
    <!-- Styles -->
    @yield('before-styles-end')
    {{ Html::style("public/css/style.css") }}
    {{ Html::style("public/css/slider.css") }}
    @yield('after-styles-end')
            <!-- Fonts -->
    {{ Html::style('http://fonts.googleapis.com/css?family=Open+Sans') }}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
<!---strat-wrap----->

<!---strat-header----->

@include("frontend.includes.nav")
<!---End-header----->
<!--start-image-slider---->
@include("frontend.includes.slide")
<!--End-image-slider---->
<!---start-contnet---->
@yield("content")
<!---End-contnet---->
</div>
<!---End-wrap----->
</body>
</html>
@yield("scripts")
<script type="text/javascript">
    jQuery(function(){
        jQuery('#camera_wrap_1').camera({
            height: '500px',
            pagination: false,
        });
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
        });
    });
</script>

