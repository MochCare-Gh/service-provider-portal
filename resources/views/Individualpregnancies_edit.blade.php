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
    var ngIndividualpregnanciesApp = angular.module('ngIndividualpregnanciesApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngIndividualpregnanciesApp.controller('ngIndividualpregnanciesAppcontroller', function($scope) {
    $scope.IndividualpregnanciesItem = {!! $data !!};
    $scope.Mothers={!! App\Mothers::all()->toJson() !!};
    $('#Individualpregnancies-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Individualpregnancies', ModuleItemName:'IndividualpregnanciesItem', NgAppName:'ngIndividualpregnanciesApp'});
    $('#Individualpregnancies-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Individualpregnancies', ModuleItemName:'IndividualpregnanciesItem', NgAppName:'ngIndividualpregnanciesApp'});
    $('#Individualpregnancies-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Individualpregnancies', ModuleItemName:'IndividualpregnanciesItem', NgAppName:'ngIndividualpregnanciesApp'});
    $('#Individualpregnancies-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Individualpregnancies', ModuleItemName:'IndividualpregnanciesItem', NgAppName:'ngIndividualpregnanciesApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Individualpregnancies</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Individualpregnancies</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngIndividualpregnanciesApp" ng-controller="ngIndividualpregnanciesAppcontroller" id="Individualpregnancies-form" class="form-horizontal form-label-left" method="post" action='{!! route("Individualpregnanciescreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="birth_no"> Birth No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="IndividualpregnanciesItem.birth_no" type="text" id="birth_no" name="birth_no" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.birth_no" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="birth_date"> Birth Date <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="IndividualpregnanciesItem.birth_date" type="text" id="birth_date" name="birth_date" required="required" class="form-control col-md-7 col-xs-12 datepicker" ><label ng-repeat="error in moduleerrors.errors.birth_date" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="place_of_birth"> Place of Birth <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="place_of_birth" name="place_of_birth"><option ng-selected="IndividualpregnanciesItem.place_of_birth=='Hospital'" class="form-control col-md-7 col-xs-12" value="Hospital" >Hospital</option><option ng-selected="IndividualpregnanciesItem.place_of_birth=='HC'" class="form-control col-md-7 col-xs-12" value="HC" >HC</option><option ng-selected="IndividualpregnanciesItem.place_of_birth=='MH'" class="form-control col-md-7 col-xs-12" value="MH" >MH</option><option ng-selected="IndividualpregnanciesItem.place_of_birth=='CHPS'" class="form-control col-md-7 col-xs-12" value="CHPS" >CHPS</option><option ng-selected="IndividualpregnanciesItem.place_of_birth=='Home'" class="form-control col-md-7 col-xs-12" value="Home" >Home</option><option ng-selected="IndividualpregnanciesItem.place_of_birth=='Other'" class="form-control col-md-7 col-xs-12" value="Other" >Other</option></select><label ng-repeat="error in moduleerrors.errors.place_of_birth" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="mode_of_delivery"> Mode of Delivery <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="mode_of_delivery" name="mode_of_delivery"><option ng-selected="IndividualpregnanciesItem.mode_of_delivery=='SVD'" class="form-control col-md-7 col-xs-12" value="SVD" >SVD</option><option ng-selected="IndividualpregnanciesItem.mode_of_delivery=='AVD'" class="form-control col-md-7 col-xs-12" value="AVD" >AVD</option><option ng-selected="IndividualpregnanciesItem.mode_of_delivery=='CS'" class="form-control col-md-7 col-xs-12" value="CS" >CS</option></select><label ng-repeat="error in moduleerrors.errors.mode_of_delivery" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="outcome_of_delivery"> Outcome of Delivery <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="outcome_of_delivery" name="outcome_of_delivery"><option ng-selected="IndividualpregnanciesItem.outcome_of_delivery=='Live birth'" class="form-control col-md-7 col-xs-12" value="Live birth" >Live birth</option><option ng-selected="IndividualpregnanciesItem.outcome_of_delivery=='Still birth'" class="form-control col-md-7 col-xs-12" value="Still birth" >Still birth</option><option ng-selected="IndividualpregnanciesItem.outcome_of_delivery=='Miscarriage'" class="form-control col-md-7 col-xs-12" value="Miscarriage" >Miscarriage</option></select><label ng-repeat="error in moduleerrors.errors.outcome_of_delivery" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="sex"> Sex <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input type="radio" name="sex" ng-model="IndividualpregnanciesItem.sex"  value="male" > male <input type="radio" name="sex" ng-model="IndividualpregnanciesItem.sex"  value="female" > female <label ng-repeat="error in moduleerrors.errors.sex" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="child_present_condition"> Child's Present Condition <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="child_present_condition" name="child_present_condition"><option ng-selected="IndividualpregnanciesItem.child_present_condition=='Good'" class="form-control col-md-7 col-xs-12" value="Good" >Good</option><option ng-selected="IndividualpregnanciesItem.child_present_condition=='Poor'" class="form-control col-md-7 col-xs-12" value="Poor" >Poor</option><option ng-selected="IndividualpregnanciesItem.child_present_condition=='Died'" class="form-control col-md-7 col-xs-12" value="Died" >Died</option></select><label ng-repeat="error in moduleerrors.errors.child_present_condition" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="major_risk_factors"> Major Risk Factors <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="major_risk_factors" name="major_risk_factors"><option ng-selected="IndividualpregnanciesItem.major_risk_factors=='Select Option'" class="form-control col-md-7 col-xs-12" value="Select Option" >Select Option</option><option ng-selected="IndividualpregnanciesItem.major_risk_factors=='Previous CS'" class="form-control col-md-7 col-xs-12" value="Previous CS" >Previous CS</option><option ng-selected="IndividualpregnanciesItem.major_risk_factors=='Grand multiparity'" class="form-control col-md-7 col-xs-12" value="Grand multiparity" >Grand multiparity</option><option ng-selected="IndividualpregnanciesItem.major_risk_factors=='Previous Post-Partum Haemorrhage'" class="form-control col-md-7 col-xs-12" value="Previous Post-Partum Haemorrhage" >Previous Post-Partum Haemorrhage</option><option ng-selected="IndividualpregnanciesItem.major_risk_factors=='Previous Pregnancy Induced Hypertension'" class="form-control col-md-7 col-xs-12" value="Previous Pregnancy Induced Hypertension" >Previous Pregnancy Induced Hypertension</option></select><label ng-repeat="error in moduleerrors.errors.major_risk_factors" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="pregnancy_problems"> Problems during Pregnancy <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="IndividualpregnanciesItem.pregnancy_problems" type="text" id="pregnancy_problems" name="pregnancy_problems" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.pregnancy_problems" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="gestational_age"> Gestational Age at Birth <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="IndividualpregnanciesItem.gestational_age" type="text" id="gestational_age" name="gestational_age" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.gestational_age" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="birth_weight"> Birth Weight (kg) <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="IndividualpregnanciesItem.birth_weight" type="text" id="birth_weight" name="birth_weight" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.birth_weight" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="labour_complications"> Labour/ Postpartum Complications <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="IndividualpregnanciesItem.labour_complications" type="text" id="labour_complications" name="labour_complications" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.labour_complications" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="birth_mother_reg_no"> Mother Reg No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="birth_mother_reg_no" name="birth_mother_reg_no"><option ng-selected="IndividualpregnanciesItem.birth_mother_reg_no==Mothersitem.id" ng-repeat=" Mothersitem in Mothers" class="form-control col-md-7 col-xs-12" value="<% Mothersitem.id %>" ><% Mothersitem.mo_reg_no %></option></select><label ng-repeat="error in moduleerrors.errors.birth_mother_reg_no" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='IndividualpregnanciesItem.id' type="text" id="id" name="id" style="display: none" />
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