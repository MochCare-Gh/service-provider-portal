@extends('layouts.master')
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngSettingsApp = angular.module('ngSettingsApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngSettingsApp.controller('ngSettingsAppcontroller', function($scope) {
    $scope.user = [];
    
    $('#Settings-form').Add({Type:'POST', Data:{'_token':'<?php echo csrf_token();?>'}, ModuleName:'Settings', ModuleItemName:'SettingsItem', NgAppName:'ngSettingsApp'});
    $('#Settings-form').Edit({Type:'GET', Data:{'_token':'<?php echo csrf_token();?>'}, ModuleName:'Settings', ModuleItemName:'SettingsItem', NgAppName:'ngSettingsApp'});
    $('#Settings-form').Delete({Type:'GET', Data:{'_token':'<?php echo csrf_token();?>'}, ModuleName:'Settings', ModuleItemName:'SettingsItem', NgAppName:'ngSettingsApp'});
    $('#Settings-form').Submit({Type:'POST', Data:{'_token':'<?php echo csrf_token();?>'}, ModuleName:'Settings', ModuleItemName:'SettingsItem', NgAppName:'ngSettingsApp'});
    });</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Manage Settings</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Settings's List</h2>
                    <button class="btn btn-primary form-modal-button" data-toggle="modal" data-target=".form-modal">Add New Settings</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class='table-responsive' style='overflow-y: hidden' >
                    <table class="table table-striped responsive-utilities jambo_table dataTable" id="Settings-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Registration</th><th>CRUD Builder</th><th>File Manager</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <!-- Form modal -->
    <div class="modal fade form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Settings
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <form  ng-app="ngSettingsApp" ng-controller="ngSettingsAppcontroller" id="Settings-form" class="form-horizontal form-label-left" method="post" action='{!! route("Settingscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="registration"> Registration <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input type="radio" name="registration" ng-model="SettingsItem.registration"  value="Enable" > Enable <input type="radio" name="registration" ng-model="SettingsItem.registration"  value="Disable" > Disable </div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="crudbuilder"> CRUD Builder <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input type="radio" name="crudbuilder" ng-model="SettingsItem.crudbuilder"  value="show" > show <input type="radio" name="crudbuilder" ng-model="SettingsItem.crudbuilder"  value="hide" > hide </div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="filemanager"> File Manager <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input type="radio" name="filemanager" ng-model="SettingsItem.filemanager"  value="show" > show <input type="radio" name="filemanager" ng-model="SettingsItem.filemanager"  value="hide" > hide </div></div>
                        <input ng-model='SettingsItem.id' type="text" id="id" name="id" style="display: none" />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary cancel">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script type="text/javascript">
            var ListTable;
            $(document).ready(function() {

            ListTable = $('#Settings-table').DataTable({    
            dom: 'Bfrtip',
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route("Settingslist") !!}',
                    columns: [
                    {data: 'id', name: 'id'},
                    {data: 'registration', name: 'registration'},{data: 'crudbuilder', name: 'crudbuilder'},{data: 'filemanager', name: 'filemanager'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', 'searchable':false}
                    ],
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print','colvis'],
                    order: [[1, 'asc']]
            });
            });</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>
@stop