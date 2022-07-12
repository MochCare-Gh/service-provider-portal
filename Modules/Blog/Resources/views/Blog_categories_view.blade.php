@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngBlog_categoriesApp = angular.module('ngBlog_categoriesApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngBlog_categoriesApp.controller('ngBlog_categoriesAppcontroller', function($scope) {
    $scope.Blog_categoriesItem = {!! $data !!};
    
    $('#Blog_categories-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog_categories', ModuleItemName:'Blog_categoriesItem', NgAppName:'ngBlog_categoriesApp'});
    $('#Blog_categories-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog_categories', ModuleItemName:'Blog_categoriesItem', NgAppName:'ngBlog_categoriesApp'});
    $('#Blog_categories-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog_categories', ModuleItemName:'Blog_categoriesItem', NgAppName:'ngBlog_categoriesApp'});
    $('#Blog_categories-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog_categories', ModuleItemName:'Blog_categoriesItem', NgAppName:'ngBlog_categoriesApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Blog category</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form ng-app="ngBlog_categoriesApp" ng-controller="ngBlog_categoriesAppcontroller" id="Blog_categories-form" class="form-horizontal form-label-left" method="post" action='{!! route("Blog_categoriescreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <table class="table table-striped">
                                <tr>
                                    <td>Category Name</td>
                                    <td>
                                            <%Blog_categoriesItem.category_name%>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <input type="radio" name="status" ng-model="Blog_categoriesItem.status" value="1"> published
                                        <input type="radio" name="status" ng-model="Blog_categoriesItem.status" value="0"> draft 
                                    </td>

                                </tr>
                        </table>
                        <input ng-model='Blog_categoriesItem.id' type="text" id="id" name="id" style="display: none" /> 
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