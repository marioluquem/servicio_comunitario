<!DOCTYPE html>
<!--suppress ALL -->
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>

    @yield('includesHead')
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><!--suppress HtmlUnknownTarget -->
						 <a href="index.php">Liga Universitaria</a></h1>
			   </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Su Búsqueda...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Buscar</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                    <nav class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Cuenta <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
								@if(session()->get('key', null) == null)
	                          		<li><a href={{ route('login') }}>Iniciar Sesión</a></li>
	                          		<li><a href="{{ route('register') }}">Registrarse</a></li>
								@else
									<li><a href={{ route('profile') }}>Mi Perfil</a></li>
									<li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
								@endif
	                        </ul>
	                      </li>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
				@if(session()->get('data')['rol'] == 'A')  <!--PESTAÑAS DEL ADMINISTRADOR -->
                	<ul class="nav">
                    <!-- Main menu -->
						<li class="current"><a href={{ Route('index') }}><i class="glyphicon glyphicon-home"></i> Inicio Admin</a></li>
						<li><a href={{ Route('calendar') }}><i class="glyphicon glyphicon-calendar"></i> Calendar Admin</a></li>
						<li><a href={{ Route('stats') }}><i class="glyphicon glyphicon-stats"></i> Statistics (Charts) Admin</a></li>
						<li><a href={{ Route('tables') }}><i class="glyphicon glyphicon-list"></i> Tables Admin</a></li>
						<li class="submenu">
							<a href="#">
								<i class="glyphicon glyphicon-list"></i> Usuarios
								<span class="caret pull-right"></span>
							</a>
							<!-- Sub menu -->
							<ul>
								<li><a href={{ Route('createUser') }}><i class="glyphicon glyphicon-pencil"></i> Nuevo Usuario</a></li>
								<li><a href={{ Route('manageUsers') }}><i class="glyphicon glyphicon-pencil"></i> Gestionar Usuarios</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<i class="glyphicon glyphicon-list"></i> Universidades
								<span class="caret pull-right"></span>
							</a>
							<!-- Sub menu -->
							<ul>
								<li><a href={{ Route('createUniversity') }}><i class="glyphicon glyphicon-pencil"></i> Nueva Universidad</a></li>
								<li><a href={{ Route('manageUniversities') }}><i class="glyphicon glyphicon-pencil"></i> Gestionar Universidades</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#">
								<i class="glyphicon glyphicon-list"></i> Equipos
								<span class="caret pull-right"></span>
							</a>
							<!-- Sub menu -->
							<ul>
								<li><a href={{ Route('createTeam') }}><i class="glyphicon glyphicon-pencil"></i> Nuevo Equipo</a></li>
								<li><a href={{ Route('manageTeams') }}><i class="glyphicon glyphicon-pencil"></i> Gestionar Equipos</a></li>
							</ul>
						</li>
					</ul>
				@elseif(session()->get('data')['rol'] == 'D') <!--PESTAÑAS DEL DIRECTOR -->
					<ul class="nav">
						<li class="current"><a href={{ Route('index') }}><i class="glyphicon glyphicon-home"></i> Inicio Director</a></li>
						<li><a href={{ Route('calendar') }}><i class="glyphicon glyphicon-calendar"></i> Calendar Director</a></li>
						<li><a href={{ Route('stats') }}><i class="glyphicon glyphicon-stats"></i> Statistics (Charts) Director</a></li>
						<li><a href={{ Route('tables') }}><i class="glyphicon glyphicon-list"></i> Tables Director</a></li>
						<li><a href={{ Route('buttons') }}><i class="glyphicon glyphicon-record"></i> Buttons Director</a></li>
						<li><a href={{ Route('editors') }}><i class="glyphicon glyphicon-pencil"></i> Editors Director</a></li>
						<li><a href={{ Route('forms') }}><i class="glyphicon glyphicon-tasks"></i> Forms Director</a></li>
					</ul>
				@elseif (session()->get('key',null) == null || session()->get('data')['rol'] == 'U') <!--PESTAÑAS DEL USUARIO COMÚN -->
					<ul class="nav">
						<li class="current"><a href={{ Route('index') }}><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
						<li><a href={{ Route('calendar') }}><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
						<li><a href={{ Route('stats') }}><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
						<li><a href={{ Route('tables') }}><i class="glyphicon glyphicon-list"></i> Tables</a></li>
						<li><a href={{ Route('buttons') }}><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
						<li><a href={{ Route('editors') }}><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
						<li><a href={{ Route('forms') }}><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
					</ul>
				@endif
             </div>
		  </div>
		  
		  @yield('content')
		  
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2016 <a href='#'>Liga Universitaria</a> /  Developed by <a href='#'>Mario Luque</a>
            </div>

         </div>
      </footer>
        
        @yield('includes')

  </body>
</html>