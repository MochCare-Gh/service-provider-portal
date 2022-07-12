@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngMothersApp = angular.module('ngMothersApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngMothersApp.controller('ngMothersAppcontroller', function($scope) {
    $scope.MothersItem = {!! $data !!};
    $scope.Districts={!! App\Districts::all()->toJson() !!};$scope.Staff={!! App\Staff::all()->toJson() !!};
    $('#Mothers-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Mothers', ModuleItemName:'MothersItem', NgAppName:'ngMothersApp'});
    $('#Mothers-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Mothers', ModuleItemName:'MothersItem', NgAppName:'ngMothersApp'});
    $('#Mothers-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Mothers', ModuleItemName:'MothersItem', NgAppName:'ngMothersApp'});
    $('#Mothers-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Mothers', ModuleItemName:'MothersItem', NgAppName:'ngMothersApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Mothers</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngMothersApp" ng-controller="ngMothersAppcontroller" id="Mothers-form" class="form-horizontal form-label-left" method="post" action='{!! route("Motherscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Serial No.</td><td><%MothersItem.mo_serial_no%></td></tr><tr><td >Registration No.</td><td><%MothersItem.mo_reg_no%></td></tr><tr><td >NHIS No.</td><td><%MothersItem.mo_nhis_no%></td></tr><tr><td >Full name</td><td><%MothersItem.mo_fullname%></td></tr><tr><td >Date of Birth</td><td><%MothersItem.mo_dob%></td></tr><tr><td >Age</td><td><%MothersItem.mo_age%></td></tr><tr><td >Address</td><td><%MothersItem.mo_address%></td></tr><tr><td >District</td><td   ng-repeat=" Districtsitem in Districts" ng-show="MothersItem.mo_district==Districtsitem.id" ><%Districtsitem.dist_name%></td></tr><tr><td >Landmark</td><td><%MothersItem.mo_landmark%></td></tr><tr><td >Marital Status</td><td><%MothersItem.mo_marital_status%></td></tr><tr><td >Contact 1</td><td><%MothersItem.mo_contact_1%></td></tr><tr><td >Contact 2</td><td><%MothersItem.mo_contact_2%></td></tr><tr><td >Educational Status</td><td><%MothersItem.mo_education_status%></td></tr><tr><td >Occupation</td><td><%MothersItem.mo_occupation%></td></tr><tr><td >Profession</td><td><%MothersItem.mo_profession%></td></tr><tr><td >Spouse's name</td><td><%MothersItem.mo_spouse_name%></td></tr><tr><td >Spouse Contact</td><td><%MothersItem.mo_spouse_contact%></td></tr><tr><td >Spouse Address</td><td><%MothersItem.mo_spouse_address%></td></tr><tr><td >Spouse Occupation</td><td><%MothersItem.mo_spouse_occupation%></td></tr><tr><td >Emergency Contact Person</td><td><%MothersItem.mo_emergency_person%></td></tr><tr><td >Emergency Contact</td><td><%MothersItem.mo_emergency_contact%></td></tr><tr><td >Staff</td><td   ng-repeat=" Staffitem in Staff" ng-show="MothersItem.staff==Staffitem.id" ><%Staffitem.staff_name%></td></tr><tr><td >Rgistration date</td><td><%MothersItem.mo_reg_date%></td></tr></table>
                        <input ng-model='MothersItem.id' type="text" id="id" name="id" style="display: none" />
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