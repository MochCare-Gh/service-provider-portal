@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngStaffApp = angular.module('ngStaffApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngStaffApp.controller('ngStaffAppcontroller', function($scope) {
    $scope.StaffItem = {!! $data !!};
    $scope.Stafftypes={!! App\Stafftypes::all()->toJson() !!};
    $('#Staff-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Staff', ModuleItemName:'StaffItem', NgAppName:'ngStaffApp'});
    $('#Staff-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Staff', ModuleItemName:'StaffItem', NgAppName:'ngStaffApp'});
    $('#Staff-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Staff', ModuleItemName:'StaffItem', NgAppName:'ngStaffApp'});
    $('#Staff-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Staff', ModuleItemName:'StaffItem', NgAppName:'ngStaffApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Staff</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngStaffApp" ng-controller="ngStaffAppcontroller" id="Staff-form" class="form-horizontal form-label-left" method="post" action='{!! route("Staffcreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Staff ID</td><td><%StaffItem.staff_id%></td></tr><tr><td >Staff name</td><td><%StaffItem.staff_name%></td></tr><tr><td >Designation</td><td   ng-repeat=" Stafftypesitem in Stafftypes" ng-show="StaffItem.staff_designation==Stafftypesitem.id" ><%Stafftypesitem.type_name%></td></tr><tr><td >Tel No.</td><td><%StaffItem.staff_tel%></td></tr></table>
                        <input ng-model='StaffItem.id' type="text" id="id" name="id" style="display: none" />
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