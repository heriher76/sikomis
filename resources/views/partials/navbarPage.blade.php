<nav class="navbar navbar-primary navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <img src="{{ url('images/logo_komisariat.png') }}" class="img-responsive" style="max-width: 8vh; float: left;" alt="">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false" style="border-color: black;">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar" style="background-color: black;"></span>
                <span class="icon-bar" style="background-color: black;"></span>
                <span class="icon-bar" style="background-color: black;"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand hidden-xs" href="{{ url('/') }}" style="color: #0F2C13; font-size: 2vw;">
                HMI KOMISARIAT SAINS & TEKNOLOGI
            </a>

            <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="{{ url('/') }}" style="color: #0F2C13; font-size: 4vw;">
                HMI Kom.Saintek
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}"><h4 style="color: #0F2C13; ">Login</h4></a></li>
                    <li><a href="{{ route('register') }}"><h4 style="color: #0F2C13; ">Register</h4></a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>