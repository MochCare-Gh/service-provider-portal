@extends("templates.".config("sysconfig.theme").".master")

@section('head')
<script src="{{asset('assets/js/angular.js')}}" ></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />
<script stype="text/javascript">
    var ngModulesApp = angular.module('ngModulesApp', [], function($interpolateProvider)
    {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
    });
    ngModulesApp.controller('ngModulesController', function($scope) {
    $scope.module_title = "@lang('modules.module_title')";
    $scope.page_title = "@lang('modules.module_subtitle')";
    $scope.fieldtypes =<?php echo $field_types; ?>;
    $scope.module = [];
    $('body').on('click', '.edit', function(){
    var URL = $(this).attr('data-url');
    $.ajax({
    url:URL,
            type:'GET',
            data:{'_token':'<?php echo csrf_token(); ?>'},
            success:function(module){
            // Reset Form
            $('#modules-form')[0].reset(); $scope.module = [];
            $scope.$apply();
            $scope.module = JSON.parse(module)[0]; $scope.$apply();
            $('.bd-example-modal-lg').modal('show');
            }
    });
    });
    $('body').on('click', '.delete', function(){
    var AjaxLoaderInt = '';
    var percentage = 10;
    var URL = $(this).attr('data-url');
    $.ajax({
    url:URL,
            type:'GET',
            data:{'_token':'<?php echo csrf_token(); ?>'},
            beforeSend:function(){
            $('.ajaxLoader').show();
            AjaxLoaderInt = setInterval(function(){
            if (percentage < 90)
            {percentage = percentage + 10; $('.ajaxLoader .progress .progress-bar').width(percentage + '%'); }
            }, 200);
            },
            success:function(module){
            $('.ajaxLoader .progress .progress-bar').width('100%');
            clearInterval('AjaxLoaderInt');
            // Reset Form
            $('#modules-form')[0].reset(); $scope.module = []; $scope.$apply();
            new PNotify({title: 'Module Deleted Successfully', text: 'Page is going to reload !', type: 'success'});
            modules.ajax.reload();
            location.reload();
            }
    });
    });
    $('#modules-form').on('submit', function(e){
    e.preventDefault();
    $.ajax({
    url:$(this).attr('action'),
            type:'post',
            data:$(this).serialize(),
            success:function(data){
                $('#modules-form')[0].reset(); $scope.module = []; 
                $scope.$apply(); 
                modules.ajax.reload();
                $('.bd-example-modal-lg').modal('hide');
                window.location.replace("{{url('modules/')}}/"+data.data.id);
            },
            error:function(moduleerrors){$scope.moduleerrors = moduleerrors.responseJSON; $scope.$apply(); }
    });
    });
    $('.cancel').on('click', function(){
        $('.bd-example-modal-lg').modal('hide');
    });
    });
    </script>
<link href="{{ asset('assets/css/fontawesome-iconpicker.min.css')}}" rel="stylesheet">
<script type='text/javascript' src="{{ asset('assets/js/iconpicker.js')}}"></script>
<script type='text/javascript' src="{{ asset('assets/js/jquery.ui.pos.js')}}"></script>
<script type='text/javascript'>
    jQuery(document).ready(function(){  
    $('#module_icon').iconpicker({placement: 'inline'});

    });</script>
@stop

@section('content')
<?php //print_r($FinalTablesInfo);   ?>
<div class="" ng-app="ngModulesApp" ng-controller="ngModulesController">
    <div class="page-title">
        <div class="title_left">
            <h3 ng-bind="module_title"></h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-7"><h2 ng-bind="page_title"></h2></div>
                        <div class="col-md-4 col-sm-4 col-xs-5">
                            <button class="btn btn-primary form-modal-button pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">@lang('modules.module_add_new')</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <table class="table table-striped responsive-utilities jambo_table dataTable" id="modules-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="check-all" class="flat"></th>
                                <th>ID</th>
                                <th>Module Name</th>
                                <th>Module Icon</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Form modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">New / Edit Module
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    @include('modulebuilder.forms.add_new_module')
                </div>
            </div>
        </div>
    </div>

</div>
@stop

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>-->
<script type='text/javascript'>
                            var modules;
                            jQuery(document).ready(function(){
                            var ajaxAction = function(url, action){ $.ajax({url:url, type:action, data:{'_token':"{{ csrf_token()}}", 'selected_rows':SelectedCheckboxes() }, success:function(){  location.reload(); }}); }
                            var SelectedCheckboxes = function() { return $('input:checkbox:checked.module_record').map(function () { return this.value; }).get(); }
                            modules = $('#modules-table').DataTable({
                            dom: '<"row"<"col-sm-7 col-md-8"<"hidden-xs hidden-sm"l>B><"col-sm-5 col-md-4"f>><"row"<"col-sm-12 table-responsive"rt>><"row"<"col-sm-5"i><"col-sm-7"p>>',
                                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print', {  text: 'Delete',
                                            action: function (e, dt, node, config) {
                                            var TrashItem = confirm('Are Your sure you want to Delete this Module/s');
                                            if (TrashItem) {ajaxAction("{!! route('module_multiple_delete') !!}", 'DELETE'); }
                                            }
                                    }],
                                    processing: true,
                                    serverSide: true,
                                    ajax: '{!! route("moduleslist") !!}',
                                    columns: [
                                    {data: 'Select', name: 'Select', searchable:false, sortable:false},
                                    {data: 'id', name: 'id'},
                                    {data: 'module_name', name: 'module_name'},
                                    {data: 'module_icon', name: 'module_icon'},
                                    {data: 'created_at', name: 'created_at'},
                                    {data: 'actions', name: 'actions', 'searchable':false}
                                    ],
                                    order: [[1, 'asc']],
                                    drawCallback:function(){$('input').iCheck({checkboxClass: 'icheckbox_flat-green'}); }
                            });
                            $('body').on('ifToggled', '#check-all', function (event) {
                            if ($(this).is(':checked')){$('input.module_record').iCheck('check'); } else	       { $('input.role_record').iCheck('uncheck'); }
                            });
                            });</script>
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@stop