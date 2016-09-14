@extends('layouts.main')

@section('includesHead')
    <!--suppress ALL -->
















































<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="css/forms.css" rel="stylesheet">
@stop


@section('content')
	<h1>BIENVENIDO ADMINISTRADOR {{ $usuario }}</h1>
@stop


@section('includes')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="js/bootstrap.min.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/select/bootstrap-select.min.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/moment/moment.min.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="js/custom.js"></script>
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="js/forms.js"></script>
@stop