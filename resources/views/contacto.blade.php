@extends('tema.usuario')

@section('content')



 <div class="reservation_banner">

    <div class="main_title">Contacto</div>

    <div class="divider"></div>

   </div> 



<div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>







<div class="container">

<div class="spacer">

<div class="row contact">

  <div class="col-lg-6 col-sm-6 ">





  <h2>Respondemos Inmediatamente</h2>

  <p>Ingrese todos los datos para resolver cualquier duda importante que tenga.</p>
      @php ($mensajeEnviado = isset($_REQUEST['envio']))
      @if($mensajeEnviado == 'true')
          <div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <center>
                  <i class="glyphicon glyphicon-ok-sign" style="font-size: 30px"></i>
                  <br>
                  Se envió el mensaje correctamente
              </center>
          </div>
      @endif
      <br>
    <form action="enviarCorreo" method="get">
        <div class="form-group">
            <label class="sr-only" for="email">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingresar Nombre">
        </div>
        <div class="form-group">
            <label class="sr-only" for="email">Email:</label>
            <input type="text" class="form-control" name="email" placeholder="Ingresar E-mail">
        </div>
        <div class="form-group">
            <label class="sr-only" for="pwd">Telefono:</label>
            <input type="text" class="form-control" name="telefono" placeholder="Ingresar Telefono">
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="5" name="mensaje" placeholder="Comente aquí!!"></textarea>
        </div>
        <center>
            <button type="submit" class="btn btn-primary btn-normal btn-inline">Enviar</button>
        </center>
    </form>



          





                

        </div>

  <div class="col-lg-6 col-sm-6 ">

  <div class="well"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15669.342965869335!2d-74.79116528041273!3d10.937991233447562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef5cd5f42de465f%3A0x40e559f70400e795!2sCl.+19+%2339-32%2C+Soledad%2C+Barranquilla%2C+Atl%C3%A1ntico%2C+Colombia!5e0!3m2!1ses!2ses!4v1486738512203"></iframe></div>

  </div>

</div>

</div>

</div>





<div class="clearfix hidden-xs" style="width:100%; height:60px;"></div>

@endsection





