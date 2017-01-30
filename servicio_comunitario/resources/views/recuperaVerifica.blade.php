<!DOCTYPE html>
<!--suppress ALL -->
<html>
<head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap, HtmlUnknownTarget -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- styles, HtmlUnknownTarget -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">
@include('alerts.errors')
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Logo -->
                <div class="logo">
                    <h1><!--suppress HtmlUnknownTarget -->
                        <a href="index.php">Recuperación de Contraseña</a></h1>
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
                        {!! Form::open(array('url'=>'cambiarClave', 'method'=>'POST', 'id'=>'cambiarClave')) !!}
                        <h6>Pregunta secreta:</h6>
                        {{ Form::hidden('id_pregunta', $pregunta->id_pregunta) }}
                        {{ Form::hidden('cedula', $cedula) }}
                        <input class="form-control" type="text" value="{{ $pregunta->pregunta }}">
                        <h6>Respuesta:</h6>
                        {!! Form::text ('respuesta_secreta', null, array('class'=>'form-control','placeholder'=>'Su respuesta secreta..','id'=>'respuesta_secreta'))!!}
                        <h6>Nueva contraseña:</h6>
                        {!!Form::password('password', array('class'=>'form-control','placeholder'=>'Ingrese password','id'=>'password', 'onchange' => 'validar_caracteres_especiales(this.id)'))!!}
                        <div class="action">
                            <input type="submit" class="btn btn-primary signup" value="Solicitar Cambio de Contraseña">
                            <br>
                            <br>
                            <a class="btn btn-primary signup" href={{ route('index') }}>Volver</a>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed, HtmlUnknownTarget -->
<!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
<script src="js/bootstrap.min.js"></script>
<!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
<script src="js/custom.js"></script>

<script src="js/validacion_formulario.js"></script>
</body>
</html>