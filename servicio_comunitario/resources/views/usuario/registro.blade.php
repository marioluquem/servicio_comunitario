<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
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
</head>
@include('alerts.errors')
<body class="login-bg">
    <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <!-- Logo -->
                  <div class="logo">
                     <h1><a href="index.php">CEFODAR - REGISTRO</a></h1>
                  </div>
               </div>
            </div>
         </div>
    </div>
    <div class="page-content container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-wrapper">
                    <div class="box">
                        <div class="content-wrap">
                            {!!Form::open(array('url'=>'usuario/registrar', 'method'=>'post','files'=>'true','id'=>'formulario_registro'))!!}
                                <div class="form-group">
                                    {!!Form::text('cedula', null, array('class'=>'form-control','placeholder'=>'Ingrese cédula','id'=>'cedula', 'onchange' => 'validar_campo_numerico(this.id)'))!!}

                                    {!!Form::text('usuario', null, array('class'=>'form-control','placeholder'=>'Ingrese usuario','id'=>'usuario', 'onchange' => 'validar_caracteres_especiales(this.id)'))!!}
                                    
                                    {!!Form::password('password', array('class'=>'form-control','placeholder'=>'Ingrese password','id'=>'password', 'onchange' => 'validar_caracteres_especiales(this.id)'))!!}
                               
                                    {!!Form::text('primer_nombre', null, array('class'=>'form-control','placeholder'=>'Ingrese primer nombre','id'=>'primer_nombre',  'onchange' => 'validar_campo_string(this.id)'))!!}

                                    {!!Form::text('segundo_nombre', null, array('class'=>'form-control','placeholder'=>'Ingrese segundo nombre','id'=>'segundo_nombre',  'onchange' => 'validar_campo_string(this.id)'))!!}
                                    
                                    {!!Form::text('primer_apellido', null, array('class'=>'form-control','placeholder'=>'Ingrese primer apellido','id'=>'primer_apellido',  'onchange' => 'validar_campo_string(this.id)'))!!}
                                    
                                    {!!Form::text('segundo_apellido', null, array('class'=>'form-control','placeholder'=>'Ingrese segundo apellido','id'=>'segundo_apellido',  'onchange' => 'validar_campo_string(this.id)'))!!}
                                    
                                    {!!Form::email('correo', null, array('class'=>'form-control','placeholder'=>'Ingrese dirección de correo','id'=>'correo', 'onchange' => 'validar_correo(this.id)'))!!}
                                    <br>
                                    {!!Form::label('Género: ', null, array('style'=>'font-size:14px;'))!!}
                                    {!!Form::label('M', null, array('style'=>'font-size:14px;'))!!}  {!!Form::radio('sexo', 'm', array('class'=>'genero', 'checked'))!!}
                                    {!!Form::label('F', null, array('style'=>'font-size:14px;'))!!}  {!!Form::radio('sexo', 'f', array('class'=>'genero'))!!}
                                    <br>
                                        <label class="control-label" style="font-size:14px;">Fecha de nacimiento:</label>
                                        <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">

                                    <br>
                                        <label class="control-label" style="font-size:14px;">Seleccione su imagen de perfil:</label>
                                        <input id="foto" name="foto" type="file" class=" form-control file">
                                    <br>
                                        <label class="control-label" style="font-size:14px;">Seleccione su documento de identidad:</label>
                                        <input id="dni" name="dni" type="file" class=" form-control file">
                                    <br>
                                    <input type="button" class="btn btn-primary" value="Registrarme" onclick="javascript:validar_formulario()">
                                    
                                </div>
                            {!!Form::close()!!}
                        </div>
                    </div>

                    <div class="already">
                        <p>Ya tienes una cuenta?</p>
                        <a href={{ route('login') }}>Ingresa aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function validar_formulario(){
            var listaCampos = [$('#cedula').val(), $('#usuario').val(), $('#password').val(), $('#primer_nombre').val(), $('#segundo_nombre').val(), $('#primer_apellido').val(), $('#segundo_apellido').val(), $('#correo').val()];

            var no_vacios = validar_espacios_vacios(listaCampos);

            if (no_vacios){
                $('#formulario_registro').submit();
            }
        }

    </script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/custom.js"></script>

    <script src="js/validacion_formulario.js"></script>
</body>
</html>