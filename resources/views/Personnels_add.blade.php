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
    var ngPersonnelsApp = angular.module('ngPersonnelsApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngPersonnelsApp.controller('ngPersonnelsAppcontroller', function($scope) {
    $scope.user = [];
    
    $('#Personnels-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Personnels', ModuleItemName:'PersonnelsItem', NgAppName:'ngPersonnelsApp'});
    $('#Personnels-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Personnels', ModuleItemName:'PersonnelsItem', NgAppName:'ngPersonnelsApp'});
    $('#Personnels-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Personnels', ModuleItemName:'PersonnelsItem', NgAppName:'ngPersonnelsApp'});
    $('#Personnels-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Personnels', ModuleItemName:'PersonnelsItem', NgAppName:'ngPersonnelsApp',
    callback:function(){ window.location.replace('{!! route("PersonnelsIndex") !!}'); } });
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Add new Personnels record</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Personnels</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngPersonnelsApp" ng-controller="ngPersonnelsAppcontroller" id="Personnels-form" class="form-horizontal form-label-left" method="post" action='{!! route("Personnelscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="per_name"> Personnel name <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PersonnelsItem.per_name" type="text" id="per_name" name="per_name" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.per_name" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="per_contact"> Personnel Contact <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PersonnelsItem.per_contact" type="text" id="per_contact" name="per_contact" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.per_contact" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='PersonnelsItem.id' type="text" id="id" name="id" style="display: none" />
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