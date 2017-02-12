@extends('tema.administrador')

@section('content')
    <div class="container">
        <center><img src="{{asset('tema/images/logo.png')}}"><br>
            <p>Bienvenidos al panel administrativo de cargar imagenes donde podran subir y dar de baja a las imagenes</p></center><br>


        <div class="row">

            <div class="col-md-12">

                <div class="form-horizontal">
                    <div class="form-group">
                        <input type="hidden" id="ruta" value="{{asset('')}}">
                        <input type="hidden" value="<?=$_REQUEST['id'];?>" id="id" name="id">
                        <label class="control-label">Seleccione los servicios para esta habitación:</label>
                        <br>
                        <br>
                        <center>
                        @foreach ($servicios as $lista)
                            <input type="checkbox" id="servicios{{$lista['id']}}" name="servicios[]" value="{{$lista['id']}}">
                            <span class="{{$lista['icono']}}"></span>
                            {{$lista['nombre']}}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endforeach
                        <br>
                        <br>

                            <a href="{{asset('administrador/habitacion/inicio')}}">
                                <button type="submit" class="btn btn-danger">Regresar</button>
                            </a>
                            <button class="btn btn-danger" onclick="guardar()">Guardar</button>
                        </center>
                        <div class="col-sm-12">
                            <br>
                            <div id="mensaje"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/habitacion/servicios.js')}}"></script>
    <script>buscar();</script>
@endsection