@extends('tema.usuario')

@section('content')
    <div style="background: url('tema/images/individual2.jpg'); height: 100%;background-repeat: no-repeat; background-size: 100% 100%;">
        <div  class="container">
            <div class="row">
                <div class="col md-12 col-lg-4 col-md-offset-4">
                    <center>
                        <div class="card card-container form">
                            <img id="profile-img" class="profile-img-card" src="tema/images/dibujo.png" />
                            <input type="text" id="usuario" class="form-control" placeholder="Usuario" required autofocus>
                            <input type="password" id="clave" class="form-control" placeholder="Contraseña" required>
                            <!-- Se habilitará mas adelante
                            <div id="remember" class="checkbox">
                                <label>
                                    <input type="checkbox" value="remember-me"> Recordarme
                                </label>
                            </div>-->
                            <button class="btn btn-lg btn-success btn-block btn-signin" onclick="verificarIngreso()">Iniciar Sesión</button>
                            <!-- Se habilitará mas adelante
                            <a href="#" class="forgot-password">
                                Recordar contraseña?
                            </a>-->
                            <br>
                            <div id="mensaje"></div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript" src="{{asset('js/ingresar.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>

@endsection
