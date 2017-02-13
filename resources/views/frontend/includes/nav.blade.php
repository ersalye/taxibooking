<div class="header"  id="top">
    <div class="wrap">
        <!---start-logo---->
        <div class="logo">
            <a href="{{route("frontend.index")}}">

                <h3 style="font-size:20px; color:#FFFFff;">Angkorcab.com</h3>

            </a>
        </div>
        <!---End-logo---->
        <!---start-top-nav---->
        <div class="top-nav">
            <ul>
                <li class="{{ Active::pattern('/') }}"><a href="{{route("frontend.index")}}">Home</a></li>

                <li class="{{ Active::pattern('wedo.html') }}"><a href="{{route("front.webdo")}}">What we do</a></li>
              {{--  <li class="{{ Active::pattern('service.html') }}"><a href="{{route("front.service")}}">Services</a></li>--}}
                <li class="{{ Active::pattern('contax.html') }}"><a href="{{route("front.contact")}}">Contact</a></li>
                <li class="{{ Active::pattern('about.html') }}"><a href="{{route("front.about")}}">About</a></li>

                        @if (access()->guest())
                            <li>{{ link_to('login', trans('navs.frontend.login')) }}</li>
                          {{--  <li>{{ link_to('register', trans('navs.frontend.register')) }}</li>--}}
                        @else

                    {{--    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ access()->user()->name }} <span class="caret"></span>
                        </a>
--}}

                            <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}</li>

                            @if (access()->user()->canChangePassword())
                                <li>{{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password')) }}</li>
                            @endif

                            @permission('view-backend')
                            <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                            @endauth

                            <li>{{ link_to_route('auth.logout', trans('navs.general.logout')) }}</li>

                         @endif


                <div class="clear"> </div>
            </ul>
        </div>
        <div class="clear"> </div>
        <!---End-top-nav---->
    </div>
</div>
