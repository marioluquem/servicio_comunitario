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
                    <div class="panel-title"><h2>Detalle Universidad</h2></div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    {!!Form::open(array('url'=>'updateUniv', 'method'=>'post','id'=>'formulario_update'))!!}
                    @foreach($data as $univ)
                        <div class="content-wrap">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre..." name="nombre" value="{{ $univ->nombre }}">
                                <br>
                                <label for="">Acrónimo</label>
                                <input class="form-control" type="text" placeholder="Acrónimo..." name="acronimo" value="{{$univ->acronimo}}">
                                <br>
                                <label for="">Cód. Inscripción</label>
                                <input class="form-control" type="text" placeholder="Código de Inscripción..." name="codigo_inscripcion" value="{{$univ->codigo_inscripcion}}">
                                <br>
                                <label for="">Dirección</label>
                                <input class="form-control" type="text" placeholder="Dirección..." name="direccion" value="{{$univ->direccion}}">
                                <br>
                                <label for="">Rif</label>
                                <input class="form-control" type="text" placeholder="Rif......" name="rif" value="{{$univ->rif}}">
                                <br>
                                <input type="submit" class="btn btn-primary" value="Guardar Cambios">
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