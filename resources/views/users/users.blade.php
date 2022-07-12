@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="{{asset('assets/js/angular.js')}}" ></script>
<script stype="text/javascript">
    var ngUsersApp = angular.module('ngUsersApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngUsersApp.controller('ngUsersController', function($scope) {
    $scope.user = [];
    $scope.roles = {!! $data['roles'] !!};
    $('#users-form').Edit({Type:'GET', Data:{'_token':'<?php echo csrf_token(); ?>'}, ModuleName:'users', ModuleItemName:'user', NgAppName:'ngUsersApp'});
    $('#users-form').Delete({Type:'GET', Data:{'_token':'<?php echo csrf_token(); ?>'}, ModuleName:'users', ModuleItemName:'user', NgAppName:'ngUsersApp'});
    $('#users-form').Submit({Type:'POST', Data:{'_token':'<?php echo csrf_token(); ?>'}, ModuleName:'users', ModuleItemName:'user', NgAppName:'ngUsersApp'});
    });</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>@lang('users.module_title')</h3>
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
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>@lang('users.module_subtitle')</h2></div>
                       <div class="col-md-4 col-sm-4 col-xs-5"><button class="btn btn-primary form-modal-button pull-right" data-toggle="modal" data-target=".form-modal">@lang('users.module_add_new')</button></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped  jambo_table dataTable"  id="users-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="check-all" class="flat"></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Role</th>
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
    <!-- Form modal -->
    <div class="modal fade form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Module Name
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <form  ng-app="ngUsersApp" ng-controller="ngUsersController" id="users-form" class="form-horizontal form-label-left" method="post" action='{!! route("userscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='user.name' type="text" id="name" name='name' required="required" class="form-control col-md-7 col-xs-12" ><ul class="parsley-errors-list" ></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='user.email' type="text" id="email" name="email"  autocomplete="new-email" required="required" class="form-control col-md-7 col-xs-12" ><ul class="parsley-errors-list" ></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" class="form-control col-md-7 col-xs-12" type="password" name="password" autocomplete="new-password" ><ul class="parsley-errors-list" ></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role" class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="roles" id="roles" class="form-control" >
                                    <option ng-selected="user.roles[0].id==role.id" ng-repeat="role in roles" value="<% role.id %>" ><% role.display_name %></option>
                                </select>
                            </div>
                        </div>
                        <input ng-model='user.id' type="text" id="id" name="id" style="display: none" />
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
     var ajaxAction=function(url,action){ $.ajax({url:url,type:action,data:{'_token':"{{ csrf_token()}}" ,'selected_rows':SelectedCheckboxes() },success:function(){}}); }
     var SelectedCheckboxes = function() { return $('input:checkbox:checked.user_record').map(function () { return this.value; }).get(); }

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN':'{{ csrf_token() }}','X-Requested-With': 'XMLHttpRequest'}
    });
    ListTable = $('#users-table').DataTable({
    dom: '<"row"<"col-sm-7 col-md-8"<"hidden-xs hidden-sm"l>B><"col-sm-5 col-md-4"f>><"row"<"col-sm-12 table-responsive"rt>><"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print',
                {  text: 'Delete',
                    action: function ( e, dt, node, config ) {   
                     var TrashItem = confirm('Are Your sure you want to Delete this User/s');
                     if (TrashItem) {ajaxAction("{!! route('usersdeletemultiple') !!}",'DELETE'); ListTable.ajax.reload();}
                    }
                }
            ],    
    processing: true,
            serverSide: true,
            ajax: {'url':'{!! route("userslist") !!}','data':{'_token':'{{csrf_token()}}'} },
            columns: [
            {data: 'Select', name: 'Select',searchable:false,sortable:false},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'actions', name: 'actions', 'searchable':false}
            ],
            order: [[1, 'asc']],
            drawCallback:function(){$('input').iCheck({checkboxClass: 'icheckbox_flat-green'});}  
    });
    
    $('body').on('ifToggled','#check-all', function (event) {
     if($(this).is(':checked')){$('input.user_record').iCheck('check'); } else	       { $('input.user_record').iCheck('uncheck');}
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
@stop
