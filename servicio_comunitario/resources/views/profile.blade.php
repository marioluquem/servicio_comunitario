@extends('layouts.main')

@section('includesHead')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    {!!Html::style('https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css')!!}
            <!-- Bootstrap -->
    {!!Html::style('css/bootstrap.min.css')!!}
            <!-- styles -->
    {!!Html::style('css/styles.css')!!}
    {!! Html::style('css/estilos.css') !!}
@stop

@section('content')
    <div class="col-md-10">
        <div class="content-box-large" style="background-color: #0e90d2;">
            <h3 class="titulo">Bienvenido {{ $nombre_usuario }}</h3>
            <div class="panel-body" style="background-color: #28a0e5; ;border-radius: 10px">
                <div class="row">
                    <h4 class="subtitulo">Datos Personales:</h4>
                    <div class="col-lg-2">
                        <img src="{{asset($foto)}}"   class="img-circle imagen" height="150px" width="150px">
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-3" style="margin-top: 20px" >
                        <label for="name" class="datos">Nombres:</label><span class="datos">{{$primer_nombre." ".$segundo_nombre}}</span><br>
                        <label for="lastname" class="datos">Apellidos:</label><span class="datos">{{$primer_apellido." ".$segundo_apellido}}</span><br>
                        <label for="email" class="datos">Correo:</label><span class="datos">{{$correo}}</span><br>
                        <label for="birthday" class="datos">Fecha de nacimiento:</label><span class="datos">{{$fecha_nacimiento}}</span><br>
                        <label for="gender" class="datos">Género:</label><span class="datos">{{$sexo}}</span><br>
                    </div>
                    <div class="col-lg-4" >
                        <img src="{{asset($dni)}}"  class="imagen" height="200px" width="300px" style="border-radius: 10px">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop


    @section('includes')
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {!!Html::script('https://code.jquery.com/jquery.js')!!}
            <!-- jQuery UI -->
    {!!Html::script('https://code.jquery.com/ui/1.10.3/jquery-ui.js')!!}
            <!-- Include all compiled plugins (below), or include individual files as needed -->
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/custom.js')!!}
@stop