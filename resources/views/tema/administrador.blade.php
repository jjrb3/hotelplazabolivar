<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Roah Single Page - Bootstrap Theme</title>

	<!-- CSS includes -->
	<link href="{{asset('tema/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet" type="text/css">
	<link href="{{asset('tema/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('tema/css/theme.css')}}" rel="stylesheet">
     <link href="{{asset('tema/css/administrador.css')}}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hola Alvaro</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>


  @yield('content')


<script src="{{asset('tema/js/jquery.min.js')}}"></script>
<script src="{{asset('tema/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="j{{asset('tema/s/jquery.mixitup.min.js')}}"></script>
<link href="{{asset('tema/css/magnific-popup.css')}}" rel="stylesheet">
<script src="{{asset('tema/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('tema/js/theme.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js')}}"></script>



</body>
</html>
