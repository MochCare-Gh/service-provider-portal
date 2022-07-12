@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngDeliveryoutcomeApp = angular.module('ngDeliveryoutcomeApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngDeliveryoutcomeApp.controller('ngDeliveryoutcomeAppcontroller', function($scope) {
    $scope.DeliveryoutcomeItem = {!! $data !!};
    $scope.Facility={!! App\Facility::all()->toJson() !!};$scope.Mothers={!! App\Mothers::all()->toJson() !!};
    $('#Deliveryoutcome-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Deliveryoutcome', ModuleItemName:'DeliveryoutcomeItem', NgAppName:'ngDeliveryoutcomeApp'});
    $('#Deliveryoutcome-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Deliveryoutcome', ModuleItemName:'DeliveryoutcomeItem', NgAppName:'ngDeliveryoutcomeApp'});
    $('#Deliveryoutcome-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Deliveryoutcome', ModuleItemName:'DeliveryoutcomeItem', NgAppName:'ngDeliveryoutcomeApp'});
    $('#Deliveryoutcome-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Deliveryoutcome', ModuleItemName:'DeliveryoutcomeItem', NgAppName:'ngDeliveryoutcomeApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Deliveryoutcome</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngDeliveryoutcomeApp" ng-controller="ngDeliveryoutcomeAppcontroller" id="Deliveryoutcome-form" class="form-horizontal form-label-left" method="post" action='{!! route("Deliveryoutcomecreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Date</td><td><%DeliveryoutcomeItem.date%></td></tr><tr><td >Weeks of Pregnancy</td><td><%DeliveryoutcomeItem.pregnancy_weeks%></td></tr><tr><td >Time of Delivery</td><td><%DeliveryoutcomeItem.delivery_time%></td></tr><tr><td >Time of Placenta delivery</td><td><%DeliveryoutcomeItem.placenta_delivery%></td></tr><tr><td >Duration of labour in delivery (H&m)</td><td><%DeliveryoutcomeItem.labour_in_delivery_duration%></td></tr><tr><td >Type of Delivery</td><td><%DeliveryoutcomeItem.delivery_type%></td></tr><tr><td >Indication of vacuum/CS</td><td><%DeliveryoutcomeItem.vacuum_indication%></td></tr><tr><td >Anesthesia</td><td><%DeliveryoutcomeItem.anesthesia%></td></tr><tr><td >Estimated blood loss (ml)</td><td><%DeliveryoutcomeItem.est_blood_loss%></td></tr><tr><td >Blood tranfusion</td><td><%DeliveryoutcomeItem.blood_transfusion%></td></tr><tr><td >State of Placenta & membranes</td><td><%DeliveryoutcomeItem.placenta_state%></td></tr><tr><td >State of Perineum</td><td><%DeliveryoutcomeItem.perineum_state%></td></tr><tr><td >Labour and Delivery Complications</td><td><%DeliveryoutcomeItem.delivery_complications%></td></tr><tr><td >Name of Birth attendant</td><td><%DeliveryoutcomeItem.birth_attendant%></td></tr><tr><td >Place of Delivery</td><td   ng-repeat=" Facilityitem in Facility" ng-show="DeliveryoutcomeItem.place_of_delivery==Facilityitem.id" ><%Facilityitem.fac_name%></td></tr><tr><td >Did breatfeeding start within 30min after delivery?</td><input type="radio" name="brestfeeding_30min" ng-model="DeliveryoutcomeItem.brestfeeding_30min"  value="Yes" > Yes <input type="radio" name="brestfeeding_30min" ng-model="DeliveryoutcomeItem.brestfeeding_30min"  value="No" > No </td></tr><tr><td >Was infant placed in skin to skin contact with mother?</td><input type="radio" name="infant_skin_to_skin" ng-model="DeliveryoutcomeItem.infant_skin_to_skin"  value="Yes" > Yes <input type="radio" name="infant_skin_to_skin" ng-model="DeliveryoutcomeItem.infant_skin_to_skin"  value="No" > No </td></tr><tr><td >Mother's Condition at Discharge</td><td><%DeliveryoutcomeItem.mothers_condition%></td></tr><tr><td >BP (mm/Hg)</td><td><%DeliveryoutcomeItem.bp%></td></tr><tr><td >Pulse (b/min)</td><td><%DeliveryoutcomeItem.pulse%></td></tr><tr><td >Temperature</td><td><%DeliveryoutcomeItem.temperature%></td></tr><tr><td >Condition of Uterus</td><td><%DeliveryoutcomeItem.uterus_condition%></td></tr><tr><td >Incision perineum/CS</td><td><%DeliveryoutcomeItem.incision_perineum%></td></tr><tr><td >Condition of Breast</td><td><%DeliveryoutcomeItem.breast_condition%></td></tr><tr><td >Fundal height (cm)</td><td><%DeliveryoutcomeItem.fundal_height%></td></tr><tr><td >Lochia colour</td><td><%DeliveryoutcomeItem.lochia_colour%></td></tr><tr><td >Lochia Odour</td><td><%DeliveryoutcomeItem.lochia_odour%></td></tr><tr><td >No. of days IFA Supplied</td><td><%DeliveryoutcomeItem.ifa_supply_days%></td></tr><tr><td >PNC Type</td><td><%DeliveryoutcomeItem.pnc_type_1%></td></tr><tr><td >Baby's Delivery Outcome</td><td><%DeliveryoutcomeItem.delivery_outcome%></td></tr><tr><td >Number of Babies</td><td><%DeliveryoutcomeItem.number_of_babies%></td></tr><tr><td >Sex of Baby</td><input type="radio" name="baby_sex" ng-model="DeliveryoutcomeItem.baby_sex"  value="Male" > Male <input type="radio" name="baby_sex" ng-model="DeliveryoutcomeItem.baby_sex"  value="Female" > Female </td></tr><tr><td >Weight (kg)</td><td><%DeliveryoutcomeItem.weight%></td></tr><tr><td >Length (cm)</td><td><%DeliveryoutcomeItem.length%></td></tr><tr><td >Head circumference</td><td><%DeliveryoutcomeItem.circumference%></td></tr><tr><td >APGAR Score</td><td><%DeliveryoutcomeItem.apgar_score%></td></tr><tr><td >Resuscitation</td><td><%DeliveryoutcomeItem.resuscitation%></td></tr><tr><td >Congenital Malformation</td><td><%DeliveryoutcomeItem.congenital_malformation%></td></tr><tr><td >Complications at Birth</td><td><%DeliveryoutcomeItem.complications%></td></tr><tr><td >Diagnosis</td><td><%DeliveryoutcomeItem.diagnosis%></td></tr><tr><td >Referred to</td><td><%DeliveryoutcomeItem.referred_to%></td></tr><tr><td >Heart rate (b/min)</td><td><%DeliveryoutcomeItem.heart_rate%></td></tr><tr><td >Respiratory rate (c/min)</td><td><%DeliveryoutcomeItem.respiratory_rate%></td></tr><tr><td >Breastfeeding/ Breast milk initiation</td><input type="radio" name="brestfeeding" ng-model="DeliveryoutcomeItem.brestfeeding"  value="Yes" > Yes <input type="radio" name="brestfeeding" ng-model="DeliveryoutcomeItem.brestfeeding"  value="No" > No </td></tr><tr><td >Baby suckling established</td><input type="radio" name="baby_suckling" ng-model="DeliveryoutcomeItem.baby_suckling"  value="Yes" > Yes <input type="radio" name="baby_suckling" ng-model="DeliveryoutcomeItem.baby_suckling"  value="No" > No </td></tr><tr><td >Meconium passed</td><input type="radio" name="meconium_passed" ng-model="DeliveryoutcomeItem.meconium_passed"  value="Yes" > Yes <input type="radio" name="meconium_passed" ng-model="DeliveryoutcomeItem.meconium_passed"  value="No" > No </td></tr><tr><td >Urine passed</td><input type="radio" name="urine_passed" ng-model="DeliveryoutcomeItem.urine_passed"  value="Yes" > Yes <input type="radio" name="urine_passed" ng-model="DeliveryoutcomeItem.urine_passed"  value="No" > No </td></tr><tr><td >Chloramphenicol/ Tetracycle for eye care</td><input type="radio" name="tetracycle_for_eyecare" ng-model="DeliveryoutcomeItem.tetracycle_for_eyecare"  value="Yes" > Yes <input type="radio" name="tetracycle_for_eyecare" ng-model="DeliveryoutcomeItem.tetracycle_for_eyecare"  value="No" > No </td></tr><tr><td >Cord care</td><input type="radio" name="cord_care" ng-model="DeliveryoutcomeItem.cord_care"  value="Yes" > Yes <input type="radio" name="cord_care" ng-model="DeliveryoutcomeItem.cord_care"  value="No" > No </td></tr><tr><td >Baby's Condition at discharge</td><td><%DeliveryoutcomeItem.baby_condition_discharge%></td></tr><tr><td >Mother's Registration No.</td><td   ng-repeat=" Mothersitem in Mothers" ng-show="DeliveryoutcomeItem.mo_reg_no==Mothersitem.id" ><%Mothersitem.mo_reg_no%></td></tr></table>
                        <input ng-model='DeliveryoutcomeItem.id' type="text" id="id" name="id" style="display: none" />
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