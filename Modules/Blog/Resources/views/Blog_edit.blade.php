@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
    <!-- PNotify -->
    <script type="text/javascript" src="{{ asset('assets/js/notify/pnotify.core.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/notify/pnotify.buttons.js')}} "></script>
    <script type="text/javascript" src="{{ asset('assets/js/notify/pnotify.nonblock.js')}}"></script>
<script stype="text/javascript">
    var ngBlogApp = angular.module('ngBlogApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngBlogApp.controller('ngBlogAppcontroller', function($scope) {
    $scope.BlogItem = {!! $data !!};
    $scope.Blog_categories={!! Modules\Blog\Entities\BlogCategories::all()->toJson() !!};
    $('#Blog-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog', ModuleItemName:'BlogItem', NgAppName:'ngBlogApp'});
    $('#Blog-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog', ModuleItemName:'BlogItem', NgAppName:'ngBlogApp'});
    $('#Blog-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog', ModuleItemName:'BlogItem', NgAppName:'ngBlogApp'});
    $('#Blog-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog', ModuleItemName:'BlogItem', NgAppName:'ngBlogApp'});
    });
    jQuery(document).ready(function(){
       $('#meta_tags').tagsInput({width: 'auto','placeholder':'Add Option' });
       $('#tags').tagsInput({width: 'auto','placeholder':'Add Option' });
    });
</script>
    <script src="{{ asset('assets/js/tags/jquery.tagsinput.min.js') }}"></script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Blog</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2>Blog</h2></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngBlogApp" ng-controller="ngBlogAppcontroller" id="Blog-form" class="form-horizontal form-label-left" method="post" action='{!! route("Blogcreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="col-lg-6">
                            <div class="form-group">
                              <label  for="title"> Title <span class="required">*</span></label>
                              <input ng-model="BlogItem.title" type="text" id="title" name="title" required="required" class="form-control">
                              <label ng-repeat="error in moduleerrors.errors.title" ng-bind="error" class="error_label"></label>
                            </div>
                            <div class="form-group">
                                    <label  for="content"> Content <span class="required">*</span></label>                                    
                                    <textarea ng-model="BlogItem.content" id="content" name="content" required="required" class="editor form-control"></textarea>
                                    <label ng-repeat="error in moduleerrors.errors.content" ng-bind="error" class="error_label"></label>
                            </div>
                            <div class="form-group">
                                    <label  for="meta_tags"> Meta tags <span class="required">*</span></label>
                                    <div style="position: relative" >
                                        <input type="text" ng-model="BlogItem.meta_tags" class="form-control" id="meta_tags" name="meta_tags">
                                        <label ng-repeat="error in moduleerrors.errors.meta_tags" ng-bind="error" class="error_label"></label>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label  for="meta_description"> Meta description <span class="required">*</span></label>
                                    <textarea ng-model="BlogItem.meta_description" id="meta_description" name="meta_description" required="required" class="form-control"></textarea>
                                    <label ng-repeat="error in moduleerrors.errors.meta_description" ng-bind="error" class="error_label"></label>                                    
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                    <label  for="slug"> Slug <span class="required">*</span></label>
                                    <input ng-model="BlogItem.slug" type="text" id="slug" name="slug" required="required" class="form-control">
                                    <label ng-repeat="error in moduleerrors.errors.slug" ng-bind="error" class="error_label"></label>
                            </div>
                            <div class="form-group">
                                    <label  for="excerpt"> Excerpt <span class="required">*</span></label>                                    
                                    <textarea ng-model="BlogItem.excerpt" id="excerpt" name="excerpt" required="required" class="form-control"></textarea>
                                    <label ng-repeat="error in moduleerrors.errors.excerpt" ng-bind="error" class="error_label"></label>
                            </div>
                            <div class="form-group">
                                    <label  for="category"> Category <span class="required">*</span></label>
                                    <select class="form-control" id="category" name="category">
                                            <option ng-selected="BlogItem.category==Blog_categoriesitem.id" ng-repeat=" Blog_categoriesitem in Blog_categories" class="form-control" value="<% Blog_categoriesitem.id %>">
                                                    <% Blog_categoriesitem.category_name %>
                                            </option>
                                    </select>
                                    <label ng-repeat="error in moduleerrors.errors.category" ng-bind="error" class="error_label"></label>
                            </div>
                            <div class="form-group">
                                    <label  for="tags"> Tags <span class="required">*</span></label>
                                    <div style="position: relative" >
                                        <input ng-model="BlogItem.tags" type="text" class="form-control" id="tags" name="tags">
                                        <label ng-repeat="error in moduleerrors.errors.tags" ng-bind="error" class="error_label"></label>
                                    </div>

                            </div>
                            <div class="form-group">
                                    <label  for="author_name"> Author Name <span class="required">*</span></label>                                    
                                    <input ng-model="BlogItem.author_name" type="text" id="author_name" name="author_name" required="required" class="form-control">
                                    <label ng-repeat="error in moduleerrors.errors.author_name" ng-bind="error" class="error_label"></label>
                            </div>
                            <div class="form-group">
                                    <label  for="status"> Status <span class="required">*</span></label>
                                    <select class="form-control" id="status" name="status">
                                            <option ng-selected="BlogItem.status=='published'" class="form-control" value="published">published</option>
                                            <option ng-selected="BlogItem.status=='draft'" class="form-control" value="draft">draft</option>
                                    </select>
                                    <label ng-repeat="error in moduleerrors.errors.status" ng-bind="error" class="error_label"></label>
                            </div>
                            <div class="form-group">
                                    <label  for="image"> Image <span class="required">*</span></label>
                                    <input ng-model="BlogItem.image" type="file" id="image" name="image" class="form-control">
                                    <label ng-repeat="error in moduleerrors.errors.image" ng-bind="error" class="error_label"></label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input ng-model='BlogItem.id' type="text" id="id" name="id" style="display: none" />
                            <div class="ln_solid"></div>
                        </div>                    
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