@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
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
            <h3>View Postnatalrecords</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngPostnatalrecordsApp" ng-controller="ngPostnatalrecordsAppcontroller" id="Postnatalrecords-form" class="form-horizontal form-label-left" method="post" action='{!! route("Postnatalrecordscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Date</td><td><%PostnatalrecordsItem.date%></td></tr><tr><td >Weight (kg)</td><td><%PostnatalrecordsItem.weight%></td></tr><tr><td >BP (mmHg)</td><td><%PostnatalrecordsItem.bp%></td></tr><tr><td >Urine</td><td><%PostnatalrecordsItem.urine%></td></tr><tr><td >Pulse</td><td><%PostnatalrecordsItem.pulse%></td></tr><tr><td >Fundal Height (cm)</td><td><%PostnatalrecordsItem.fundal_height%></td></tr><tr><td >Temperature</td><td><%PostnatalrecordsItem.temperature%></td></tr><tr><td >Lochia Colour/Odour</td><td><%PostnatalrecordsItem.lochia_colour%></td></tr><tr><td >Condition of Breast  & nipple</td><td><%PostnatalrecordsItem.breast_condition%></td></tr><tr><td >No. of days IFA supplied</td><td><%PostnatalrecordsItem.ifa_supplied_days%></td></tr><tr><td >Complaints/Remarks</td><td><%PostnatalrecordsItem.complaints%></td></tr><tr><td >Name of Midwife/Nurse</td><td   ng-repeat=" Staffitem in Staff" ng-show="PostnatalrecordsItem.staff_id==Staffitem.id" ><%Staffitem.staff_name%></td></tr><tr><td >Incision Perineum/CS</td><td><%PostnatalrecordsItem.incision_perineum%></td></tr><tr><td >Mood Changes</td><td><%PostnatalrecordsItem.mood_changes%></td></tr><tr><td >Mother's Reg No.</td><td   ng-repeat=" Mothersitem in Mothers" ng-show="PostnatalrecordsItem.mo_reg_no==Mothersitem.id" ><%Mothersitem.mo_reg_no%></td></tr></table>
                        <input ng-model='PostnatalrecordsItem.id' type="text" id="id" name="id" style="display: none" />
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