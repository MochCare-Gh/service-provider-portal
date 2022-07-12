@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngHealthfacilityApp = angular.module('ngHealthfacilityApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngHealthfacilityApp.controller('ngHealthfacilityAppcontroller', function($scope) {
    $scope.HealthfacilityItem = {!! $data !!};
    $scope.Districts={!! App\Districts::all()->toJson() !!};$scope.Facility={!! App\Facility::all()->toJson() !!};$scope.Category={!! App\Category::all()->toJson() !!};$scope.Personnels={!! App\Personnels::all()->toJson() !!};
    $('#Healthfacility-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Healthfacility', ModuleItemName:'HealthfacilityItem', NgAppName:'ngHealthfacilityApp'});
    $('#Healthfacility-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Healthfacility', ModuleItemName:'HealthfacilityItem', NgAppName:'ngHealthfacilityApp'});
    $('#Healthfacility-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Healthfacility', ModuleItemName:'HealthfacilityItem', NgAppName:'ngHealthfacilityApp'});
    $('#Healthfacility-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Healthfacility', ModuleItemName:'HealthfacilityItem', NgAppName:'ngHealthfacilityApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Healthfacility</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngHealthfacilityApp" ng-controller="ngHealthfacilityAppcontroller" id="Healthfacility-form" class="form-horizontal form-label-left" method="post" action='{!! route("Healthfacilitycreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Name</td><td><%HealthfacilityItem.name%></td></tr><tr><td >Location</td><td><%HealthfacilityItem.location%></td></tr><tr><td >District</td><td   ng-repeat=" Districtsitem in Districts" ng-show="HealthfacilityItem.district==Districtsitem.id" ><%Districtsitem.dist_name%></td></tr><tr><td >Facility type</td><td   ng-repeat=" Facilityitem in Facility" ng-show="HealthfacilityItem.facility_type==Facilityitem.id" ><%Facilityitem.fac_name%></td></tr><tr><td >Category</td><td   ng-repeat=" Categoryitem in Category" ng-show="HealthfacilityItem.category==Categoryitem.id" ><%Categoryitem.cat_name%></td></tr><tr><td >Representative</td><td   ng-repeat=" Personnelsitem in Personnels" ng-show="HealthfacilityItem.rep==Personnelsitem.id" ><%Personnelsitem.per_name%></td></tr></table>
                        <input ng-model='HealthfacilityItem.id' type="text" id="id" name="id" style="display: none" />
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