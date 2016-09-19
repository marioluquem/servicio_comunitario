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
		  		<div class="col-md-6">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Noticias</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					Ut tristique adipiscing mauris, sit amet suscipit metus porta quis. Donec dictum tincidunt erat, eu blandit ligula. Nam sit amet dolor sapien. Quisque velit erat, congue sed suscipit vel, feugiat sit amet enim. Suspendisse interdum enim at mi tempor commodo. Sed tincidunt sed tortor eu scelerisque. Donec luctus malesuada vulputate. Nunc vel auctor metus, vel adipiscing odio. Aliquam aliquet rhoncus libero, at varius nisi pulvinar nec. Aliquam erat volutpat. Donec ut neque mi. Praesent enim nisl, bibendum vitae ante et, placerat pharetra magna. Donec facilisis nisl turpis, eget facilisis turpis semper non. Maecenas luctus ligula tincidunt iasdsd vitae ante et, 
				  			<br /><br />
				  			Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed consectetur erat. Maecenas in elementum libero. Sed consequat pellentesque ultricies. Ut laoreet vehicula nisl sed placerat. Duis posuere lectus n, eros et hendrerit pellentesque, ante magna condimentum sapien, eget ultrices eros libero non orci. Etiam varius diam lectus.
							<br /><br />
		  				</div>
		  			</div>
		  		</div>

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
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Comunicados</div>
								
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
		  		</div>
		  	</div>

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
			  			Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
						<br /><br />
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