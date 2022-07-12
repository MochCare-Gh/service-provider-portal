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
            <h3>Edit Healthfacility</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Healthfacility</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngHealthfacilityApp" ng-controller="ngHealthfacilityAppcontroller" id="Healthfacility-form" class="form-horizontal form-label-left" method="post" action='{!! route("Healthfacilitycreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="HealthfacilityItem.name" type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.name" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="location"> Location <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="HealthfacilityItem.location" type="text" id="location" name="location" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.location" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="district"> District <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="district" name="district"><option ng-selected="HealthfacilityItem.district==Districtsitem.id" ng-repeat=" Districtsitem in Districts" class="form-control col-md-7 col-xs-12" value="<% Districtsitem.id %>" ><% Districtsitem.dist_name %></option></select><label ng-repeat="error in moduleerrors.errors.district" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="facility_type"> Facility type <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="facility_type" name="facility_type"><option ng-selected="HealthfacilityItem.facility_type==Facilityitem.id" ng-repeat=" Facilityitem in Facility" class="form-control col-md-7 col-xs-12" value="<% Facilityitem.id %>" ><% Facilityitem.fac_name %></option></select><label ng-repeat="error in moduleerrors.errors.facility_type" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="category"> Category <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="category" name="category"><option ng-selected="HealthfacilityItem.category==Categoryitem.id" ng-repeat=" Categoryitem in Category" class="form-control col-md-7 col-xs-12" value="<% Categoryitem.id %>" ><% Categoryitem.cat_name %></option></select><label ng-repeat="error in moduleerrors.errors.category" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rep"> Representative <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="rep" name="rep"><option ng-selected="HealthfacilityItem.rep==Personnelsitem.id" ng-repeat=" Personnelsitem in Personnels" class="form-control col-md-7 col-xs-12" value="<% Personnelsitem.id %>" ><% Personnelsitem.per_name %></option></select><label ng-repeat="error in moduleerrors.errors.rep" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='HealthfacilityItem.id' type="text" id="id" name="id" style="display: none" />
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