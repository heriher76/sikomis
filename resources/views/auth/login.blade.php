@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6" style="background-color: white; min-height: 91vh;">

        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding: 2vw 7vw; margin-top: 5vw;">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" style="border-radius: 10%; min-height: 40vh; max-height: 40vh;">
            <div class="item active">
              <img src="{{ url('slider/a.jpeg') }}" alt="Slider Pertama" style="height: 40vh; width: 100%;">
            </div>

            <div class="item">
              <img src="{{ url('slider/b.jpg') }}" alt="Slider Kedua" style="height: 40vh; width: 100%;">
            </div>

            <div class="item">
              <img src="{{ url('slider/c.jpeg') }}" alt="Slider Ketiga" style="height: 40vh; width: 100%;">
            </div>
          </div>

          <!-- Left and right controls -->
          <div class="hidden-sm hidden-md hidden-lg">
              <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="border-radius: 100%; margin: 30vw 7vw;">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next" style="border-radius: 100%; margin: 30vw 7vw;">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>

          <div class="hidden-xs">
              <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="border-radius: 100%; margin: 11vw 7vw;">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next" style="border-radius: 100%; margin: 11vw 7vw;">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>

        </div>

        <img class="hidden-xs" src="{{ url('images/logo_hmi.png') }}" style="width: 25%; position: absolute; left: 45vw; top: 5vw; z-index: 9999;" alt="">

        <img class="hidden-sm hidden-md hidden-lg" src="{{ url('images/logo_hmi.png') }}" style="width: 25vw; position: absolute; left: 41vw; top: 130vw; z-index: 9999;" alt="">

        <center class="hidden-xs">
            <h3 style="padding: 7vw; bottom: 0vw; color: #0F2C13; position: absolute;">Mari bergabung di HMI, untuk membina diri agar menjadi lebih baik yang berlandaskan Iman, Ilmu, dan Amal.</h3>
        </center>

        <center class="hidden-sm hidden-md hidden-lg">
            <h3 style="padding: 0vw 7vw; padding-top: 2vw; padding-bottom: 20vw; color: #0F2C13">Mari bergabung di HMI, untuk membina diri agar menjadi lebih baik yang berlandaskan Iman, Ilmu, dan Amal.</h3>
        </center>
    </div>

    <div class="col-md-6" style="background-color: #0F2C13; min-height: 91vh;">
        <div id="frontPanel">
            <div class="hidden-xs">
                <center>
                    <h2 style="margin: 0 14vw; margin-top: 7vw; color: #D1BA91">"Strength grows in the moments when you think you can't go on but you keep going anyway."</h2>
                    <br><br>
                    <button onclick="toRegister();" class="btn btn-default" style="padding: 1vw 7vw; background-color: #D1BA91"><h4>Daftar</h4></button>
                    <br>
                    <h5 style="color: white;">Kader / KAHMI Saintek?</h5><u><a href="#" onclick="showLogin();" style="color: white;"><h5> Masuk</h5></a></u>
                    <br>
                </center>
                <p style="position: absolute; bottom: 7vw; left: 11vw; color: #D1BA91;">Berfikir Keras Lakukan dengan Cerdas</p>
            </div>

            <div class="hidden-sm hidden-md hidden-lg">
                <center style="padding-top: 7vh;">
                    <h2 style="margin: 0 14vw; margin-top: 20vh; color: #D1BA91">"Strength grows in the moments when you think you can't go on but you keep going anyway."</h2>
                    <br><br>
                    <button onclick="toRegister();" class="btn btn-default" style="padding: 1vw 7vw; background-color: #D1BA91"><h4>Daftar</h4></button>
                    <br>
                    <h5 style="color: white;">Kader / KAHMI Saintek?</h5><u><a href="#" onclick="showLogin();" style="color: white"><h5> Masuk</h5></a></u>
                    <br>
                </center>
                <p style="position: absolute; bottom: 0vh; left: 11vw; color: #D1BA91; font-size: 6vw;">Berfikir Keras Lakukan dengan Cerdas</p>
            </div>
        </div>

        <div class="loginPanel" style="display: none;">
            <div class="panel panel-default hidden-xs" style="margin: 30px 80px; margin-top: 7vw;">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <h4 for="email" class="col-md-4 control-label">E-Mail</h4>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                <!-- @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <h4 for="password" class="col-md-4 control-label">Password</h4>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <!-- @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <h4>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #0F2C13">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #0F2C13">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        <h5 style="color: #0F2C13; cursor: pointer;" onclick="showFront();">Daftar Akun?</h5>
                    </form>

                    <p style="position: absolute; bottom: 7vw; left: 11vw; color: #D1BA91;">Berfikir Keras Lakukan dengan Cerdas</p>
                </div>
            </div>
        </div>

        <div class="loginPanel hidden-sm hidden-md hidden-lg" style="display: none; padding-top: 30vw; padding-bottom: 10vw;">
            <div class="panel panel-default">
                <div class="panel-heading" style="color: #0F2C13; background-color: white;">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <h4 for="email" class="col-md-4 control-label">E-Mail</h4>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                <!-- @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <h4 for="password" class="col-md-4 control-label">Password</h4>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <!-- @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox" style="left: 5vw;">
                                    <h4>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #0F2C13">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #0F2C13">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        <h5 style="color: #0F2C13; cursor: pointer;" onclick="showFront();">Daftar Akun?</h5>
                    </form>

                    <p style="position: absolute; bottom: 0vh; left: 11vw; color: #D1BA91; font-size: 6vw;">Berfikir Keras Lakukan dengan Cerdas</p>
                </div>
            </div>
        </div>

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
    function showLogin() {
        var frontPanel = document.getElementById('frontPanel');
            frontPanel.style.display = 'none';

        let loginPanel = document.getElementsByClassName('loginPanel');
            // loginPanel.style.display = 'block';
        for (var i = 0; i < loginPanel.length; i++) {
          loginPanel[i].style.display = "block";
        }
    }
    function showFront() {
        var frontPanel = document.getElementById('frontPanel');
            frontPanel.style.display = 'block';

        let loginPanel = document.getElementsByClassName('loginPanel');
            // loginPanel.style.display = 'none';
        for (var i = 0; i < loginPanel.length; i++) {
          loginPanel[i].style.display = "none";
        }
    }
</script>
@endsection
