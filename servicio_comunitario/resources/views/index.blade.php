@extends('layouts.main')

@section('includesHead')
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {!!Html::style('css/bootstrap.min.css')!!}
    <!-- styles -->
    {!!Html::style('css/styles.css')!!}
@stop

@include('alerts.success')
@section('content')
    <div class="col-md-10">

		<div class="row">
			<div class="col-md-12 panel-warning">
				<div class="content-box-header panel-heading">
					<div class="panel-title ">Avisos</div>

					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
				<div class="content-box-large box-with-header">
					<h3>Bienvenido al nuevo portal de la Liga Universitaria!</h3>
					<br>
					<h4>Regístrate en el menú superior derecho para ser parte de esta comunidad de atletas.</h4>
					<br /><br />
				</div>
			</div>
		</div>
			
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="content-box-header">
			  					<div class="panel-title">Comunicados</div>
								
								<div class="panel-options">
							
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">

				  				Inscripciones Abiertas.
				  				
		  			<!--
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Siguenos</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<a target= "_blank" href="http://www.ligau.com.ve"><img src="images/noticiaslogo.png" class="imagen" height="50px" width="60px" style="border-radius: 10px"></a>
							<br /><br />
		  				</div>
		  				-->

		  			</div>
		  		</div>
		  		
		  		<!--
		  		<div class="col-md-6">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Tweets</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				
					  			Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
								<br /><br />
							</div>
		  				</div>
		  			</div>
		  			-->
		  			<div class="row">
		  				<div class="col-md-6">
		  					<div class="content-box-header">
			  					<div class="panel-title">Siguenos</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<a target= "_blank" href="http://www.ligau.com.ve"><img src="images/noticiaslogo.png" class="imagen" height="40px" width="40px" hspace="10px"></a>    
				  				<a target= "_blank" href="https://twitter.com/ligauve?lang=es"><img src="images/logotwitter.png" class="imagen" height="40px" width="50px" hspace="10px"></a>
					  			<a target= "_blank" href="https://www.instagram.com/ligauve/"><img src="images/instalogo.png" class="imagen" height="40px" width="40px" hspace="10px"></a>
								<br /><br />
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
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/custom.js')!!}
@stop