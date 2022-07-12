@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.6.1/angular-sanitize.js"></script>
<script stype="text/javascript">
    var ngBlogApp = angular.module('ngBlogApp', ['ngSanitize'], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngBlogApp.controller('ngBlogAppcontroller', function($scope) {
    $scope.BlogItem = {!! $data !!};
    $scope.Blog_categories={!! Modules\Blog\Entities\BlogCategories::all()->toJson() !!};
    $('#Blog-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog', ModuleItemName:'BlogItem', NgAppName:'ngBlogApp'});
    $('#Blog-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog', ModuleItemName:'BlogItem', NgAppName:'ngBlogApp'});
    $('#Blog-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog', ModuleItemName:'BlogItem', NgAppName:'ngBlogApp'});
    $('#Blog-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Blog', ModuleItemName:'BlogItem', NgAppName:'ngBlogApp'});
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Blog</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                  <form ng-app="ngBlogApp" ng-controller="ngBlogAppcontroller" id="Blog-form" class="form-horizontal form-label-left" method="post" action='{!! route("Blogcreateorupdate") !!}' autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                    <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <td>
                                        <%BlogItem.title%>
                                </td>
                            </tr>
                            <tr>
                                <td>Content</td>
                                <td >
                                    <p ng-bind-html="BlogItem.content"></p>    
                                </td>
                            </tr>
                            <tr>
                                <td>Meta tags</td>
                                <td>
                                        <%BlogItem.meta_tags%>
                                </td>
                            </tr>
                            <tr>
                                <td>Meta description</td>
                                <td>
                                        <%BlogItem.meta_description%>
                                </td>
                            </tr>
                            <tr>
                                <td>Slug</td>
                                <td>
                                        <%BlogItem.slug%>
                                </td>
                            </tr>
                            <tr>
                                <td>Excerpt</td>
                                <td>
                                        <%BlogItem.excerpt%>
                                </td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td ng-repeat=" Blog_categoriesitem in Blog_categories" ng-show="BlogItem.category==Blog_categoriesitem.id">
                                        <%Blog_categoriesitem.category_name%>
                                </td>
                            </tr>
                            <tr>
                                <td>Tags</td>
                                <td>
                                        <%BlogItem.tags%>
                                </td>
                            </tr>
                            <tr>
                                <td>Author Name</td>
                                <td>
                                        <%BlogItem.author_name%>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td ng-if="BlogItem.status == 1">
                                    Published
                                </td>
                                <td ng-if="BlogItem.status == 0">
                                    Draft
                                </td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>
                                    <img ng-src="{{ asset("/files") }}/<%BlogItem.image%>" width="200px" />
                                </td>
                            </tr>
                    </table>
                    <input ng-model='BlogItem.id' type="text" id="id" name="id" style="display: none" /> 
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