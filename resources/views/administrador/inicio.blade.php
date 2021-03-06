@extends('tema.administrador')

@section('content')

    <div class="text-center" id="logo">
          <a href="#" ><img class="img-responsive" src="{{asset('tema/images/logo.png')}}" alt="logo"/></a>
    </div>

    <center>
        <p>
            Bienvenidos al panel administrativo donde podran editar sus imagenes y la información necesaria
        </p>
        Para editar textos o imagenes dirigirse a los paneles que estan en la parte inferior y hacer click sobre ellos
    </center>
    <br>

    <img class="img-responsive" src="{{asset('tema/images/fotoadmin.png')}}" alt="logo"/>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="usuario/inicio">
                    <div class="col-sm-4"> <div class="panel panel-red">
                            <div class="panel-heading">USUARIOS</div>
                            <div class="panel-body">Para agregar usuarios hacer click sobre este panel</div>
                        </div>
                    </div>
                </a>

                <a href="informacion/inicio">
                    <div class="col-sm-4"> <div class="panel panel-red">
                            <div class="panel-heading">INFORMACIÓN DE LA PAGINA</div>
                            <div class="panel-body">Para cambiar toda la información de la pagina hacer click sobre este panel</div>
                        </div>
                    </div>
                </a>

                <a href="habitacion/inicio">
                    <div class="col-sm-4"> <div class="panel panel-red">
                            <div class="panel-heading">HABITACIONES</div>
                            <div class="panel-body">Para cambiar imagenes, estados y valores hacer click sobre este panel</div>
                        </div>
                    </div>
                </a>

                <a href="reserva/inicio">
                    <div class="col-sm-4"> <div class="panel panel-red">
                            <div class="panel-heading">RESERVAS</div>
                            <div class="panel-body">Aquí podrá ver las reservas y eliminar estas</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection



