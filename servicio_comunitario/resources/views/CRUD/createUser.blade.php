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
    <script>
        $( function() {
            $( "#fecha_nacimiento" ).datepicker({
                dateFormas: "yyyy-mm-dd",
                defaultDate:"-18y - 1m",
                changeYear: true,
                changeMonth: true,
                showAnim: "slideDown",
                showButtonPanel: true,
                showMonthAfterYear: true,
                yearRange: "1970:2030"
            });
        } );
    </script>
@stop

@include('alerts.success')
@include('alerts.errors')

@section('content')
<div class="col-md-10">
    <div class="content-box-large">
        <div class="panel-title col-md-offset-4"><h2>Nuevo Usuario</h2></div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-1">
            <div class="row">
                <div class="box">
                    <div class="content-wrap">
                        {!!Form::open(array('url'=>'register', 'method'=>'post','files'=>'true','id'=>'formulario_registro'))!!}
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            {!!Form::text('cedula', null, array('class'=>'form-control','placeholder'=>'Ingrese cédula','id'=>'cedula', 'onchange' => 'validar_campo_numerico(this.id)'))!!}
                            <br>
                            {!!Form::text('usuario', null, array('class'=>'form-control','placeholder'=>'Ingrese usuario','id'=>'usuario', 'onchange' => 'validar_caracteres_especiales(this.id)'))!!}
                            <br>
                            {!!Form::password('password', array('class'=>'form-control','placeholder'=>'Ingrese password','id'=>'password', 'onchange' => 'validar_caracteres_especiales(this.id)'))!!}
                            <br>
                            {!!Form::text('primer_nombre', null, array('class'=>'form-control','placeholder'=>'Ingrese primer nombre','id'=>'primer_nombre',  'onchange' => 'validar_campo_string(this.id)'))!!}
                            <br>
                            {!!Form::text('segundo_nombre', null, array('class'=>'form-control','placeholder'=>'Ingrese segundo nombre','id'=>'segundo_nombre',  'onchange' => 'validar_campo_string(this.id)'))!!}
                            <br>
                            {!!Form::text('primer_apellido', null, array('class'=>'form-control','placeholder'=>'Ingrese primer apellido','id'=>'primer_apellido',  'onchange' => 'validar_campo_string(this.id)'))!!}
                            <br>
                            {!!Form::text('segundo_apellido', null, array('class'=>'form-control','placeholder'=>'Ingrese segundo apellido','id'=>'segundo_apellido',  'onchange' => 'validar_campo_string(this.id)'))!!}
                            <br>
                            {!!Form::email('correo', null, array('class'=>'form-control','placeholder'=>'Ingrese dirección de correo','id'=>'correo', 'onchange' => 'validar_correo(this.id)'))!!}
                            <br>
                            {!!Form::label('Género: ', null, array('style'=>'font-size:14px;'))!!}
                            {!!Form::label('M', null, array('style'=>'font-size:14px;'))!!}  {!!Form::radio('sexo', 'M', array('class'=>'genero', 'checked'))!!}
                            {!!Form::label('F', null, array('style'=>'font-size:14px;'))!!}  {!!Form::radio('sexo', 'F', array('class'=>'genero'))!!}
                            <br>
                            <label class="control-label" style="font-size:14px;">Fecha de nacimiento:</label>
                            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">

                            <br>
                            <label class="control-label" style="font-size:14px;">Subir Foto para Nómina de Juego:</label>
                            <input id="foto" name="foto" type="file" class=" form-control file">
                            <br>
                            <label class="control-label" style="font-size:14px;">Subir imagen de Cédula de Identidad:</label>
                            <input id="dni" name="dni" type="file" class=" form-control file">
                            <br>
                            <input type="button" class="btn btn-primary" value="Crear Usuario" onclick="validar_formulario()">

                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@stop
<script>
    function validar_formulario(){
        //separamos los nombres de las imagenes de su URL para poder validar correctamente
        var split1 = $('#foto').val().split('\\');
        var nombreFoto = split1[split1.length-1].split('.')[0];
        split1 = $('#dni').val().split('\\');
        var nombreDNI = split1[split1.length-1].split('.')[0];

        //listas de campos a validar
        var listaCamposValidarVacios = [$('#cedula').val(), $('#usuario').val(), $('#password').val(), $('#primer_nombre').val(),  $('#primer_apellido').val(), $('#segundo_apellido').val(), $('#correo').val(), nombreFoto, nombreDNI];

        var listaCamposValidarCaracteres = [$('#cedula').val(), $('#usuario').val(), $('#password').val(), $('#primer_nombre').val(), $('#segundo_nombre').val(), $('#primer_apellido').val(), $('#segundo_apellido').val(), nombreFoto, nombreDNI];

        //validaciones
        var no_vacios = validar_espacios_vacios(listaCamposValidarVacios);
        var no_caracteres_especiales = validar_caracteres_especiales(listaCamposValidarCaracteres);
        var correo_ok = validar_correo('correo');

        if (no_vacios && no_caracteres_especiales && correo_ok){
            $('#formulario_registro').submit();
        }
    }

</script>
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