@extends('tema.administrador')
@section('content')
   
      <!--header navbar LOGO -->
        <div class="text-center" id="logo">
              <a href="#" ><img class="img-responsive" src="images/logo.png" alt="logo"/></a>
        </div>

             <center>
              <p>Bienvenidos al panel administrativo de usuario donde podran consultar, crear, editar y dar de baja la información necesaria</p></center><br>
        </center><br>
      <!-- TOOGLE MAIN NAVIGATION -->

      <!--  MAIN NAVIGATION -->
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
                <div id="mensaje"> </div>
                <br>
                <div class="panel panel-red">
                    <div class="panel-heading">Listado de Bienes & Inmuebles</div>
                    <div id="tabla">
                     <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
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
            <!-- /.row -->
      </div>
<!--header navbar END -->

@endsection