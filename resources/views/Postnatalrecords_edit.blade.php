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
    var ngPostnatalrecordsApp = angular.module('ngPostnatalrecordsApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngPostnatalrecordsApp.controller('ngPostnatalrecordsAppcontroller', function($scope) {
    $scope.PostnatalrecordsItem = {!! $data !!};
    $scope.Staff={!! App\Staff::all()->toJson() !!};$scope.Mothers={!! App\Mothers::all()->toJson() !!};
    $('#Postnatalrecords-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Postnatalrecords', ModuleItemName:'PostnatalrecordsItem', NgAppName:'ngPostnatalrecordsApp'});
    $('#Postnatalrecords-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Postnatalrecords', ModuleItemName:'PostnatalrecordsItem', NgAppName:'ngPostnatalrecordsApp'});
    $('#Postnatalrecords-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Postnatalrecords', ModuleItemName:'PostnatalrecordsItem', NgAppName:'ngPostnatalrecordsApp'});
    $('#Postnatalrecords-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Postnatalrecords', ModuleItemName:'PostnatalrecordsItem', NgAppName:'ngPostnatalrecordsApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Postnatalrecords</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Postnatalrecords</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngPostnatalrecordsApp" ng-controller="ngPostnatalrecordsAppcontroller" id="Postnatalrecords-form" class="form-horizontal form-label-left" method="post" action='{!! route("Postnatalrecordscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"> Date <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.date" type="text" id="date" name="date" required="required" class="form-control col-md-7 col-xs-12 datepicker" ><label ng-repeat="error in moduleerrors.errors.date" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight"> Weight (kg) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.weight" type="text" id="weight" name="weight" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.weight" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="bp"> BP (mmHg) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.bp" type="text" id="bp" name="bp" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.bp" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="urine"> Urine <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.urine" type="text" id="urine" name="urine" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.urine" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="pulse"> Pulse <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.pulse" type="text" id="pulse" name="pulse" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.pulse" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="fundal_height"> Fundal Height (cm) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.fundal_height" type="text" id="fundal_height" name="fundal_height" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.fundal_height" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="temperature"> Temperature <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.temperature" type="text" id="temperature" name="temperature" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.temperature" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lochia_colour"> Lochia Colour/Odour <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.lochia_colour" type="text" id="lochia_colour" name="lochia_colour" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.lochia_colour" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="breast_condition"> Condition of Breast  & nipple <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.breast_condition" type="text" id="breast_condition" name="breast_condition" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.breast_condition" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="ifa_supplied_days"> No. of days IFA supplied <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.ifa_supplied_days" type="text" id="ifa_supplied_days" name="ifa_supplied_days" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.ifa_supplied_days" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="complaints"> Complaints/Remarks <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PostnatalrecordsItem.complaints" type="text" id="complaints" name="complaints" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.complaints" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="staff_id"> Name of Midwife/Nurse <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="staff_id" name="staff_id"><option ng-selected="PostnatalrecordsItem.staff_id==Staffitem.id" ng-repeat=" Staffitem in Staff" class="form-control col-md-7 col-xs-12" value="<% Staffitem.id %>" ><% Staffitem.staff_name %></option></select><label ng-repeat="error in moduleerrors.errors.staff_id" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="incision_perineum"> Incision Perineum/CS <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="incision_perineum" name="incision_perineum"><option ng-selected="PostnatalrecordsItem.incision_perineum=='Clean'" class="form-control col-md-7 col-xs-12" value="Clean" >Clean</option><option ng-selected="PostnatalrecordsItem.incision_perineum=='Infected'" class="form-control col-md-7 col-xs-12" value="Infected" >Infected</option></select><label ng-repeat="error in moduleerrors.errors.incision_perineum" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="mood_changes"> Mood Changes <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="mood_changes" name="mood_changes"><option ng-selected="PostnatalrecordsItem.mood_changes=='Yes'" class="form-control col-md-7 col-xs-12" value="Yes" >Yes</option><option ng-selected="PostnatalrecordsItem.mood_changes=='No'" class="form-control col-md-7 col-xs-12" value="No" >No</option></select><label ng-repeat="error in moduleerrors.errors.mood_changes" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="mo_reg_no"> Mother's Reg No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="mo_reg_no" name="mo_reg_no"><option ng-selected="PostnatalrecordsItem.mo_reg_no==Mothersitem.id" ng-repeat=" Mothersitem in Mothers" class="form-control col-md-7 col-xs-12" value="<% Mothersitem.id %>" ><% Mothersitem.mo_reg_no %></option></select><label ng-repeat="error in moduleerrors.errors.mo_reg_no" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='PostnatalrecordsItem.id' type="text" id="id" name="id" style="display: none" />
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