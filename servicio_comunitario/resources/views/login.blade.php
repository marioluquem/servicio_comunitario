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
						 <a href="index.php">Login - CEFODAR</a></h1>
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
							{!! Form::open(array('url'=>'login', 'method'=>'POST', 'id'=>'formulario_login')) !!}
			                <h6>Inicio de Sesión</h6>
			                <div class="social">
	                            <a class="face_login" href="#">
	                                <span class="face_icon">
	                                    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
										<img src="images/facebook.png" alt="fb">
	                                </span>
	                                <span class="text">Iniciar Sesión con Facebook</span>
	                            </a>
	                            <div class="division">
	                                <hr class="left">
	                                <span>o bien,</span>
	                                <hr class="right">
	                            </div>
	                        </div>
							{!! Form::text ('cedula', null, array('class'=>'form-control','placeholder'=>'Cédula','id'=>'cedula'))!!}
							{!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','id'=>'password')) !!}
			                <div class="action">
								<input type="submit" class="btn btn-primary signup" value="Entrar">
			                    <a class="btn btn-primary signup" href={{ route('index') }}>Volver</a>
			                </div>
							{!! Form::close()!!}
			            </div>
			        </div>

			        <div class="already">
			            <p>Aún no tienes una cuenta? Ingresa aquí </p>
			            <!--suppress HtmlUnknownTarget -->
						<a href={{  route('register') }}>Registrarse</a>
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
  </body>
</html>