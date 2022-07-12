@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
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
            <h3>View Pregnancyrecords</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngPregnancyrecordsApp" ng-controller="ngPregnancyrecordsAppcontroller" id="Pregnancyrecords-form" class="form-horizontal form-label-left" method="post" action='{!! route("Pregnancyrecordscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Mother's Reg. No.</td><td   ng-repeat=" Mothersitem in Mothers" ng-show="PregnancyrecordsItem.rec_mo_reg_no==Mothersitem.id" ><%Mothersitem.mo_reg_no%></td></tr><tr><td >No. of Pregnancies</td><td><%PregnancyrecordsItem.rec_no_of_pregnancies%></td></tr><tr><td >No. of Births</td><td><%PregnancyrecordsItem.rec_no_of_births%></td></tr><tr><td >No. of Abortions</td><td><%PregnancyrecordsItem.rec_no_of_abortions%></td></tr><tr><td >Spontaneous</td><td><%PregnancyrecordsItem.rec_spontaneous%></td></tr><tr><td >Induced</td><td><%PregnancyrecordsItem.rec_induced%></td></tr></table>
                        <input ng-model='PregnancyrecordsItem.id' type="text" id="id" name="id" style="display: none" />
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