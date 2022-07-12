@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="{{asset('assets/js/angular.js')}}" ></script>
<script stype="text/javascript">
    var ngSettingsApp = angular.module('ngSettingsApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngSettingsApp.controller('ngSettingsAppcontroller', function($scope) {
    $scope.SettingsItem =[];
    $scope.SettingsItem = {!! $data['Settings'] !!}[0];
    $scope.$apply();
    });</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>@lang('general_settings.module_title')</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('general_settings.module_form_title')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngSettingsApp" ng-controller="ngSettingsAppcontroller" id="Settings-form" class="form-horizontal form-label-left" method="post" action='{!! route("GeneralSettingscreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="registration">@lang('general_settings.registration')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="radio" name="registration"  @if(Config::get('sysconfig.registration')) checked @endif value="true" > <span>@lang('general_settings.enable')</span> 
                            <input type="radio" name="registration" @if(!Config::get('sysconfig.registration')) checked @endif value="false" > <span>@lang('general_settings.disable')</span> 
                        </div>
                        </div>
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="crudbuilder">@lang('general_settings.crud_builder')<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input type="radio" name="crudbuilder"  @if(Config::get('sysconfig.crudbuilder')) checked @endif value="true" > <span>@lang('general_settings.show')</span> <input type="radio" name="crudbuilder" @if(!Config::get('sysconfig.crudbuilder')) checked @endif   value="false" > <span>@lang('general_settings.hide')</span> </div></div>
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="filemanager">@lang('general_settings.file_manager')<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input type="radio" name="filemanager"  @if(Config::get('sysconfig.filemanager')) checked @endif value="true" > <span>@lang('general_settings.show')</span> <input type="radio" name="filemanager"   @if(!Config::get('sysconfig.filemanager')) checked @endif value="false" > <span>@lang('general_settings.hide')</span> </div></div>
                        <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="direction">@lang('general_settings.direction')<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input type="radio" name="direction"  value="ltr" @if(Config::get('sysconfig.direction')=='ltr') checked @endif> <span>@lang('general_settings.ltr')</span> <input type="radio" name="direction"  value="rtl" @if(Config::get('sysconfig.direction')=='rtl') checked @endif > <span>@lang('general_settings.rtl')</span> </div></div>
                        
                        <div class="form-group">                            
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direction">@lang('general_settings.language')<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="locale">
                                    <option @if(Config::get('sysconfig.language')=='ar') selected @endif value="ar">@lang('general_settings.arabic')</option>
                                    <option @if(Config::get('sysconfig.language')=='en') selected @endif value="en">@lang('general_settings.english')</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">                            
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direction">@lang('general_settings.theme')<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="theme">
                                    <option @if(Config::get('sysconfig.theme')=='gentellela') selected @endif value="gentelella">@lang('general_settings.gentelella')</option>
                                    <option @if(Config::get('sysconfig.theme')=='admin_lte') selected @endif value="admin_lte">@lang('general_settings.admin_lte')</option>
                                </select>
                            </div>
                        </div>
                        <input ng-model='SettingsItem.id' type="text" id="id" name="id" style="display: none" />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary cancel">@lang('general_settings.cancel')</button>
                                <button type="submit" class="btn btn-success">@lang('general_settings.submit')</button>
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

@stop