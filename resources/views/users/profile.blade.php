@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="{{asset('assets/js/angular.js')}}" ></script>
<script stype="text/javascript">
    var ngProfileApp = angular.module('ngProfileApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngProfileApp.controller('ngProfileController', function($scope) {
    $scope.user = {!! $data['user'] !!};
    });</script>
@stop
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>@lang('user_profile.module_title')</h3>
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
                    <h2>@lang('user_profile.module_form_title')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form  ng-app="ngProfileApp" ng-controller="ngProfileController" id="users-form" enctype="multipart/form-data" class="form-horizontal form-label-left" method="post" action='{!! route("userprofileupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('user_profile.name')<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='user.name' type="text" id="name" name='name' required="required" class="form-control col-md-7 col-xs-12" ><ul class="parsley-errors-list" ></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">@lang('user_profile.email')<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='user.email' type="text" id="email" name="email"  autocomplete="new-email" required="required" class="form-control col-md-7 col-xs-12" ><ul class="parsley-errors-list" ></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('user_profile.password')</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" class="form-control col-md-7 col-xs-12" type="password" name="password" autocomplete="new-password" ><ul class="parsley-errors-list" ></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('user_profile.profile_picture')</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="image" />
                            </div>
                        </div>
                        <input ng-model='user.id' type="text" id="id" name="id" style="display: none" />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary cancel">@lang('user_profile.cancel')</button>
                                <button type="submit" class="btn btn-success">@lang('user_profile.submit')</button>
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