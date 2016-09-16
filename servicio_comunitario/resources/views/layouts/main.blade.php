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
						 <a href="index.php">Bootstrap Admin Theme</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Cuenta <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
								@if(session()->get('key', null) == null)
	                          		<li><a href={{ route('login') }}>Iniciar Sesión</a></li>
	                          		<li><a href="{{ route('registro') }}">Registrarse</a></li>
								@else
									<li><a href={{ route('profile') }}>Mi Perfil</a></li>
									<li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
								@endif
	                        </ul>
	                      </li>
	                    </ul>
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
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href={{ Route('index') }}><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href={{ Route('calendar') }}><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href={{ Route('stats') }}><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
                    <li><a href={{ Route('tables') }}><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href={{ Route('buttons') }}><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                     <li><a href={{ Route('editors') }}><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                    <li><a href={{ Route('forms') }}><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
                </ul>
             </div>
		  </div>
		  
		  @yield('content')
		  
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>
        
        @yield('includes')

  </body>
</html>