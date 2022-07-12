@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngChildgrowthApp = angular.module('ngChildgrowthApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngChildgrowthApp.controller('ngChildgrowthAppcontroller', function($scope) {
    $scope.ChildgrowthItem = {!! $data !!};
    $scope.Staff={!! App\Staff::all()->toJson() !!};$scope.Mothers={!! App\Mothers::all()->toJson() !!};
    $('#Childgrowth-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Childgrowth', ModuleItemName:'ChildgrowthItem', NgAppName:'ngChildgrowthApp'});
    $('#Childgrowth-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Childgrowth', ModuleItemName:'ChildgrowthItem', NgAppName:'ngChildgrowthApp'});
    $('#Childgrowth-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Childgrowth', ModuleItemName:'ChildgrowthItem', NgAppName:'ngChildgrowthApp'});
    $('#Childgrowth-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Childgrowth', ModuleItemName:'ChildgrowthItem', NgAppName:'ngChildgrowthApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Childgrowth</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngChildgrowthApp" ng-controller="ngChildgrowthAppcontroller" id="Childgrowth-form" class="form-horizontal form-label-left" method="post" action='{!! route("Childgrowthcreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Date</td><td><%ChildgrowthItem.date%></td></tr><tr><td >Weight</td><td><%ChildgrowthItem.weight%></td></tr><tr><td >Age (months)</td><td><%ChildgrowthItem.age%></td></tr><tr><td >Length/Height (cm)</td><td><%ChildgrowthItem.length%></td></tr><tr><td >Complaints / Remarks</td><td><%ChildgrowthItem.complaints%></td></tr><tr><td >Name of Midwife / Nurse</td><td   ng-repeat=" Staffitem in Staff" ng-show="ChildgrowthItem.staff_id==Staffitem.id" ><%Staffitem.staff_name%></td></tr><tr><td >Child's Reg No.</td><td><%ChildgrowthItem.ch_reg_no%></td></tr><tr><td >Mother's Reg No.</td><td   ng-repeat=" Mothersitem in Mothers" ng-show="ChildgrowthItem.mo_reg_no==Mothersitem.id" ><%Mothersitem.mo_reg_no%></td></tr></table>
                        <input ng-model='ChildgrowthItem.id' type="text" id="id" name="id" style="display: none" />
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