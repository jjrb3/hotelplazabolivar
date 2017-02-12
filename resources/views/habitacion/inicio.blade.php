@extends('tema.administrador')
@section('content')

    <div class="text-center" id="logo">
          <a href="#" ><img class="img-responsive" src="{{asset('tema/images/logo.png')}}" alt="logo"/></a>
    </div>
    <center>
        <p>Bienvenidos al panel administrativo de usuario donde podran consultar, crear, editar y dar de baja la información necesaria</p></center><br>
    </center>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="buscar" placeholder="Digitar nombre">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger" onclick="buscar()">Buscar</button>
                    <a href="crear"><button class="btn btn-danger">Crear</button></a>
                </div>
                <br>
                <div id="mensaje"></div>
                <br>
                <div class="panel panel-red">
                    <div class="panel-heading">Listado de habitacion</div>
                    <div id="tabla">
                    </div>
                </div>
                <center>
                    <div>
                        <ul class="pagination" id="paginacion">
                        </ul>
                    </div>
                    <a href="{{asset('administrador/inicio')}}"><button type="submit" class="btn btn-danger">Regresar</button></a>
                </center>
            </div>
        </div>
    </div>
    <input type="hidden" id="ruta" value="{{asset('')}}">
    <script type="text/javascript" src="{{asset('js/habitacion/habitacion.js')}}"></script>
    <script>buscar()</script>

@endsection