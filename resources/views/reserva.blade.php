@extends('tema.usuario')
@section('content')

    @php($id = $_REQUEST['id'])

    <div class="reservation_banner">
        <div class="main_title">Reservas</div>
        <div class="divider"></div>
    </div>

    <div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>



    <div class="container">
        <div class="spacer">
            <div class="row contact">
                <form id="fomulario" action="#" method="post" class="form" role="form">
                    <div class="col-lg-12 col-sm-6">
                        <div id="mensaje"></div>
                    </div>
                    <div class="col-lg-6 col-sm-6 ">

                        <h2>INFORMACIÓN PERSONAL</h2>
                        <p>Favor llenar los datos personales.</p>

                        <input type="hidden" id="idHabitacion" name="idHabitacion" value="{{$id}}">

                        <div class="form-group">
                            <label for="sel1">título:</label>
                            <select class="form-control" name="titulo" id="titulo">
                                <option value="">Seleccione un título...</option>
                                @foreach($titulo as $titulo)
                                    <option value="{{$titulo['id']}}">{{$titulo['descripcion']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sel1">Ingrese sus nombres:</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Ingrese sus apellidos:</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Ingrese su telefono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 ">

                        <h2>INFORMACIÓN GENERAL</h2>
                        <p>Favor llenar los datos generales obligatorios.</p>

                        <div class="form-group">
                            <label for="sel1">Fecha de entrada:</label>
                            <input type="date" class="form-control" name="fechaInicio" id="fechaInicio" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Fecha de salida:</label>
                            <input type="date" class="form-control" name="fechaFin" id="fechaFin" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Ingrese su e-mail:</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
                        </div>

                    </div>
                </form>
                <center>
                    <div class="col-xs-12">
                        <button id="guardar" class="btn btn-lg btn-primary btn-block" type="submit">
                            Reservar
                        </button>
                    </div>
                </center>

                <br><br>
            </div>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript" src="{{asset('js/reserva.js')}}"></script>
@endsection