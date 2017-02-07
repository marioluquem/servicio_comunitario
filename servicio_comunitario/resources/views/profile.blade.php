@extends('layouts.main')

@section('includesHead')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    {!!Html::style('https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css')!!}
            <!-- Bootstrap -->
    {!!Html::style('css/bootstrap.min.css')!!}
            <!-- styles -->
    {!!Html::style('css/styles.css')!!}
    {!! Html::style('css/estilos.css') !!}

    <script>
        $(document).ready(function(){

            $("#datos").show();
            $("#datosEdit").hide();

            $("#botonEditar").click(function(){
                $("#datos").hide();
                $("#datosEdit").show();
            });

            $("#botonVolver").click(function(){
                $("#datos").show();
                $("#datosEdit").hide();
            });

            $("#botonGuardar").click(function(){

                //listas de campos a validar
                var listaCamposValidarVacios = [$('#usuario').val(),  $('#primer_nombre').val(),  $('#primer_apellido').val(), $('#segundo_apellido').val(), $('#correo').val()];

                var listaCamposValidarCaracteres = [$('#usuario').val(),  $('#primer_nombre').val(), $('#segundo_nombre').val(), $('#primer_apellido').val(), $('#segundo_apellido').val()];

                //validaciones
                var no_vacios = validar_espacios_vacios(listaCamposValidarVacios);
                var no_caracteres_especiales = validar_caracteres_especiales(listaCamposValidarCaracteres);
                var correo_ok = validar_correo('correo');

                if (no_vacios && no_caracteres_especiales && correo_ok){
                    $("#datosEdit").hide();
                    $("#datos").show();
                    $('#formulario_actualizar_datos').submit();
                }
            });

            $("#botonGuardarFoto").click(function(){
                //separamos el nombre de la imagen de su URL para poder validar correctamente
                var split1 = $('#foto').val().split('\\');
                var nombreFoto = split1[split1.length-1].split('.')[0];

                var listaCamposValidarVacios = [nombreFoto];

                //validaciones
                var no_vacios = validar_espacios_vacios(listaCamposValidarVacios);
                var no_caracteres_especiales = validar_caracteres_especiales(listaCamposValidarVacios);

                if (no_vacios && no_caracteres_especiales){
                    $("#datosEdit").hide();
                    $("#datos").show();
                    $('#formulario_actualizar_foto').submit();
                }
            });

            $("#botonGuardarDNI").click(function(){
                //separamos el nombre de la imagen de su URL para poder validar correctamente
                var split1 = $('#dni').val().split('\\');
                var nombreDNI = split1[split1.length-1].split('.')[0];

                var listaCamposValidarVacios = [nombreDNI];

                //validaciones
                var no_vacios = validar_espacios_vacios(listaCamposValidarVacios);
                var no_caracteres_especiales = validar_caracteres_especiales(listaCamposValidarVacios);

                if (no_vacios && no_caracteres_especiales){
                    $("#datosEdit").hide();
                    $("#datos").show();
                    $('#formulario_actualizar_dni').submit();
                }
            });

        });
    </script>
@stop

