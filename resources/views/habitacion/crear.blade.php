@extends('tema.administrador')

@section('content')
    <div class="container">
        <center><img src="{{asset('tema/images/logo.png')}}"><br>
            <p>Bienvenidos al panel administrativo de usuario donde podran consultar, crear, editar y dar de baja la información necesaria</p></center><br>


        <div class="row">

            <div class="col-md-12">

                <div class="form-horizontal">
                    <form id="fomulario">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="estado">Tipo habitación:</label>
                            <div class="col-sm-3">
                                <select id="tipoHabitacion" name="tipoHabitacion" class="form-control">
                                    <option value="">Tipo de habitación</option>
                                    @foreach ($tipoHabitacion as $lista)
                                        <option value="{{$lista['id']}}">{{$lista['nombre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="control-label col-sm-2">Nombre:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Valor:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="valor" name="valor">
                            </div>
                            <label class="control-label col-sm-2">Valor Oferta:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="valorOferta" name="valorOferta">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Cantidad Habitaciones:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="cantidadHabitacion" name="cantidadHabitacion">
                            </div>
                            <label class="control-label col-sm-2">Dirección:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="direccion" name="direccion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Cantidad de Adultos:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="cantidadAdultos" name="cantidadAdultos" >
                            </div>
                            <label class="control-label col-sm-2">Cantidad de Menores:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="cantidadMenores" name="cantidadMenores">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Hora de Entrada:</label>
                            <div class="col-sm-3">
                                <input type="time" class="form-control" id="horaEntrada" name="horaEntrada" >
                            </div>
                            <label class="control-label col-sm-2">Hora de Salida:</label>
                            <div class="col-sm-3">
                                <input type="time" class="form-control" id="horaSalida" name="horaSalida">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">GPS latitud:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="gpsLatitud" name="gpsLatitud" >
                            </div>
                            <label class="control-label col-sm-2">GPS altitud:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="gpsAltitud" name="gpsAltitud">
                            </div>
                        </div>
                        <center>
                            <textarea name="descripcion" rows="5" cols="81" id="descripcion"></textarea>
                        </center>
                    </form>
                    <center>
                        <br>
                        <a href="{{asset('administrador/habitacion/inicio')}}">
                            <button class="btn btn-default" style="color:grey">Regresar</button>
                        </a>
                        <button class="btn btn-danger" onclick="crearActualizar('registrar')">Crear</button>
                        <br>
                    </center>
                </div>
            </div>
            <div class="col-md-12">
                <br>
                <div id="mensaje"></div>
            </div>

        </div>
        <br>
    </div>
    <script type="text/javascript" src="{{asset('js/habitacion/habitacion.js')}}"></script>
    <script>buscar()</script>
@endsection