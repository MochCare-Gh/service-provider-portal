@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/custom.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
    <!-- PNotify -->
    <script type="text/javascript" src="{{ asset('assets/js/notify/pnotify.core.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/notify/pnotify.buttons.js')}} "></script>
    <script type="text/javascript" src="{{ asset('assets/js/notify/pnotify.nonblock.js')}}"></script>
<script stype="text/javascript">
    var ngStaffApp = angular.module('ngStaffApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngStaffApp.controller('ngStaffAppcontroller', function($scope) {
    $scope.StaffItem = {!! $data !!};
    $scope.Stafftypes={!! App\Stafftypes::all()->toJson() !!};
    $('#Staff-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Staff', ModuleItemName:'StaffItem', NgAppName:'ngStaffApp'});
    $('#Staff-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Staff', ModuleItemName:'StaffItem', NgAppName:'ngStaffApp'});
    $('#Staff-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Staff', ModuleItemName:'StaffItem', NgAppName:'ngStaffApp'});
    $('#Staff-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Staff', ModuleItemName:'StaffItem', NgAppName:'ngStaffApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Staff</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Staff</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngStaffApp" ng-controller="ngStaffAppcontroller" id="Staff-form" class="form-horizontal form-label-left" method="post" action='{!! route("Staffcreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_id"> Staff ID <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="StaffItem.staff_id" type="text" id="staff_id" name="staff_id" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.staff_id" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_name"> Staff name <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="StaffItem.staff_name" type="text" id="staff_name" name="staff_name" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.staff_name" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_designation"> Designation <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="staff_designation" name="staff_designation"><option ng-selected="StaffItem.staff_designation==Stafftypesitem.id" ng-repeat=" Stafftypesitem in Stafftypes" class="form-control col-md-7 col-xs-12" value="<% Stafftypesitem.id %>" ><% Stafftypesitem.type_name %></option></select><label ng-repeat="error in moduleerrors.errors.staff_designation" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_tel"> Tel No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="StaffItem.staff_tel" type="text" id="staff_tel" name="staff_tel" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.staff_tel" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='StaffItem.id' type="text" id="id" name="id" style="display: none" />
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
    $(document).ready(function() {
        var ajaxAction=function(url,action){ 
            $.ajax({url:url,type:action,data:{'_token':"{{ csrf_token()}}" ,'selected_rows':SelectedCheckboxes() },success:function(){ ListTable.ajax.reload(); }}); 
        }
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN':'{{ csrf_token() }}','X-Requested-With': 'XMLHttpRequest'}
        });
    });
</script>
@stop