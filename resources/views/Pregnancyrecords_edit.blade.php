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
    var ngPregnancyrecordsApp = angular.module('ngPregnancyrecordsApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngPregnancyrecordsApp.controller('ngPregnancyrecordsAppcontroller', function($scope) {
    $scope.PregnancyrecordsItem = {!! $data !!};
    $scope.Mothers={!! App\Mothers::all()->toJson() !!};
    $('#Pregnancyrecords-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Pregnancyrecords', ModuleItemName:'PregnancyrecordsItem', NgAppName:'ngPregnancyrecordsApp'});
    $('#Pregnancyrecords-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Pregnancyrecords', ModuleItemName:'PregnancyrecordsItem', NgAppName:'ngPregnancyrecordsApp'});
    $('#Pregnancyrecords-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Pregnancyrecords', ModuleItemName:'PregnancyrecordsItem', NgAppName:'ngPregnancyrecordsApp'});
    $('#Pregnancyrecords-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Pregnancyrecords', ModuleItemName:'PregnancyrecordsItem', NgAppName:'ngPregnancyrecordsApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Pregnancyrecords</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Pregnancyrecords</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngPregnancyrecordsApp" ng-controller="ngPregnancyrecordsAppcontroller" id="Pregnancyrecords-form" class="form-horizontal form-label-left" method="post" action='{!! route("Pregnancyrecordscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rec_mo_reg_no"> Mother's Reg. No. <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  class="form-control col-md-7 col-xs-12" id="rec_mo_reg_no" name="rec_mo_reg_no"><option ng-selected="PregnancyrecordsItem.rec_mo_reg_no==Mothersitem.id" ng-repeat=" Mothersitem in Mothers" class="form-control col-md-7 col-xs-12" value="<% Mothersitem.id %>" ><% Mothersitem.mo_reg_no %></option></select><label ng-repeat="error in moduleerrors.errors.rec_mo_reg_no" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rec_no_of_pregnancies"> No. of Pregnancies <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PregnancyrecordsItem.rec_no_of_pregnancies" type="text" id="rec_no_of_pregnancies" name="rec_no_of_pregnancies" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.rec_no_of_pregnancies" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rec_no_of_births"> No. of Births <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PregnancyrecordsItem.rec_no_of_births" type="text" id="rec_no_of_births" name="rec_no_of_births" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.rec_no_of_births" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rec_no_of_abortions"> No. of Abortions <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PregnancyrecordsItem.rec_no_of_abortions" type="text" id="rec_no_of_abortions" name="rec_no_of_abortions" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.rec_no_of_abortions" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rec_spontaneous"> Spontaneous <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PregnancyrecordsItem.rec_spontaneous" type="text" id="rec_spontaneous" name="rec_spontaneous" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.rec_spontaneous" ng-bind="error" class="error_label"   ></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rec_induced"> Induced <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="PregnancyrecordsItem.rec_induced" type="text" id="rec_induced" name="rec_induced" required="required" class="form-control col-md-7 col-xs-12" ><label ng-repeat="error in moduleerrors.errors.rec_induced" ng-bind="error" class="error_label"   ></div></div>
                        <input ng-model='PregnancyrecordsItem.id' type="text" id="id" name="id" style="display: none" />
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