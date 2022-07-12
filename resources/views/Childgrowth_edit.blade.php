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
    var ngChildgrowthApp = angular.module('ngChildgrowthApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngChildgrowthApp.controller('ngChildgrowthAppcontroller', function($scope) {
    $scope.ChildgrowthItem = {!! $data !!};
    $scope.Staff={!! App\Staff::all()->toJson() !!};$scope.Mothers={!! App\Mothers::all()->toJson() !!};
    $('#Childgrowth-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Childgrowth', ModuleItemName:'ChildgrowthItem', NgAppName:'ngChildgrowthApp'});
    $('#Childgrowth-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Childgrowth', ModuleItemName:'ChildgrowthItem', NgAppName:'ngChildgrowthApp'});
    $('#Childgrowth-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Childgrowth', ModuleItemName:'ChildgrowthItem', NgAppName:'ngChildgrowthApp'});
    $('#Childgrowth-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Childgrowth', ModuleItemName:'ChildgrowthItem', NgAppName:'ngChildgrowthApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Childgrowth</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Childgrowth</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngChildgrowthApp" ng-controller="ngChildgrowthAppcontroller" id="Childgrowth-form" class="form-horizontal form-label-left" method="post" action='{!! route("Childgrowthcreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"> Date <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ChildgrowthItem.date" type="text" id="date" name="date" required="required" class="form-control col-md-7 col-xs-12 datepicker" ><label ng-repeat="error in moduleerrors.errors.date" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight"> Weight <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ChildgrowthItem.weight" type="text" id="weight" name="weight" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.weight" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="age"> Age (months) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ChildgrowthItem.age" type="text" id="age" name="age" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.age" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="length"> Length/Height (cm) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ChildgrowthItem.length" type="text" id="length" name="length" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.length" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="complaints"> Complaints / Remarks <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ChildgrowthItem.complaints" type="text" id="complaints" name="complaints" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.complaints" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_id"> Name of Midwife / Nurse <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="staff_id" name="staff_id"><option ng-selected="ChildgrowthItem.staff_id==Staffitem.id" ng-repeat=" Staffitem in Staff" class="form-control col-md-7 col-xs-12" value="<% Staffitem.id %>" ><% Staffitem.staff_name %></option></select><label ng-repeat="error in moduleerrors.errors.staff_id" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="ch_reg_no"> Child's Reg No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ChildgrowthItem.ch_reg_no" type="text" id="ch_reg_no" name="ch_reg_no" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.ch_reg_no" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="mo_reg_no"> Mother's Reg No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="mo_reg_no" name="mo_reg_no"><option ng-selected="ChildgrowthItem.mo_reg_no==Mothersitem.id" ng-repeat=" Mothersitem in Mothers" class="form-control col-md-7 col-xs-12" value="<% Mothersitem.id %>" ><% Mothersitem.mo_reg_no %></option></select><label ng-repeat="error in moduleerrors.errors.mo_reg_no" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='ChildgrowthItem.id' type="text" id="id" name="id" style="display: none" />
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