@extends("templates.".config("sysconfig.theme").".master")
@section('head')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
  <script>
  jQuery(function($) {
    $(document.getElementById('fb-editor')).formBuilder();
  });
  </script>
@stop
@section('content')
  <div id="fb-editor"></div>
@stop