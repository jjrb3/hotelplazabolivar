<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Roah Single Page - Bootstrap Theme</title>

	<!-- CSS includes -->
	<link href="{{asset('tema/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet" type="text/css">
	<link href="{{asset('tema/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('tema/css/theme.css')}}" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
</head>
<body>

<!-- Navbar -->

	

		
	  <!--header navbar LOGO -->
		<div class="text-center" id="logo">
			  <a href="inicio" ><img class="img-responsive" src="tema/images/logo.png" alt="logo"/></a>
		</div>
	  <!-- TOOGLE MAIN NAVIGATION -->
		<div class="navbar-header ">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		</div>

	  <!--  MAIN NAVIGATION -->
		<div class="collapse navbar-collapse" id="main-navigation">
		  <div class="container">

		  <ul class="nav nav-justified nav-pills">
			  <li><a href="inicio">Inicio</a></li>
			  <li><a href="nosotros">Nosotros</a></li>
		  
					<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown">Habitaciones<b class="caret"></b></a>
							<ul class="dropdown-menu">
								@foreach ($tipoHabitacion as $lista)
									<li><a href="habitaciones?tipoHabitacion={{$lista['id']}}">{{$lista['nombre']}}</a></li>
								@endforeach
							</ul>
						</li>
			  <li><a href="contacto">Contacto</a></li>
			  <li><a href="ingresar">Ingresar</a></li>
		  </ul>
		  </div>
		</div>
<!--header navbar END -->



<!-- contenido -->

	@yield('content')

<!-- contenido -->

<footer id="subfooter" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<p style="font-size:18px;color: white;">RECEIVE OUR NEWSLETTER</p><hr>
				<p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
			<div class="col-md-4">
				<p style="font-size:18px;color: white;">Nuestra Hubicación</p><hr>
				<p style="color: white;"><iframe width="100%" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15669.342965869335!2d-74.79116528041273!3d10.937991233447562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef5cd5f42de465f%3A0x40e559f70400e795!2sCl.+19+%2339-32%2C+Soledad%2C+Barranquilla%2C+Atl%C3%A1ntico%2C+Colombia!5e0!3m2!1ses!2ses!4v1486738512203"></iframe></p>
			</div>
			<div class="col-md-4">
				<p style="font-size:18px;color: white;">CONTACTO</p><hr>
				<p>
					<div class="input-group">
					<p style="color: white;"><span class="fa fa-globe"></span>&nbsp;&nbsp;&nbsp;calle 19#2.34 Barranquilla/Colombia</p>
				<p style="color: white;"><span class="fa fa-phone"></span>&nbsp;&nbsp;&nbsp; 3049860 - (+57) 3148189755</p>
				<p style="color: white;"><span class="fa fa-envelope"></span>&nbsp;&nbsp;&nbsp;<a style="color: white;" href="mailto:mail@example.com">hplazabolivar@gmail.com</a></p>
				</p>
				<p><br /></p>
				<p>
					<a style="color: white;" class="fa fa-twitter footer-socialicon" target="_blank" href="https://twitter.com/"></a>
					<a style="color: white;" class="fa fa-facebook footer-socialicon" target="_blank" href="https://www.facebook.com/HotelPlazaB/"></a>
				  <!--  <a style="color: white;" class="fa fa-google-plus footer-socialicon" target="_blank" href="https://plus.google.com/"></a>
					<a style="color: white;" class="fa fa-linkedin footer-socialicon" target="_blank" href="https://plus.google.com/"></a>  -->
				</p>
			</div>
		</div>
	</div>
</footer>
 <div class="container"><div class="row">
			<div class="col-md-12">
			 
			</div>
		</div></div>
		
<footer id="footer" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				
			</div>
			<div class="col-md-4">
				<p>Create By <a href="#" title="Shield UI">Stids.net</as></p>
			</div>
		</div>
	</div>
</footer>

<script src="{{asset('tema/js/jquery.min.js')}}"></script>
<script src="{{asset('tema/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('tema/js/jquery.mixitup.min.js')}}"></script>
<link href="{{asset('tema/css/magnific-popup.css')}}" rel="stylesheet">
<script src="{{asset('tema/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('tema/js/theme.js"></script>')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script type="text/javascript">
	jQuery(function($) {
		// Mix It Up Gallery and Magnific Popup setup
		$('.container-gallery').mixItUp();
		$('.container-gallery').magnificPopup({
			delegate: 'a',
			type: 'image'
		});

		// Google Maps setup
		var googlemap = new google.maps.Map(
			document.getElementById('googlemap'),
			{
				center: new google.maps.LatLng(44.5403, -78.5463),
				zoom: 8,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
		);
	});
</script>

</body>
</html>
