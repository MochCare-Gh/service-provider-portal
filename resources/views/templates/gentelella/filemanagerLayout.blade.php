<!DOCTYPE html>
<html lang="en" @if(Config::get('sysconfig.direction')=='rtl') dir="rtl" @else dir="ltr" @endif>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <!-- Bootstrap core CSS -->
        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#333844">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#333844">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#333844">

        <title>{{ trans('laravel-filemanager::lfm.title-page') }}</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/72px color.png') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css">
        <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/cropper.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/dropzone.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/mime-icons.min.css') }}">
        <style>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/css/lfm.css')) !!}</style>
        {{-- Use the line below instead of the above if you need to cache the css. --}}
        {{-- <link rel="stylesheet" href="{{ asset('/vendor/laravel-filemanager/css/lfm.css') }}"> --}}

        <link href="<?php echo asset('assets/fonts/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- Custom styling plus plugins -->
        @if(Config::get('sysconfig.direction')=='ltr')
        <link href="<?php echo asset('assets/css/gentelella_custom.css'); ?>" rel="stylesheet">
        @elseif(Config::get('sysconfig.direction')=='rtl')
        <link href="<?php echo asset('assets/css/custom-rtl2.css'); ?>" rel="stylesheet">
        @endif

        <link href="<?php echo asset('assets/css/icheck/flat/green.css'); ?>" rel="stylesheet" />
        <link href="<?php echo asset('assets/css/floatexamples.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('assets/css/app-builder.css'); ?>" rel="stylesheet" type="text/css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <style>
        .container{max-width: 100%}
        .nav {
            margin-bottom: 0;
            padding-left: 0;
            list-style: none;
        }
        .nav > li {
            position: relative;
            display: block;
        }
        .nav.side-menu > li{
            width: 100%
        }
        .nav.child_menu li{width: 100%}
        .grid{overflow: scroll;display: inherit !important;}
        </style>
        
        @section('head')
        @show
    </head>
    <body class="nav-md">

        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">                    
                        <div class="clearfix"></div>
                        <!-- menu prile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="@if(Auth::user()->image)@if(file_exists(public_path('photos/'.Auth::user()->image))){{ asset('photos/'.Auth::user()->image) }}@else{{ Auth::user()->image }} @endif @else{{ asset('/photos/img.jpg') }}@endif" alt="..." class="img-circle profile_img rounded-circle">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2><?php echo session('name'); ?></h2>
                            </div>
                        </div>
                        <!-- /menu prile quick info -->
                        <br />
                        <!-- sidebar menu -->
                       <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
                                    <li>
                                        <a href="{{  Route('dashboardIndex') }}">
                                            <i class="fa fa-dashboard"></i> DashBoard
                                        </a>
                                        <ul class="nav child_menu" style="display: none;"></ul>
                                    </li>
                                    @forelse($all_menu_items as $menu_item)
                                    <?php //if (!empty(array_intersect(array('users','roles','permissions'), $user_permissions_names))): ?>
                                    <li>
                                        <a href="@if($menu_item['type']=='module'){!! route($menu_item['url']) !!} @else {{ $menu_item['url'] }} @endif"><i class="fa {{ $menu_item['icon'] }}"></i> {{ $menu_item['name'] }} 
                                            @if(isset($menu_item['children']) && !empty($menu_item['children']))
                                            <span class="fa fa-chevron-down"></span>
                                            @endif
                                        </a>
                                        <ul class="nav child_menu" style="display: none">
                                            @forelse($menu_item['children'] as $menu_item_children)
                                            <li><a href="@if($menu_item_children['type']=='module') {!! route($menu_item_children['url']) !!} @else {{ $menu_item_children['url'] }} @endif"> {{ $menu_item_children['name'] }}</a></li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                    @empty
                                    @endforelse
                                    @if(!empty(array_intersect(array('Invoices'), $user_permissions_names)) )
                                    <li>
                                        <a href="{{  Route('InvoicesIndex') }}">
                                            <i class="fa fa-area-chart"></i> Invoices
                                        </a>
                                        <ul class="nav child_menu" style="display: none;"></ul>
                                    </li>
                                    @endif
                                    @if(!empty(array_intersect(array('modulebuilder_menu', 'modulebuilder_modules'), $user_permissions_names)) && Config::get('sysconfig.crudbuilder'))
                                    <li><a><i class="fa fa-cubes"></i>@lang('crud_builder.menu_title')<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            @if(in_array('modulebuilder_menu', $user_permissions_names))
                                            <li><a href="{{ Route('modulebuildermenu') }}">@lang('menu.menu_title')</a></li>
                                            @endif
                                            @if (in_array('modulebuilder_modules', $user_permissions_names))
                                            <li><a href="{{ Route('all_modules') }}">@lang('modules.menu_title')</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                    @endif
                                    @if(!empty(array_intersect(array('users', 'roles_all', 'permissions'), $user_permissions_names)))
                                    <li><a><i class="fa fa-users"></i> @lang('manage_users.menu_title') <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            @if(in_array('user_all', $user_permissions_names))
                                            <li><a href="<?php echo Route('users'); ?>">@lang('users.menu_title')</a></li>
                                            @endif
                                            @if(in_array('roles_all', $user_permissions_names))
                                            <li><a href="{{ Route('roles') }}">@lang('roles.menu_title')</a></li>
                                            @endif
                                            @if (in_array('permissions_all', $user_permissions_names))
                                            <li><a href="<?php echo Route('permissions'); ?>">@lang('permissions.menu_title')</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                    @endif
                                    @if(!empty(array_intersect(array('filemanager'), $user_permissions_names)) && Config::get('sysconfig.filemanager'))
                                    <li><a><i class="fa fa-file-o"></i> @lang('file_manager.menu_title') <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            @if (in_array('filemanager', $user_permissions_names))
                                            <li><a href="{{ url('admin/laravel-filemanager') }}?type=Files">@lang('file_manager.menu_title')</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                    @endif
                                    @if(!empty(array_intersect(array('user_profile'), $user_permissions_names)))
                                    <li><a><i class="fa fa-user-circle"></i> @lang('account_settings.menu_title') <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            @if (in_array('user_profile', $user_permissions_names))
                                            <li><a href="{{ Route('userprofile') }}">@lang('user_profile.menu_title')</a></li>
                                            @endif
                                            @if (in_array('general_settings_all', $user_permissions_names))
                                            <li><a href="{{ Route('general-settings') }}">@lang('general_settings.menu_title')</a></li>
                                            @endif
                                            @if (in_array('translation-manager', $user_permissions_names))
                                            <li><a href="{{ url('admin/translations') }}">@lang('translations.menu_title')</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{  Route('ApiDocumentationIndex') }}">
                                            <i class="fa fa-code"></i> Api Documentation
                                        </a>
                                        <ul class="nav child_menu" style="display: none;"></ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a  data-toggle="tooltip" data-placement="top" title="Settings" href="{{ route('general-settings') }}">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a class="fullscreen" data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="openFullscreen()">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a class="fullscreen-exit" data-toggle="tooltip" data-placement="top" title="FullScreenExit" onclick="closeFullscreen()" style="display: none">
                                <span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ Route('logout') }}">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav float-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo asset('assets/images/img.jpg'); ?>" alt=""><?php echo session('name'); ?>
                                        <span class="  fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right" style="z-index: 1000000;">
                                        <?php if (in_array('user-profile-view', $user_permissions_names)): ?>
                                            <li><a href="{{ route('userprofile') }}">  Profile</a></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo Route('logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->


                <!-- page content -->
                <div class="right_col" role="main">
                    @section('content')
                    This is the master content.
                    @show
                </div>
                <!-- /page content -->
            </div>

        </div>
        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>
        <script src="<?php echo asset('assets/js/custom.js'); ?>"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- /footer content -->

        @section('footer')
        @show
    </body>

</html>
