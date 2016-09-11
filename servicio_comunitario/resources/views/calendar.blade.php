@extends('layouts.main')

@section('includesHead')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    {!!Html::style('https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css')!!}

    <!-- Bootstrap -->
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('vendors/fullcalendar/fullcalendar.css', array('media' => 'screen'))!!}
    <!-- styles -->
    {!!Html::style('css/styles.css')!!}
    {!!Html::style('css/calendar.css')!!}
@stop    
          
@section('content')
<div class="col-md-10">
			<div class="content-box-large">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2">
							<div id='external-events'>
                                 <h4>Draggable Events</h4>
                                 <div class='external-event'>My Event 1</div>
                                 <div class='external-event'>My Event 2</div>
                                 <div class='external-event'>My Event 3</div>
                                 <div class='external-event'>My Event 4</div>
                                 <div class='external-event'>My Event 5</div>
                                 <div class='external-event'>My Event 6</div>
                                 <div class='external-event'>My Event 7</div>
                                 <div class='external-event'>My Event 8</div>
                                 <div class='external-event'>My Event 9</div>
                                 <div class='external-event'>My Event 10</div>
                                 <div class='external-event'>My Event 11</div>
                                 <div class='external-event'>My Event 12</div>
                                 <div class='external-event'>My Event 13</div>
                                 <div class='external-event'>My Event 14</div>
                                 <div class='external-event'>My Event 15</div>
                                 <p>
                                 <input type='checkbox' id='drop-remove' /> <label for='drop-remove'>remove after drop</label>
                                 </p>
                                </div>
						</div>
						<div class="col-md-10">
							<div id='calendar'></div>
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
    {!!Html::script('vendors/fullcalendar/fullcalendar.js')!!}
    {!!Html::script('js/custom.js')!!}
    {!!Html::script('js/calendar.js')!!}
@stop