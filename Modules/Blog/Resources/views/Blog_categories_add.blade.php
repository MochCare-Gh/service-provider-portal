@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
    <!-- PNotify -->
    <script type="text/javascript" src="{{ asset('assets/js/notify/pnotify.core.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/notify/pnotify.buttons.js')}} "></script>
    <script type="text/javascript" src="{{ asset('assets/js/notify/pnotify.nonblock.js')}}"></script>
<script stype="text/javascript">
    var ngBlog_categoriesApp = angular.module('ngBlog_categoriesApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngBlog_categoriesApp.controller('ngBlog_categoriesAppcontroller', function($scope) {
    $scope.user = [];
    
    $('#Blog_categories-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog_categories', ModuleItemName:'Blog_categoriesItem', NgAppName:'ngBlog_categoriesApp'});
    $('#Blog_categories-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog_categories', ModuleItemName:'Blog_categoriesItem', NgAppName:'ngBlog_categoriesApp'});
    $('#Blog_categories-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog_categories', ModuleItemName:'Blog_categoriesItem', NgAppName:'ngBlog_categoriesApp'});
    $('#Blog_categories-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog_categories', ModuleItemName:'Blog_categoriesItem', NgAppName:'ngBlog_categoriesApp',
        callback:function(){
                setTimeout(function(){window.location.assign("{{ route('Blog_categoriesIndex') }}");},2000); 
        }
    });
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Add new Blog category</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Blog category</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngBlog_categoriesApp" ng-controller="ngBlog_categoriesAppcontroller" id="Blog_categories-form" class="form-horizontal form-label-left" method="post" action='{!! route("Blog_categoriescreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_name"> Category Name <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input ng-model="Blog_categoriesItem.category_name" type="text" id="category_name" name="category_name" required="required" class="form-control col-md-7 col-xs-12" >
                                <label ng-repeat="error in moduleerrors.errors.category_name" ng-bind="error" class="error_label"   ></label>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status"> Status <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="radio" name="status" ng-checked="true" ng-model="Blog_categoriesItem.status"  value="1" > published
                                    <input type="radio" name="status" ng-model="Blog_categoriesItem.status"  value="0" > draft
                                    <label ng-repeat="error in moduleerrors.errors.status" ng-bind="error" class="error_label"   ></label>
                                </div>
                        </div>
                        <input ng-model='Blog_categoriesItem.id' type="text" id="id" name="id" style="display: none" />
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