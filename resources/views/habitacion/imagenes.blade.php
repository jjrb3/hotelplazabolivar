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
                        <form id="imagen" enctype="multipart/form-data" accept-charset="UTF-8">
                            <input type="hidden" value="<?=$_REQUEST['id'];?>" id="id" name="id">
                            <label class="control-label col-sm-2" for="email">Seleccione la imagen:</label>
                            <div class="col-sm-2">
                                <input type="file" class="form-control" id="archivo" value="Examinar" name="imagen">
                            </div>
                        </form>
                        <div class="col-sm-2" style="margin-left:-20px;">
                            <button class="btn btn-danger" onclick="guardar()">Subir</button>
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <div id="mensaje"></div>
                        </div>
                    </div>
                    <center>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="galeria">

                                </div>
                            </div>
                        </div>
                    </center>

                </div>


            </div>
        </div>
        <br>
        <center> <a href="{{asset('administrador/habitacion/inicio')}}"><button type="submit" class="btn btn-danger">Regresar</button></a>

    </div>
    <script type="text/javascript" src="{{asset('js/habitacion/imagenes.js')}}"></script>
    <script>buscar();</script>
@endsection