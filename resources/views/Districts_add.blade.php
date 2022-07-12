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
    var ngDistrictsApp = angular.module('ngDistrictsApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngDistrictsApp.controller('ngDistrictsAppcontroller', function($scope) {
    $scope.user = [];
    $scope.Personnels={!! App\Personnels::all()->toJson() !!};$scope.Region={!! App\Region::all()->toJson() !!};
    $('#Districts-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Districts', ModuleItemName:'DistrictsItem', NgAppName:'ngDistrictsApp'});
    $('#Districts-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Districts', ModuleItemName:'DistrictsItem', NgAppName:'ngDistrictsApp'});
    $('#Districts-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Districts', ModuleItemName:'DistrictsItem', NgAppName:'ngDistrictsApp'});
    $('#Districts-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Districts', ModuleItemName:'DistrictsItem', NgAppName:'ngDistrictsApp',
    callback:function(){ window.location.replace('{!! route("DistrictsIndex") !!}'); } });
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Add new Districts record</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Districts</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngDistrictsApp" ng-controller="ngDistrictsAppcontroller" id="Districts-form" class="form-horizontal form-label-left" method="post" action='{!! route("Districtscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="dist_name"> Distric Name <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="DistrictsItem.dist_name" type="text" id="dist_name" name="dist_name" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.dist_name" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="dist_code"> District Code <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="DistrictsItem.dist_code" type="text" id="dist_code" name="dist_code" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.dist_code" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="dist_personnel"> District Personnel <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="dist_personnel" name="dist_personnel"><option ng-selected="DistrictsItem.dist_personnel==Personnelsitem.id" ng-repeat=" Personnelsitem in Personnels" class="form-control col-md-7 col-xs-12" value="<% Personnelsitem.id %>" ><% Personnelsitem.per_name %></option></select><label ng-repeat="error in moduleerrors.errors.dist_personnel" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="dist_region"> Region <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="dist_region" name="dist_region"><option ng-selected="DistrictsItem.dist_region==Regionitem.id" ng-repeat=" Regionitem in Region" class="form-control col-md-7 col-xs-12" value="<% Regionitem.id %>" ><% Regionitem.reg_name %></option></select><label ng-repeat="error in moduleerrors.errors.dist_region" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='DistrictsItem.id' type="text" id="id" name="id" style="display: none" />
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