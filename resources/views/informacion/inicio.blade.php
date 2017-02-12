@extends('tema.administrador')

@section('content')
    <div class="container">
        <center>
            <img src="{{asset('tema/images/logo.png')}}">
            <br>
            <p>Bienvenidos al panel administrativo de información donde podran actualizar los datos necesarios</p></center><br>


        <div class="row">

            <div class="col-md-12">

                <div class="form-horizontal">
                    <div class="form-group">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="idInformacion" value="{{$informacionPagina[0]['id']}}">
                        <label class="control-label col-sm-2" for="email">Telefono:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="telefono" placeholder="Ingresar Numero Telefonico" value="{{$informacionPagina[0]['telefono']}}">
                        </div>
                        <label class="control-label col-sm-2" for="pwd">Correo de contacto:</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" id="correo" placeholder="Ingrese su correo" value="{{$informacionPagina[0]['correo_contacto']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Direccion:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="direccion" placeholder="Ingrese su direccion" value="{{$informacionPagina[0]['direccion']}}">
                        </div>
                        <label class="control-label col-sm-2" for="email">Ciudad:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="ciudad" placeholder="Ingrese su ciudad" value="{{$informacionPagina[0]['ciudad']}}">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-4"> <div class="panel panel-primary">
                                <div class="panel-heading" style="background-color: #e86850;">Quienes somos</div>
                                <div class="panel-body"><textarea style="width: 100%;" id="quienesSomos" rows="5" cols="41" placeholder="Escribe aquí quienes somos">{{$informacionPagina[0]['nosotros']}}</textarea></div>
                            </div>
                        </div>
                        <div class="col-sm-4"> <div class="panel panel-primary">
                                <div class="panel-heading" style="background-color: #e86850;">Que hacemos</div>
                                <div class="panel-body"><textarea style="width: 100%;" id="queHacemos" rows="5" cols="41" placeholder="Escribe aquí que hacemos">{{$informacionPagina[0]['que_hacemos']}}</textarea></div>
                            </div>
                        </div>
                        <div class="col-sm-4"> <div class="panel panel-primary">
                                <div class="panel-heading" style="background-color: #e86850;">Misión</div>
                                <div class="panel-body"><textarea style="width: 100%;" id="mision" rows="5" cols="41" placeholder="Escribe aquí la mision">{{$informacionPagina[0]['mision']}}</textarea></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-4"> <div class="panel panel-primary">
                                <div class="panel-heading" style="background-color: #e86850;">Visión</div>
                                <div class="panel-body"><textarea style="width: 100%;" id="vision" rows="5" cols="41" placeholder="Escribe aquí la vision">{{$informacionPagina[0]['vision']}}</textarea></div>
                            </div></div>
                        <div class="col-sm-4"> <div class="panel panel-primary">
                                <div class="panel-heading" style="background-color: #e86850;">Valores</div>
                                <div class="panel-body"><textarea style="width: 100%;" id="valores" rows="5" cols="41" placeholder="Escribe aquí los valores">{{$informacionPagina[0]['valores']}}</textarea></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mensaje"></div>

                <center>  <a href="{{asset('administrador/inicio')}}"><button class="btn btn-danger">Regresar</button></a> <button type="submit" class="btn btn-danger" onclick="actualizar()">Actualizar Informacion</button></center>

            </div>
        </div>
    </div>
    <br>
    <br>
    <script type="text/javascript" src="{{asset('js/informacion/informacion.js')}}"></script>
@endsection