@extends('tema.usuario')
@section('content')
<div style="background: url(tema/images/individual2.jpg); height: 100%;
    background-repeat: no-repeat; background-size: 100% 100%;">
  

<div  class="container">
 <div class="row">
 <div class="col md-12">
    <div class="col-lg-4 col-md-offset-4 ">
     <center> <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="tema/images/dibujo.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Recordarme
                    </label>
                </div>
                <button class="btn btn-lg btn-success btn-block btn-signin" type="submit">Iniciar Sesión</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Recordar contraseña?
            </a>

        </div><!-- /card-container -->
 </div></center>
 </div>

    
 </div>
     
  </div><!-- /container -->

</div>

@endsection
