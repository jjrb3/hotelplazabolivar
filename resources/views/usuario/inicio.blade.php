@extends('tema.administrador')

@section('content')
    <div class="container">
        <center><img src="{{asset('tema/images/logo.png')}}"><br>
            <p>Bienvenidos al panel administrativo de usuario donde podran consultar, crear, editar y dar de baja la información necesaria</p></center><br>


        <div class="row">

            <div class="col-md-12">

                <form class="form-horizontal" id="fomrUsuario" action="#">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Usuarios:</label>
                        <div class="col-sm-3">
                            <input type="text" id="usuario" class="form-control" placeholder="Ingresar Usuario">
                        </div>
                        <label class="control-label col-sm-2" for="pwd">Contraseña:</label>
                        <div class="col-sm-3">
                            <input type="password" id="clave" class="form-control"placeholder="Ingrese su pass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Nombres:</label>
                        <div class="col-sm-3">
                            <input type="text" id="nombres" class="form-control"placeholder="Ingrese sus nombres">
                        </div>
                        <label class="control-label col-sm-2" for="email">Apellidos:</label>
                        <div class="col-sm-3">
                            <input type="text" id="apellidos" class="form-control" placeholder="Ingrese sus Apellidos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="email" placeholder="Ingrese su email">
                        </div>
                        <div class="col-sm-offset-2 col-sm-2">
                            <button type="submit" class="btn btn-danger">Crear Usuario</button>
                        </div>
                    </div>
                </form>
                <!-- Actualizar -->
                <div class="form-horizontal"  id="fomrUsuarioActualizar" style="display: none;">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="ruta" value="{{asset('')}}">
                    <input type="hidden" id="usuarioId" value="">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Usuarios:</label>
                        <div class="col-sm-3">
                            <input type="text" id="usuarioActualizar" class="form-control" placeholder="Ingresar Usuario">
                        </div>
                        <label class="control-label col-sm-2" for="pwd">Contraseña:</label>
                        <div class="col-sm-3">
                            <input type="password" id="claveActualizar" class="form-control"placeholder="Ingrese su pass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Nombres:</label>
                        <div class="col-sm-3">
                            <input type="text" id="nombresActualizar" class="form-control"placeholder="Ingrese sus nombres">
                        </div>
                        <label class="control-label col-sm-2" for="email">Apellidos:</label>
                        <div class="col-sm-3">
                            <input type="text" id="apellidosActualizar" class="form-control" placeholder="Ingrese sus Apellidos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="emailActualizar" placeholder="Ingrese su email">
                        </div>
                        <div class="col-sm-offset-2 col-sm-4">
                            <button class="btn btn-default" style="color:grey;" onclick="volver()">Cancelar</button>
                            <button class="btn btn-danger" onclick="actualizar()">Actualizar Usuario</button>
                        </div>
                    </div>
                </div>
                <!-- Actualizar -->
                <div id="mensaje"></div>
                <br>
                <div class="col-sm-12"> <div class="panel panel-primary">
                        <div class="panel-heading" style="background-color: red;">Listado de usuario</div>
                        <div id="tabla">
                        </div>
                    </div>
                </div>
                <center>
                    <a href="{{asset('administrador/inicio')}}"><button type="submit" class="btn btn-danger">Regresar</button></a>
                </center>
            </div>
        </div>
    </div>
    </body>
    </html>
    <script type="text/javascript" src="{{asset('js/usuario/usuario.js')}}"></script>
    <script>buscarUsuario()</script>
@endsection

