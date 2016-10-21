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
                    <div class="panel-title"><h2>Detalle Equipo</h2></div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    @foreach($equipo as $equipo)
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <thead>
                            <tr>
                                <th>Editar</th>
                                <th>Rol</th>
                                <th>Nombre</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($jugadores != null)
                                @foreach($jugadores as $jugador)
                                    <tr class="odd gradeX" id="{{$jugador->cedula}}" >
                                        <td><a href="{{ route('detailUser', array('id' => $jugador->cedula)) }}"><button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</button></a></td>
                                            @if($usus_equi_uni!=null)
                                                @foreach($usus_equi_uni as $usu_equi_uni)
                                                    @if($usu_equi_uni->fk_usuario == $jugador->cedula)
                                                        <td class="center">{{$usu_equi_uni->rol_equipo}}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        <td class="center">{{ $jugador->primer_nombre.' '.$jugador->primer_apellido.' '.$jugador->segundo_apellido}}</td>
                                        <td><a href="{{ route('deleteUserFromTeam', array('cedula_usuario' => $jugador->cedula, 'id_equipo' => $equipo->id_equipo)) }}"  id="dialog"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</button></a></td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <br>
                    {!!Form::open(array('url'=>'updateTeam', 'method'=>'post','id'=>'formulario_update'))!!}
                        <input type="hidden" name="representante" id="representante" value="0"/>
                        <input type="hidden" name="id_equipo" id="id_equipo" value="{{$equipo->id_equipo}}"/>
                        <div class="content-wrap">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre..." name="nombre_equipo" value="{{ $equipo->nombre_equipo }}">
                                <br>
                                <label for="">Disciplina</label>
                                <select name="id_disciplina" id="id_disciplina" class="form-control">
                                    @foreach($disciplinas as $disciplina)
                                        @if($equipo->nombre_disciplina == $disciplina->nombre_disciplina)
                                            <option value="{{$disciplina->id_disciplina}}" selected>{{$disciplina->nombre_disciplina}}</option>
                                        @else
                                            <option value="{{$disciplina->id_disciplina}}">{{$disciplina->nombre_disciplina}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <br>
                                <label for="">Categoría</label>
                                <select name="genero_equipo" id="genero_equipo" class="form-control">
                                    @if($equipo->genero_equipo == 'M')
                                        <option value="M" selected>Masculino</option>
                                        <option value="F">Femenino</option>
                                    @else
                                        <option value="M">Masculino</option>
                                        <option value="F" selected>Femenino</option>
                                    @endif
                                </select>
                                <br>
                                <label for="">Universidad</label>
                                <select name="id_universidad" id="id_universidad" class="form-control">
                                    @foreach($universidades as $univ)
                                        @if($equipo->acronimo == $univ->acronimo)
                                            <option value="{{$univ->id_universidad}}" selected>{{$univ->acronimo}}</option>
                                        @else
                                            <option value="{{$univ->id_universidad}}">{{$univ->acronimo}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <br>
                                <br>
                                <input type="submit" class="btn btn-primary" value="Guardar Cambios en Equipo" >
                            </div>
                        </div>

                    {!! Form::close() !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop
<script>
    function evaluarRepresentante(cedula){
        $('#representante').val(cedula);
        //alert($('#representante').val());
    }
</script>
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