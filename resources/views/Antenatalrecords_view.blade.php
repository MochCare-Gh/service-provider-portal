@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
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
            <h3>View Antenatalrecords</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngAntenatalrecordsApp" ng-controller="ngAntenatalrecordsAppcontroller" id="Antenatalrecords-form" class="form-horizontal form-label-left" method="post" action='{!! route("Antenatalrecordscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Date</td><td><%AntenatalrecordsItem.date%></td></tr><tr><td >Weight (kg)</td><td><%AntenatalrecordsItem.weight%></td></tr><tr><td >BP (mmHg)</td><td><%AntenatalrecordsItem.bp%></td></tr><tr><td >Urine</td><td><%AntenatalrecordsItem.urine%></td></tr><tr><td >Gestation Age (weeks)</td><td><%AntenatalrecordsItem.gest_age%></td></tr><tr><td >Fundal Height (cm)</td><td><%AntenatalrecordsItem.fundal_heights%></td></tr><tr><td >Presentation</td><td><%AntenatalrecordsItem.presentation%></td></tr><tr><td >Descent</td><td><%AntenatalrecordsItem.descent%></td></tr><tr><td >Fetal heart rate (/bpm)</td><td><%AntenatalrecordsItem.fetal_heart_rate%></td></tr><tr><td >No. of days IFA supplied</td><td><%AntenatalrecordsItem.ifa_supply_days%></td></tr><tr><td >Complaints/Remarks</td><td><%AntenatalrecordsItem.complaints%></td></tr><tr><td >Name of Midwife</td><td   ng-repeat=" Staffitem in Staff" ng-show="AntenatalrecordsItem.staff==Staffitem.id" ><%Staffitem.staff_name%></td></tr><tr><td >Mother's Reg No.</td><td   ng-repeat=" Mothersitem in Mothers" ng-show="AntenatalrecordsItem.mo_reg_no==Mothersitem.id" ><%Mothersitem.mo_reg_no%></td></tr></table>
                        <input ng-model='AntenatalrecordsItem.id' type="text" id="id" name="id" style="display: none" />
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