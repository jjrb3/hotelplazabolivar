@extends('tema.usuario')
@section('content')


 <div class="reservation_banner">
    <div class="main_title">{{$habitaciones['tipoHabitacion']}}</div>
    <div class="divider"></div>
   </div> 

<div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>

  <div class="container">


    @if (isset($habitaciones['habitacion']))
      @foreach ($habitaciones['habitacion'] as $listaHabitacion)

        <div class="card">
          <div class="container-fliud">
            <div class="wrapper row">
              <div class="preview col-md-6">


                <div class="preview-pic tab-content">
                    @php ($cnt = 0)
                    @foreach($habitaciones['imagenes'][$listaHabitacion['id']] as $imagen)
                        @php ($cnt++)
                        @if ($cnt == 1)
                            <div class="tab-pane active" id="pic-{{$cnt}}"><img src="recursos/imagen_habitacion/{{$imagen['ruta']}}" /></div>
                        @else
                            <div class="tab-pane" id="pic-{{$cnt}}"><img src="recursos/imagen_habitacion/{{$imagen['ruta']}}" /></div>
                        @endif
                    @endforeach
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                    @php ($cnt = 0)
                    @foreach($habitaciones['imagenes'][$listaHabitacion['id']] as $imagen)
                        @php ($cnt++)
                        @if ($cnt == 1)
                            <li class="active"><a data-target="#pic-{{$cnt}}" data-toggle="tab"><img src="recursos/imagen_habitacion/{{$imagen['ruta']}}" /></a></li>
                        @else
                            <li><a data-target="#pic-{{$cnt}}" data-toggle="tab"><img src="recursos/imagen_habitacion/{{$imagen['ruta']}}" /></a></li>
                        @endif
                    @endforeach
                </ul>

              </div>
              <div class="details col-md-6">
                <h3 class="product-title">{{$listaHabitacion['nombre']}}</h3>
                <div class="rating">
                  <div class="stars">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>  <p >Por solo: <span>${{number_format($listaHabitacion['valor'])}}</span></p>
                  </div>
                </div>
                <p class="product-description">{{$listaHabitacion['descripcion']}}</p>
                <h4>Especificaciones</h4>
                <p class="vote"><strong>Numero de personas permitidas:</strong>
                    @for($i=0;$i<$listaHabitacion['cantidad_adultos'];$i++)
                        <i class="fa fa-male"> </i>
                    @endfor
                    @for($i=0;$i<$listaHabitacion['cantidad_menores'];$i++)
                        <i class="fa fa-child"> </i>
                    @endfor
                </p>

                <p class="vote"><strong>Incluye:</strong>
                    <ul>
                      @foreach($habitaciones['servicio'][$listaHabitacion['id']] as $servicio)
                          <li>{{$servicio['servicio']}} <i class="{{$servicio['icono_servicio']}}"></i></li>
                      @endforeach
                  </ul>
                </p>
                <div class="action">
                  <!-- <button  class="add-to-cart btn btn-default" type="button">Reservar </button>  -->
                  <a href="reserva?id={{$listaHabitacion['id']}}" title="Online Reservation" class="btn btn-primary btn-normal btn-inline">Reservar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @else
        <br>
        <br>
          <div style="text-align: center;font-size: 22px">No se encontraron resultados para la busqueda...</div>
    @endif

  </div>

<div class="clearfix hidden-xs" style="width:100%; height:60px;"></div>
@endsection