@section('content')
    <div class="col-md-10">
        <div class="content-box-large" style="background-color: #0e90d2;">
            <h3 class="titulo">Bienvenido {{ $nombre_usuario }}</h3>
            <div class="panel-body" style="background-color: #28a0e5; ;border-radius: 10px">

                <!--DATOS-->

                <div class="row" id="datos" style="display: block;">
                    <h4 class="subtitulo">Datos Personales:</h4>
                    <div class="col-lg-2">
                        <img src="{{asset($foto)}}"   class="img-circle imagen" height="150px" width="150px">
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-3" style="margin-top: 20px">
                        <label for="name" class="datos">Nombres:</label><span class="datos">{{$primer_nombre." ".$segundo_nombre}}</span><br>
                        <label for="lastname" class="datos">Apellidos:</label><span class="datos">{{$primer_apellido." ".$segundo_apellido}}</span><br>
                        <label for="email" class="datos">Correo:</label><span class="datos">{{$correo}}</span><br>
                        <label for="birthday" class="datos">Fecha de nacimiento:</label><span class="datos">{{$fecha_nacimiento}}</span><br>
                        <label for="gender" class="datos">Género:</label><span class="datos">{{$sexo}}</span><br>
                        <a class="btn btn-primary" href="#" id="botonEditar">Editar mi perfil</a>
                    </div>
                    <div class="col-lg-4" >
                        <img src="{{asset($dni)}}"  class="imagen" height="200px" width="300px" style="border-radius: 10px">
                    </div>
                </div>

                <!--EDICION DE DATOS-->

                <div class="row" id="datosEdit" style="display: none;">
                    <div class="row">
                        <h4 class="subtitulo">Datos Personales:</h4>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            {!!Form::open(array('url'=>'update_picture', 'method'=>'POST','files'=>'true','id'=>'formulario_actualizar_foto'))!!}
                            {{ Form::hidden('cedula', $cedula) }}
                            <img src="{{asset($foto)}}"   class="img-circle imagen text-center" height="150px" width="150px">
                            <br><br><br><br>
                            <label class="control-label" style="font-size:14px;color:white;">Subir Foto para Nómina de Juego:</label>
                            <input id="foto" name="foto" type="file" class=" form-control file" >
                            <br>
                            <input type="button" id="botonGuardarFoto" class="btn btn-success" style="margin: 0 40%;" value="Guardar foto">
                            {{Form::close()}}
                        </div>
                        <div class="col-lg-4">
                            {!!Form::open(array('url'=>'update_dni', 'method'=>'POST','files'=>'true','id'=>'formulario_actualizar_dni'))!!}
                            {{ Form::hidden('cedula', $cedula) }}
                            <img src="{{asset($dni)}}"  class="imagen" height="200px" width="300px" style="border-radius: 10px">
                            <label class="control-label" style="font-size:14px;color:white;">Subir imagen de Cédula de Identidad:</label>
                            <input id="dni" name="dni" type="file" class=" form-control file" >
                            <br>
                            <input type="button" id="botonGuardarDNI" class="btn btn-success" style="margin: 0 40%;" value="Guardar cédula">
                            {{Form::close()}}
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"></div>
                    <div class="col-lg-7" style="margin-top: 20px">
                        <div class="box">
                            <div class="content-wrap">
                                {!!Form::open(array('url'=>'update_data', 'method'=>'POST','id'=>'formulario_actualizar_datos'))!!}
                                {{ Form::hidden('cedula', $cedula) }}
                                {{ Form::hidden('sexo', $sexo) }}
                                <div class="form-group">
                                    <label class="control-label" style="font-size:14px; color:white;">Usuario:</label>
                                    {!!Form::text('usuario', $nombre_usuario, array('class'=>'form-control','placeholder'=>$nombre_usuario,'id'=>'usuario',  'onchange' => 'validar_caracteres_especiales(this.id)'))!!}
                                    <label class="control-label" style="font-size:14px;color:white;">Primer nombre:</label>
                                    {!!Form::text('primer_nombre', $primer_nombre, array('class'=>'form-control','placeholder'=>$primer_nombre,'id'=>'primer_nombre',  'onchange' => 'validar_campo_string(this.id)'))!!}
                                    <label class="control-label" style="font-size:14px;color:white;">Segundo nombre:</label>
                                    {!!Form::text('segundo_nombre', $segundo_nombre, array('class'=>'form-control','placeholder'=>$segundo_nombre,'id'=>'segundo_nombre',  'onchange' => 'validar_campo_string(this.id)'))!!}
                                    <label class="control-label" style="font-size:14px;color:white;">Primer apellido:</label>
                                    {!!Form::text('primer_apellido', $primer_apellido, array('class'=>'form-control','placeholder'=>$primer_apellido,'id'=>'primer_apellido',  'onchange' => 'validar_campo_string(this.id)'))!!}
                                    <label class="control-label" style="font-size:14px;color:white;">Segundo apellido:</label>
                                    {!!Form::text('segundo_apellido', $segundo_apellido, array('class'=>'form-control','placeholder'=>$segundo_apellido,'id'=>'segundo_apellido',  'onchange' => 'validar_campo_string(this.id)'))!!}
                                    <label class="control-label" style="font-size:14px;color:white;">Correo:</label>
                                    {!!Form::email('correo', $correo, array('class'=>'form-control','placeholder'=>$correo,'id'=>'correo', 'onchange' => 'validar_correo(this.id)'))!!}
                                    <br>

                                    <br>
                                    <label class="control-label" style="font-size:14px;color:white;">Fecha de nacimiento:</label>
                                    <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value={{$fecha_nacimiento}}>
                                    <br>
                                    <label class="control-label" style="font-size:14px;color:white;">Pregunta de Seguridad:</label>
                                    <select class="form-control" name="pregunta_secreta" id="pregunta_secreta">
                                        @foreach($preguntas as $pregunta)
                                            <option value="{{ $pregunta->id_pregunta }}">{{ $pregunta->pregunta }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label class="control-label" style="font-size:14px;color:white;">Respuesta:</label>
                                    <input type="text" class="form-control" id="respuesta_secreta" name="respuesta_secreta" value="{{$respuesta_secreta}}">
                                    <br>
                                    <input type="button" id="botonGuardar" class="btn btn-success" style="margin-left: 30%;" value="GuardarDatos">
                                    <input type="button" id="botonVolver" class="btn btn-primary"  value="Volver">

                                </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
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