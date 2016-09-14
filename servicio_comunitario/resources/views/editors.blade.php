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
@stop  

@section('content')
    <div class="col-md-10">

  			<div class="content-box-large">
          <div class="panel-heading">
            <div class="panel-title">CKEditor Standard</div>
          
            <div class="panel-options">
              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
            </div>
          </div>
          <div class="panel-body">
            <textarea id="ckeditor_standard"></textarea>
          </div>
        </div>

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">CKEditor Full</div>
          
          <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
          </div>
        </div>
          <div class="panel-body">
            <textarea id="ckeditor_full"></textarea>
          </div>
        </div>

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">TinyMCE Basic</div>
          
          <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
          </div>
        </div>
          <div class="panel-body">
            <textarea id="tinymce_basic"></textarea>
          </div>
        </div>

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">TinyMCE Full</div>
          
          <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
          </div>
        </div>
          <div class="panel-body">
            <textarea id="tinymce_full"></textarea>
          </div>
        </div>

        <div class="content-box-large">
          <div class="panel-heading">
          <div class="panel-title">Bootstrap WYSIWYG</div>
          
          <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
          </div>
        </div>
          <div class="panel-body">
            <textarea id="bootstrap-editor" placeholder="Enter text ..." style="width:98%;height:200px;"></textarea>
          </div>
        </div>



		  </div>
		</div>
    </div>

@stop


@section('includes')
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="js/bootstrap.min.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/ckeditor/ckeditor.js"></script>
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="vendors/ckeditor/adapters/jquery.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="js/custom.js"></script>
    <!--suppress HtmlUnknownTarget, HtmlUnknownTarget -->
    <script src="js/editors.js"></script>
@stop