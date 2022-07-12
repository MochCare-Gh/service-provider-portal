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
    var ngImmunizationsApp = angular.module('ngImmunizationsApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngImmunizationsApp.controller('ngImmunizationsAppcontroller', function($scope) {
    $scope.ImmunizationsItem = {!! $data !!};
    $scope.Staff={!! App\Staff::all()->toJson() !!};
    $('#Immunizations-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Immunizations', ModuleItemName:'ImmunizationsItem', NgAppName:'ngImmunizationsApp'});
    $('#Immunizations-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Immunizations', ModuleItemName:'ImmunizationsItem', NgAppName:'ngImmunizationsApp'});
    $('#Immunizations-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Immunizations', ModuleItemName:'ImmunizationsItem', NgAppName:'ngImmunizationsApp'});
    $('#Immunizations-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Immunizations', ModuleItemName:'ImmunizationsItem', NgAppName:'ngImmunizationsApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Immunizations</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Immunizations</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngImmunizationsApp" ng-controller="ngImmunizationsAppcontroller" id="Immunizations-form" class="form-horizontal form-label-left" method="post" action='{!! route("Immunizationscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="ch_reg_no"> Childs Reg No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ImmunizationsItem.ch_reg_no" type="text" id="ch_reg_no" name="ch_reg_no" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.ch_reg_no" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="mo_reg_no"> Mother's Reg No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ImmunizationsItem.mo_reg_no" type="text" id="mo_reg_no" name="mo_reg_no" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.mo_reg_no" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="age"> Age <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="age" name="age"><option ng-selected="ImmunizationsItem.age=='At birth'" class="form-control col-md-7 col-xs-12" value="At birth" >At birth</option><option ng-selected="ImmunizationsItem.age=='6 weeks'" class="form-control col-md-7 col-xs-12" value="6 weeks" >6 weeks</option><option ng-selected="ImmunizationsItem.age=='10 weeks'" class="form-control col-md-7 col-xs-12" value="10 weeks" >10 weeks</option><option ng-selected="ImmunizationsItem.age=='14 weeks'" class="form-control col-md-7 col-xs-12" value="14 weeks" >14 weeks</option><option ng-selected="ImmunizationsItem.age=='9 months'" class="form-control col-md-7 col-xs-12" value="9 months" >9 months</option><option ng-selected="ImmunizationsItem.age=='18 months'" class="form-control col-md-7 col-xs-12" value="18 months" >18 months</option></select><label ng-repeat="error in moduleerrors.errors.age" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="vaccine"> Vaccine <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="vaccine" name="vaccine"><option ng-selected="ImmunizationsItem.vaccine=='1(BCG) / 2(OPV 0) / 3(Hepatitis B)'" class="form-control col-md-7 col-xs-12" value="1(BCG) / 2(OPV 0) / 3(Hepatitis B)" >1(BCG) / 2(OPV 0) / 3(Hepatitis B)</option><option ng-selected="ImmunizationsItem.vaccine=='1(OPV 1) / 2(DPT/Hep B/Hib 1) / 3(Pneumcoccal 1) / 4(Rotavirus 1)'" class="form-control col-md-7 col-xs-12" value="1(OPV 1) / 2(DPT/Hep B/Hib 1) / 3(Pneumcoccal 1) / 4(Rotavirus 1)" >1(OPV 1) / 2(DPT/Hep B/Hib 1) / 3(Pneumcoccal 1) / 4(Rotavirus 1)</option><option ng-selected="ImmunizationsItem.vaccine=='1(OPV 2) / 2(DPT/Hep B/Hib 2) / 3(Pneumcoccal 2) / 4(Rotavirus 2)'" class="form-control col-md-7 col-xs-12" value="1(OPV 2) / 2(DPT/Hep B/Hib 2) / 3(Pneumcoccal 2) / 4(Rotavirus 2)" >1(OPV 2) / 2(DPT/Hep B/Hib 2) / 3(Pneumcoccal 2) / 4(Rotavirus 2)</option><option ng-selected="ImmunizationsItem.vaccine=='1(OPV 3) / 2(DPT/Hep B/Hib 3) / 3(Pneumcoccal 3) / 4(IPV)'" class="form-control col-md-7 col-xs-12" value="1(OPV 3) / 2(DPT/Hep B/Hib 3) / 3(Pneumcoccal 3) / 4(IPV)" >1(OPV 3) / 2(DPT/Hep B/Hib 3) / 3(Pneumcoccal 3) / 4(IPV)</option><option ng-selected="ImmunizationsItem.vaccine=='1(Measles-Rubella 1) / 2(Yellow fever)'" class="form-control col-md-7 col-xs-12" value="1(Measles-Rubella 1) / 2(Yellow fever)" >1(Measles-Rubella 1) / 2(Yellow fever)</option><option ng-selected="ImmunizationsItem.vaccine=='1(Measles-Rubella 2) / 2(Meningitis A) / 3(LLIN)'" class="form-control col-md-7 col-xs-12" value="1(Measles-Rubella 2) / 2(Meningitis A) / 3(LLIN)" >1(Measles-Rubella 2) / 2(Meningitis A) / 3(LLIN)</option><option ng-selected="ImmunizationsItem.vaccine=='Other Vaccine'" class="form-control col-md-7 col-xs-12" value="Other Vaccine" >Other Vaccine</option></select><label ng-repeat="error in moduleerrors.errors.vaccine" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="batch_no"> Batch No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ImmunizationsItem.batch_no" type="text" id="batch_no" name="batch_no" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.batch_no" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="place_given"> Place given <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ImmunizationsItem.place_given" type="text" id="place_given" name="place_given" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.place_given" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_id"> Name of Midwife/Nurse <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="staff_id" name="staff_id"><option ng-selected="ImmunizationsItem.staff_id==Staffitem.id" ng-repeat=" Staffitem in Staff" class="form-control col-md-7 col-xs-12" value="<% Staffitem.id %>" ><% Staffitem.staff_name %></option></select><label ng-repeat="error in moduleerrors.errors.staff_id" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="other_vaccine"> Other vaccine ( if applicable ) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ImmunizationsItem.other_vaccine" type="text" id="other_vaccine" name="other_vaccine" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.other_vaccine" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"> Date <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="ImmunizationsItem.date" type="text" id="date" name="date" required="required" class="form-control col-md-7 col-xs-12 datepicker" ><label ng-repeat="error in moduleerrors.errors.date" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='ImmunizationsItem.id' type="text" id="id" name="id" style="display: none" />
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