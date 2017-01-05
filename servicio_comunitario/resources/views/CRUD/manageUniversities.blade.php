@extends('layouts.main')

@section('includesHead')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- jQuery UI -->
<link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

<!-- Bootstrap -->
<!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- styles -->
<!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
<link href="css/styles.css" rel="stylesheet">
{!! Html::style('css/estilos.css') !!}
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

@stop

@include('alerts.success')
@include('alerts.errors')

@section('content')
<div class="col-md-10">
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title"><h2>Universidades</h2></div>
        </div>
        <div class="panel-body">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                <tr>
                    <th>Editar</th>
                    <th>Nombre</th>
                    <th>Acrónimo</th>
                   <!-- <th>Cód. Inscripción</th> -->
                    <th>Dirección</th>
                    <th>Rif</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $univ)
                <tr class="odd gradeX" id="{{$univ->id_universidad}}" >
                    <td><a href="{{ route('detailUniv', array('id_universidad' => $univ->id_universidad)) }}"><button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button></a></td>
                    <td class="center">{{ $univ->nombre_universidad }} <br> <img src="{{ asset('images/'.$univ->acronimo.'/'.$univ->imagen_universidad) }}" height="100px" width="200px"></td>
                    <td class="center">{{ $univ->acronimo}}</td>
                  <!--  <td class="center">{{ $univ->codigo_inscripcion}}</td> -->
                    <td> {{ $univ->direccion_universidad }}</td>
                    <td class="center">{{ $univ->rif_universidad}} </td>
                    <td><a href="{{ route('deleteUniv', array('id_universidad' => $univ->id_universidad)) }}"  id="dialog"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
<script>

    /*
     $( "#dialogWindow" ).dialog({
     autoOpen: false,
     });
     $("#dialog").click( function() {
     $("#dialogWindow").dialog({
     width: 600,
     modal: true,
     buttons: [
     {
     text: "Si",
     click: function () {
     $(this).dialog("close");
     }
     },
     {
     text: "No",
     click: function () {
     $(this).dialog("close");
     }
     }
     ]
     });
     });*/



</script>
@section('includes')
<link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
<script src="js/bootstrap.min.js"></script>

<!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

<!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
<script src="vendors/datatables/dataTables.bootstrap.js"></script>

<!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
<script src="js/custom.js"></script>
<!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
<script src="js/tables.js"></script>
@stop