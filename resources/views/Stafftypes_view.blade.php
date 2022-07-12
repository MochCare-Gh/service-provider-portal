@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngStafftypesApp = angular.module('ngStafftypesApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngStafftypesApp.controller('ngStafftypesAppcontroller', function($scope) {
    $scope.StafftypesItem = {!! $data !!};
    
    $('#Stafftypes-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Stafftypes', ModuleItemName:'StafftypesItem', NgAppName:'ngStafftypesApp'});
    $('#Stafftypes-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Stafftypes', ModuleItemName:'StafftypesItem', NgAppName:'ngStafftypesApp'});
    $('#Stafftypes-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Stafftypes', ModuleItemName:'StafftypesItem', NgAppName:'ngStafftypesApp'});
    $('#Stafftypes-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Stafftypes', ModuleItemName:'StafftypesItem', NgAppName:'ngStafftypesApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Stafftypes</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form  ng-app="ngStafftypesApp" ng-controller="ngStafftypesAppcontroller" id="Stafftypes-form" class="form-horizontal form-label-left" method="post" action='{!! route("Stafftypescreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped" ><tr><td >Staff Type Name</td><td><%StafftypesItem.type_name%></td></tr></table>
                        <input ng-model='StafftypesItem.id' type="text" id="id" name="id" style="display: none" />
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