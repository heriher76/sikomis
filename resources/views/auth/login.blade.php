@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6" style="background-color: white;">

        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding: 2vw 7vw;">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" style="border-radius: 10%;">
            <div class="item active">
              <img src="http://thegorbalsla.com/wp-content/uploads/2018/08/Danau-Sentani-Papua-700x468.jpg" alt="Los Angeles">
            </div>

            <div class="item">
              <img src="http://thegorbalsla.com/wp-content/uploads/2018/08/Danau-Sentani-Papua-700x468.jpg" alt="Chicago">
            </div>

            <div class="item">
              <img src="http://thegorbalsla.com/wp-content/uploads/2018/08/Danau-Sentani-Papua-700x468.jpg" alt="New York">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="border-radius: 100%; margin: 11vw 7vw;">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next" style="border-radius: 100%; margin: 11vw 7vw;">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>

        </div>
        
        <img class="hidden-xs hidden-sm" src="{{ url('images/logo_hmi.png') }}" style="width: 25%; position: absolute; left: 45vw; top: 1vh; z-index: 9999;" alt="">

        <img class="hidden-sm hidden-md hidden-lg" src="{{ url('images/logo_hmi.png') }}" style="width: 25vw; position: absolute; left: 41vw; top: 60vh; z-index: 9999;" alt="">

        <center class="hidden-xs">
            <h3 style="padding: 0vw 7vw; padding-top: 2vw; color: #0F2C13">Mari bergabung di HMI, untuk membina diri agar menjadi lebih baik yang berlandaskan Iman, Ilmu, dan Amal.</h3>
        </center>

        <center class="hidden-sm hidden-md hidden-lg">
            <h3 style="padding: 0vw 7vw; padding-top: 2vw; padding-bottom: 20vw; color: #0F2C13">Mari bergabung di HMI, untuk membina diri agar menjadi lebih baik yang berlandaskan Iman, Ilmu, dan Amal.</h3>
        </center>
    </div>

    <div class="col-md-6" style="background-color: #0F2C13; min-height: 82vh;">
        <div class="hidden-xs " >
            <center>
                <h2 style="margin: 0 14vw; margin-top: 10vh; color: #D1BA91">"Strength grows in the moments when you think you can't go on but you keep going anyway."</h2>
                <br><br>
                <button onclick="toRegister();" class="btn btn-default" style="padding: 1vw 7vw; background-color: #D1BA91"><h4>Daftar</h4></button>
                <br>
                <h5 style="color: white;">Kader Saintek?</h5><a href="" style="color: grey"><h5> Masuk</h5></a>
                <br>
            </center>
            <b style="position: absolute; bottom: 0vh; left: 12vw; color: #D1BA91;">Berfikir Keras Lakukan dengan Cerdas</b>
        </div>

        <div class="hidden-sm hidden-md hidden-lg">
            <center style="padding-top: 7vh;">
                <h2 style="margin: 0 14vw; margin-top: 20vh; color: #D1BA91">"Strength grows in the moments when you think you can't go on but you keep going anyway."</h2>
                <br><br>
                <button onclick="toRegister();" class="btn btn-default" style="padding: 1vw 7vw; background-color: #D1BA91"><h4>Daftar</h4></button>
                <br>
                <h5 style="color: white;">Kader Saintek?</h5><a href="" style="color: grey"><h5> Masuk</h5></a>
                <br>
            </center>
            <b style="position: absolute; bottom: 0vh; left: 11vw; color: #D1BA91; font-size: 6vw;">Berfikir Keras Lakukan dengan Cerdas</b>
        </div>

        <!-- <div class="panel panel-default" style="margin: 30px 80px;">
            <div class="panel-heading">Login</div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
</div>
@endsection

@section('navbar')
    @include('partials.navbarLogin')
@endsection

@section('script')
<script>
    function toRegister() {
        return window.location="{{ url('/register') }}";
    }
</script>
@endsection