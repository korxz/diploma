<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <nav class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </nav>
            @endif
        </div>
        <div class="content container">
            <div class="row">
                <h1>
                    Mobilna aplikacija za prikazovanje nevarnih cestnih odsekov
                </h1>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h3>Zadnja nesreča</h3>
                    <div id="map"></div>
                </div>

                <div class="col-sm-6">
                    <h3>Najbolj nevaren odsek</h3>
                    <p>{{ $most_dangerous[0]->kraj_nesrece }}</p>
                    <p>Število nesreč: {{ $most_dangerous[0]->counter }}</p>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    function initMap() {
        var x = {!! json_encode($last_x) !!};
        var y = {!! json_encode($last_y) !!};
        var last_accident = {lat:  parseInt(x), lng: parseInt(y)};
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 9,
        center: last_accident
      });
      var marker = new google.maps.Marker({
        position: last_accident,
        map: map
      });
    }
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGymRUv5KQQCjSckgsET9g4BYicyYhDbQ&callback=initMap">
  </script>