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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
@stop

@include('alerts.success')
@include('alerts.errors')

@section('content')
<div class="col-md-10">
    <div class="content-box-large">
        <div class="panel-title col-md-offset-4"><h2>Nuevo Equipo</h2></div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-1">
                <div class="row">
                    <div class="box">
                        <div class="content-wrap">
                            <form action="createTeam" method="post" enctype="multipart/form-data" id="formulario_equipo">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="form-group">

                                    <label class="control-label" style="font-size:14px;">Universidad:</label>
                                    <select name="id_universidad" id="id_universidad" class="form-control">
                                        @foreach($univ as $univ)
                                        <option value="{{$univ->id_universidad}}">{{$univ->acronimo}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label class="control-label" style="font-size:14px;">Disciplina:</label>
                                    <select name="id_disciplina" id="id_disciplina" class="form-control">
                                        @foreach($disciplinaNombre as $disciplina)
                                            <option value="{{$disciplina->id_disciplina}}">{{$disciplina->nombre_disciplina}}</option>
                                            @endforeach
                                    </select>
                                    <br>
                                    <label class="control-label" style="font-size:14px;">Categoria:</label>
                                    <select name="genero" id="genero" class="form-control">
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                    <br>
                                    <label class="control-label" style="font-size:14px;">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre...">
                                    <br>

                                    <input type="submit" class="btn btn-primary" value="Crear Equipo" >

                                </div>
                            </form>
                        </div>
                    </div>
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
<script src="js/validacion_formulario.js"></script>
@stop





