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
    var ngAntenatalrecordsApp = angular.module('ngAntenatalrecordsApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngAntenatalrecordsApp.controller('ngAntenatalrecordsAppcontroller', function($scope) {
    $scope.AntenatalrecordsItem = {!! $data !!};
    $scope.Staff={!! App\Staff::all()->toJson() !!};$scope.Mothers={!! App\Mothers::all()->toJson() !!};
    $('#Antenatalrecords-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Antenatalrecords', ModuleItemName:'AntenatalrecordsItem', NgAppName:'ngAntenatalrecordsApp'});
    $('#Antenatalrecords-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Antenatalrecords', ModuleItemName:'AntenatalrecordsItem', NgAppName:'ngAntenatalrecordsApp'});
    $('#Antenatalrecords-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Antenatalrecords', ModuleItemName:'AntenatalrecordsItem', NgAppName:'ngAntenatalrecordsApp'});
    $('#Antenatalrecords-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Antenatalrecords', ModuleItemName:'AntenatalrecordsItem', NgAppName:'ngAntenatalrecordsApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Antenatalrecords</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Antenatalrecords</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngAntenatalrecordsApp" ng-controller="ngAntenatalrecordsAppcontroller" id="Antenatalrecords-form" class="form-horizontal form-label-left" method="post" action='{!! route("Antenatalrecordscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"> Date <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.date" type="text" id="date" name="date" required="required" class="form-control col-md-7 col-xs-12 datepicker" ><label ng-repeat="error in moduleerrors.errors.date" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight"> Weight (kg) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.weight" type="text" id="weight" name="weight" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.weight" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="bp"> BP (mmHg) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.bp" type="text" id="bp" name="bp" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.bp" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="urine"> Urine <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.urine" type="text" id="urine" name="urine" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.urine" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="gest_age"> Gestation Age (weeks) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.gest_age" type="text" id="gest_age" name="gest_age" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.gest_age" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="fundal_heights"> Fundal Height (cm) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.fundal_heights" type="text" id="fundal_heights" name="fundal_heights" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.fundal_heights" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="presentation"> Presentation <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.presentation" type="text" id="presentation" name="presentation" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.presentation" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="descent"> Descent <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.descent" type="text" id="descent" name="descent" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.descent" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="fetal_heart_rate"> Fetal heart rate (/bpm) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.fetal_heart_rate" type="text" id="fetal_heart_rate" name="fetal_heart_rate" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.fetal_heart_rate" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="ifa_supply_days"> No. of days IFA supplied <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.ifa_supply_days" type="text" id="ifa_supply_days" name="ifa_supply_days" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.ifa_supply_days" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="complaints"> Complaints/Remarks <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="AntenatalrecordsItem.complaints" type="text" id="complaints" name="complaints" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.complaints" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff"> Name of Midwife <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="staff" name="staff"><option ng-selected="AntenatalrecordsItem.staff==Staffitem.id" ng-repeat=" Staffitem in Staff" class="form-control col-md-7 col-xs-12" value="<% Staffitem.id %>" ><% Staffitem.staff_name %></option></select><label ng-repeat="error in moduleerrors.errors.staff" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="mo_reg_no"> Mother's Reg No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="mo_reg_no" name="mo_reg_no"><option ng-selected="AntenatalrecordsItem.mo_reg_no==Mothersitem.id" ng-repeat=" Mothersitem in Mothers" class="form-control col-md-7 col-xs-12" value="<% Mothersitem.id %>" ><% Mothersitem.mo_reg_no %></option></select><label ng-repeat="error in moduleerrors.errors.mo_reg_no" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='AntenatalrecordsItem.id' type="text" id="id" name="id" style="display: none" />
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