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
                                    <input class="form-control" type="number" placeholder="cédula" name="cedula" value="{{ $user->cedula }}">
                                    <br>
                                    <input class="form-control" type="text" placeholder="primer nombre" name="primer_nombre" value="{{$user->primer_nombre}}">
                                    <br>
                                    <input class="form-control" type="text" placeholder="primer apellido" name="primer_apellido" value="{{$user->primer_apellido}}">
                                    <br>
                                    <input class="form-control" type="text" placeholder="universidad" name="universidad" value="Universidad">
                                    <br>
                                    <input class="form-control" type="email" placeholder="correo" name="correo" value="{{ $user->correo }}">
                                    <br>
                                    {!!Form::label('Género: ', null, array('style'=>'font-size:14px;'))!!}
                                    @if( $user->sexo == 'm')
                                    {!!Form::label('M', null, array('style'=>'font-size:14px;'))!!}  {!!Form::radio('sexo', 'm', array('class'=>'genero', 'style' =>'margin-left: 4px; margin-right: 4px;','checked'))!!}
                                    {!!Form::label('F', null, array('style'=>'font-size:14px;'))!!}  {!!Form::radio('sexo', 'f', array('class'=>'genero',  'style' =>'margin-left: 4px; margin-right: 4px;'))!!}
                                    @else
                                     {!!Form::label('M', null, array('style'=>'font-size:14px;'))!!}  {!!Form::radio('sexo', 'm', array('class'=>'genero',  'style' =>'margin-left: 4px; margin-right: 4px;'))!!}
                                     {!!Form::label('F', null, array('style'=>'font-size:14px;'))!!}  {!!Form::radio('sexo', 'f', array('class'=>'genero',  'style' =>'margin-left: 4px; margin-right: 4px;', 'cheched'))!!}
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