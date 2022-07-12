@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
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
            <h3>View Individualpregnancies</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngIndividualpregnanciesApp" ng-controller="ngIndividualpregnanciesAppcontroller" id="Individualpregnancies-form" class="form-horizontal form-label-left" method="post" action='{!! route("Individualpregnanciescreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Birth No.</td><td><%IndividualpregnanciesItem.birth_no%></td></tr><tr><td >Birth Date</td><td><%IndividualpregnanciesItem.birth_date%></td></tr><tr><td >Place of Birth</td><td><%IndividualpregnanciesItem.place_of_birth%></td></tr><tr><td >Mode of Delivery</td><td><%IndividualpregnanciesItem.mode_of_delivery%></td></tr><tr><td >Outcome of Delivery</td><td><%IndividualpregnanciesItem.outcome_of_delivery%></td></tr><tr><td >Sex</td><input type="radio" name="sex" ng-model="IndividualpregnanciesItem.sex"  value="male" > male <input type="radio" name="sex" ng-model="IndividualpregnanciesItem.sex"  value="female" > female </td></tr><tr><td >Child's Present Condition</td><td><%IndividualpregnanciesItem.child_present_condition%></td></tr><tr><td >Major Risk Factors</td><td><%IndividualpregnanciesItem.major_risk_factors%></td></tr><tr><td >Problems during Pregnancy</td><td><%IndividualpregnanciesItem.pregnancy_problems%></td></tr><tr><td >Gestational Age at Birth</td><td><%IndividualpregnanciesItem.gestational_age%></td></tr><tr><td >Birth Weight (kg)</td><td><%IndividualpregnanciesItem.birth_weight%></td></tr><tr><td >Labour/ Postpartum Complications</td><td><%IndividualpregnanciesItem.labour_complications%></td></tr><tr><td >Mother Reg No.</td><td   ng-repeat=" Mothersitem in Mothers" ng-show="IndividualpregnanciesItem.birth_mother_reg_no==Mothersitem.id" ><%Mothersitem.mo_reg_no%></td></tr></table>
                        <input ng-model='IndividualpregnanciesItem.id' type="text" id="id" name="id" style="display: none" />
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