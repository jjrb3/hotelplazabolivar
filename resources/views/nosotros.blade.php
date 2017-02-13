@extends('tema.usuario')
@section('content')

 <div class="reservation_banner">
    <div class="main_title">Nosotros</div>
    <div class="divider"></div>
   </div> 

<div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>

<div class="container-about">
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="reservation_top">

          <div class="about">
          <h3 style="color: red;">Quienes Somos?</h3>
          <p style="text-align: justify;">
              {{$informacionPagina[0]['nosotros']}}
         </p>


          <h3 style="color: red;">Misión</h3>
          <p style="text-align: justify;">
              {{$informacionPagina[0]['mision']}}
          </p>
          <h3 style="color: red;">Visión</h3>
          <p style="text-align: justify;">
              {{$informacionPagina[0]['vision']}}
          </p>
  

          </div>

</div>
</div>
<div class="clearfix hidden-xs" style="width:100%; height:50px;"></div><div class="clearfix hidden-xs" style="width:100%; height:0px;"></div>
<div class="col-md-6">
  <img class="img-responsive" src="tema/images/about.jpg">
</div>
</div>



<div class="row">
  <div class="col-md-12">
    <div class="about">
     <h3 style="color: red;">Valores</h3>
          <p> {{$informacionPagina[0]['valores']}}</p>
  </div>
  </div>
</div>

</div>
</div>

<div class="clearfix hidden-xs" style="width:100%; height:60px;"></div>
@endsection


