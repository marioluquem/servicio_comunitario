@extends('layouts.main')

@section('includesHead')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="../css/styles.css" rel="stylesheet">
    {!! Html::style('css/estilos.css') !!}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

@stop

@include('alerts.success')
@include('alerts.errors')

@section('content')
    <div class="col-md-10">
        <div class="row">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title"><h2>Detalle Usuario</h2></div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                            {!!Form::open(array('url'=>'updateUser', 'method'=>'post','id'=>'formulario_update'))!!}
                            @foreach($data as $user)
                                <div class="content-wrap">
                                <div class="form-group">
                                    <label for="">Cédula</label>
                                    <input class="form-control" type="number" placeholder="cédula" name="cedula" value="{{ $user->cedula }}">
                                    <br>
                                    <label for="">Primer Nombre</label>
                                    <input class="form-control" type="text" placeholder="primer nombre" name="primer_nombre" value="{{$user->primer_nombre}}">
                                    <br>
                                    <label for="">Primer Apellido</label>
                                    <input class="form-control" type="text" placeholder="primer apellido" name="primer_apellido" value="{{$user->primer_apellido}}">
                                    <br>
                                    <label for="">Rol</label>
                                    <select name="rol" class="form-control">
                                        @if($user->fk_rol == 1)
                                            <option value="1" selected>Administrador</option>
                                        @else
                                            <option value="1" selected>Administrador</option>
                                        @endif
                                        @if($user->fk_rol == 2)
                                            <option value="2" selected>Director</option>
                                        @else
                                            <option value="2" >Director</option>
                                        @endif
                                        @if($user->fk_rol == 3)
                                            <option value="3" selected>Usuario común</option>
                                        @else
                                            <option value="3">Usuario común</option>
                                        @endif
                                    </select>
                                    <br>
                                    <label for="">Universidad</label>
                                    <input class="form-control" type="text" placeholder="universidad" name="universidad" value="Universidad">
                                    <br>
                                    <label for="">Correo</label>
                                    <input class="form-control" type="email" placeholder="correo" name="correo" value="{{ $user->correo }}">
                                    <br>
                                    {!!Form::label('Género: ', null, array('style'=>'font-size:14px;'))!!}
                                    @if( $user->sexo == 'm')
                                        {!!Form::label('M', null, array('style'=>'font-size:14px;'))!!}  <input type="radio" name="sexo" value="m" class="genero"  style ="margin-left: 4px; margin-right: 4px;" checked>
                                        {!!Form::label('F', null, array('style'=>'font-size:14px;'))!!}  <input type="radio" name="sexo" value="f" class="genero"  style ="margin-left: 4px; margin-right: 4px;" >
                                    @elseif ($user->sexo == 'f')
                                        {!!Form::label('M', null, array('style'=>'font-size:14px;'))!!}  <input type="radio" name="sexo" value="m" class="genero"  style ="margin-left: 4px; margin-right: 4px;" >
                                        {!!Form::label('F', null, array('style'=>'font-size:14px;'))!!}  <input type="radio" name="sexo" value="f" class="genero"  style ="margin-left: 4px; margin-right: 4px;" checked>
                                     @endif
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Guardar Cambios" onclick="javascript:validar_formulario()">
                                </div>
                                </div>
                            @endforeach
                            {!! Form::close() !!}
                    </div>
                </div>
        </div>
    </div>

@stop

@section('includes')
            <link href="../vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://code.jquery.com/jquery.js"></script>
            <!-- jQuery UI -->
            <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../js/bootstrap.min.js"></script>

            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../vendors/datatables/js/jquery.dataTables.min.js"></script>

            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../vendors/datatables/dataTables.bootstrap.js"></script>

            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../js/custom.js"></script>
            <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
            <script src="../js/tables.js"></script>
@stop