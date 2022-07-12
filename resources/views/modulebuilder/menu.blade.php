@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<script type='text/javascript'>var ListTable={ajax:{reload:function(){location.reload();}}}</script>
<script src="<?php echo asset('assets/js/jquery.nestable.js'); ?>" ></script>
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="{{asset('assets/js/angular.js')}}" ></script>
<script stype="text/javascript">
    var ngMenusApp = angular.module('ngMenusApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngMenusApp.controller('ngMenusController', function($scope) {
    $scope.user = [];
    $('#menus-form').Edit({Type:'GET', Data:{'_token':'<?php echo csrf_token(); ?>'}, ModuleName:'menus', ModuleItemName:'menu', NgAppName:'ngMenusApp'});
    $('#menus-form').Delete({Type:'GET', Data:{'_token':'<?php echo csrf_token(); ?>'}, ModuleName:'menus', ModuleItemName:'menu', NgAppName:'ngMenusApp'});
    $('#menus-form').Submit({Type:'POST', Data:{'_token':'<?php echo csrf_token(); ?>'}, ModuleName:'menus', ModuleItemName:'menu', NgAppName:'ngMenusApp'});
    });
</script>
<link href="{{ asset('assets/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">
<script type='text/javascript' src="{{ asset('assets/js/iconpicker.js') }}"></script>
<script type='text/javascript' src="{{ asset('assets/js/jquery.ui.pos.js') }}"></script>
<script type='text/javascript'>
    jQuery(document).ready(function(){
    $('#icon').iconpicker();    
    });
</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>@lang('menu.module_title')</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-7"><h2>@lang('menu.module_subtitle')</h2></div>
                        <div class="col-md-4 col-sm-4 col-xs-5">
                            <button class="btn btn-primary form-modal-button pull-right" data-toggle="modal" data-target=".form-modal">@lang('menu.module_add_new')</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dd">
                        <ol class="dd-list">
                            @forelse($MenuList as $MenuListItem)
                            <li class="dd-item dd3-item" data-id="{{ $MenuListItem->id }}">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">{{ $MenuListItem->name }} @if($MenuListItem->type=='menuItem') <a href="{{ route('modulebuilder_menusdelete',$MenuListItem->id) }}" >Delete</a>@endif</div>
                                @if($MenuListItem->Children->count()>0)
                                <ol class="dd-list">
                                    @foreach($MenuListItem->Children as $Child)
                                    <li class="dd-item dd3-item" data-id="{{ $Child->id }}">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content"> {{ $Child->name }} @if($Child->type=='menuItem') <a href="{{ route('modulebuilder_menusdelete',$Child->id) }}" >Delete</a>@endif</div>
                                    </li>
                                    @endforeach
                                </ol>
                                @endif
                            </li>
                            @empty
                            @endforelse
                    <!--        <li class="dd-item" data-id="1">
                                <div class="dd-handle">Item 1</div>
                            </li>
                            <li class="dd-item" data-id="2">
                                <div class="dd-handle">Item 2</div>
                            </li>
                            <li class="dd-item" data-id="3">
                                <div class="dd-handle">Item 3</div>
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="4">
                                        <div class="dd-handle">Item 4</div>
                                    </li>
                                    <li class="dd-item" data-id="5">
                                        <div class="dd-handle">Item 5</div>
                                    </li>
                                </ol>
                            </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    
    
    <!-- Form modal -->
    <div class="modal fade form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Module Name
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <form  ng-app="ngMenusApp" ng-controller="ngMenusController" id="menus-form" class="form-horizontal form-label-left" method="post" action='{!! route("modulebuilder_menuscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menu Item Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='menu.name' type="text" id="name" name='name' required="required" class="form-control col-md-7 col-xs-12" ><ul class="parsley-errors-list" ></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="icon">Icon<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='menu.icon' type="text" id="icon" name="icon"  autocomplete="new-icon" required="required" class="form-control col-md-7 col-xs-12" ><ul class="parsley-errors-list" ></ul>
                            </div>
                        </div>
                        <input ng-model='user.id' type="text" id="id" name="id" style="display: none" />
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
</div>






@stop
@section('footer')
<script type='text/javascript'>
    jQuery(document).ready(function(){
        jQuery('.dd').nestable({maxDepth:2}).on('change',function(){
            var menu=$(this).nestable('serialize');
            $.ajax({url:"{{ route('modulebuilder_save_menu_sorting') }}",type:'POST',data:{'_token':'{{ csrf_token() }}','menu': menu } });
                
        });
    });
</script>
<style type="text/css">
/**
 * Nestable
 */

.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}

/**
 * Nestable Extras
 */

.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

#nestable-menu { padding: 0; margin: 20px 0; }

#nestable-output,
#nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

#nestable2 .dd-handle {
    color: #fff;
    border: 1px solid #999;
    background: #bbb;
    background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
    background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
    background:         linear-gradient(top, #bbb 0%, #999 100%);
}
#nestable2 .dd-handle:hover { background: #bbb; }
#nestable2 .dd-item > button:before { color: #fff; }

@media only screen and (min-width: 700px) {

    .dd { float: left; width: 48%; }
    .dd + .dd { margin-left: 2%; }

}

.dd-hover > .dd-handle { background: #2ea8e5 !important; }

/**
 * Nestable Draggable Handles
 */

.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd3-content:hover { color: #2ea8e5; background: #fff; }

.dd-dragel > .dd3-item > .dd3-content { margin: 0; }

.dd3-item > button { margin-left: 30px; }

.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
    border: 1px solid #aaa;
    background: #ddd;
    background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:         linear-gradient(top, #ddd 0%, #bbb 100%);
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
.dd3-handle:hover { background: #ddd; }


    </style>
@stop