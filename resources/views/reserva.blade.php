@extends('tema.usuario')
@section('content')

<div class="reservation_banner">
    <div class="main_title">Reservas</div>
    <div class="divider"></div>
</div>

<div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>



<div class="container">
    <div class="spacer">
        <div class="row contact">
            <div class="col-lg-6 col-sm-6 ">


                <h2>INFORMACIÓN GENERAL</h2>
                <p>Favor llenar los datos generales obligatorios.</p>



                <form action="#" method="post" class="form" role="form">
                    <div class="form-group">
                        <label for="sel1">Fecha de entrada:</label>
                        <input type="date" class="form-control" id="email" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Fecha de salida:</label>
                        <input type="date" class="form-control" id="email" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="sel1">titulo:</label>
                        <select class="form-control" id="sel1">
                            <option>Sr</option>
                            <option>Sra</option>
                            <option>Srta</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sel1">Numero de personas:</label>
                        <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>

                </form>

            </div>



            <div class="col-lg-6 col-sm-6 ">


                <h2>INFORMACIÓN PERSONAL</h2>
                <p>Favor llenar los datos personales.</p>



                <form action="#" method="post" class="form" role="form">
                    <div class="form-group">
                        <label for="sel1">Ingrese sus nombres:</label>
                        <input type="text" class="form-control" id="email" placeholder="Nombres">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Ingrese sus apellidos:</label>
                        <input type="text" class="form-control" id="email" placeholder="Apellidos">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Ingrese su telefono:</label>
                        <input type="text" class="form-control" id="email" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="sel1">Ingrese su e-mail:</label>
                        <input type="text" class="form-control" id="email" placeholder="E-mail">
                    </div>
                </form>
            </div>

            <center> <div class="col-xs-12">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Sign up</button>
                </div>
            </center>
        </div>
    </div>
</div>

@endsection