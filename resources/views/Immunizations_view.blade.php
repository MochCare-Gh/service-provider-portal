@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngImmunizationsApp = angular.module('ngImmunizationsApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngImmunizationsApp.controller('ngImmunizationsAppcontroller', function($scope) {
    $scope.ImmunizationsItem = {!! $data !!};
    $scope.Staff={!! App\Staff::all()->toJson() !!};
    $('#Immunizations-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Immunizations', ModuleItemName:'ImmunizationsItem', NgAppName:'ngImmunizationsApp'});
    $('#Immunizations-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Immunizations', ModuleItemName:'ImmunizationsItem', NgAppName:'ngImmunizationsApp'});
    $('#Immunizations-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Immunizations', ModuleItemName:'ImmunizationsItem', NgAppName:'ngImmunizationsApp'});
    $('#Immunizations-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Immunizations', ModuleItemName:'ImmunizationsItem', NgAppName:'ngImmunizationsApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Immunizations</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngImmunizationsApp" ng-controller="ngImmunizationsAppcontroller" id="Immunizations-form" class="form-horizontal form-label-left" method="post" action='{!! route("Immunizationscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Childs Reg No.</td><td><%ImmunizationsItem.ch_reg_no%></td></tr><tr><td >Mother's Reg No.</td><td><%ImmunizationsItem.mo_reg_no%></td></tr><tr><td >Age</td><td><%ImmunizationsItem.age%></td></tr><tr><td >Vaccine</td><td><%ImmunizationsItem.vaccine%></td></tr><tr><td >Batch No.</td><td><%ImmunizationsItem.batch_no%></td></tr><tr><td >Place given</td><td><%ImmunizationsItem.place_given%></td></tr><tr><td >Name of Midwife/Nurse</td><td   ng-repeat=" Staffitem in Staff" ng-show="ImmunizationsItem.staff_id==Staffitem.id" ><%Staffitem.staff_name%></td></tr><tr><td >Other vaccine ( if applicable )</td><td><%ImmunizationsItem.other_vaccine%></td></tr><tr><td >Date</td><td><%ImmunizationsItem.date%></td></tr></table>
                        <input ng-model='ImmunizationsItem.id' type="text" id="id" name="id" style="display: none" />
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