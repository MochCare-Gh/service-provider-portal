<!DOCTYPE html>
<html lang="en" @if(Config::get('sysconfig.direction')=='rtl') dir="rtl" @else dir="ltr" @endif>
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin_lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin_lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin_lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin_lte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_lte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin_lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin_lte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin_lte/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- jQuery -->
  <script src="{{ asset('admin_lte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- ajax form-->
  <script type="text/javascript" src="<?php echo asset('assets/js/jquery.form.min.js'); ?>"></script>
  <!-- extra resources --> 
  <link href="<?php echo asset('assets/css/icheck/flat/green.css'); ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/admin_lte_custom.css'); ?>" />
   @section('head')
   @show
</head>
    <body class="nav-md">

        <div class="wrapper">

   <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin_lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @forelse($all_menu_items as $menu_item)
        <?php //if (!empty(array_intersect(array('users','roles','permissions'), $user_permissions_names))): ?>          
        <li class="nav-item">
            <a href="{{ url('/')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Widgets</p>
            </a>
        </li>  
        <li class="nav-item" >                          
              <a href="@if($menu_item['type']=='module'){!! route($menu_item['url']) !!} @else {{ $menu_item['url'] }} @endif" class="nav-link @if(Ch::isActive($menu_item['url'])) active @endif">
              <i class="nav-icon fas fa {{ $menu_item['icon'] }}"></i>
              <p>
                    {{ $menu_item['name'] }}
                    @if(isset($menu_item['children']) && !empty($menu_item['children']))
                    <i class="right fas fa-angle-left"></i>
                    @endif

              </p>
              </a>
                @if(isset($menu_item['children']) && !empty($menu_item['children']))
                    <ul class="nav nav-treeview">
                    @forelse($menu_item['children'] as $menu_item_children)
                    <li class="nav-item">
                        <a href="@if($menu_item_children['type']=='module') {!! route($menu_item_children['url']) !!} @else {{ $menu_item_children['url'] }} @endif" class="nav-link ">
                          <i class="far fa-circle nav-icon"></i>
                          <p>{{ $menu_item_children['name'] }}</p>
                        </a>
                    </li>
                    @empty
                    @endforelse
                    </ul>
                @endif
            </li>
            @empty
            @endforelse
            @if(!empty(array_intersect(array('Invoices'), $user_permissions_names)) )
                <li class="nav-item">
                    <a href="{{  Route('InvoicesIndex') }}" class="nav-link @if(Ch::isActive('InvoicesIndex')) active @endif">
                      <i class="nav-icon fas fa fa-chart-bar"></i>
                      <p>Invoices</p>
                    </a>
                </li>                                    
            @endif
            @if(!empty(array_intersect(array('modulebuilder_menu', 'modulebuilder_modules'), $user_permissions_names)) && Config::get('sysconfig.crudbuilder'))                   
            <li class="nav-item @if(Ch::isActive(['modulebuildermenu','all_modules'])) menu-open @endif" >                          
                <a href="#" class="nav-link @if(Ch::isActive(['modulebuildermenu','all_modules'])) active @endif">
                <i class="nav-icon fa fa-cubes"></i>
                <p>
                      @lang('crud_builder.menu_title')
                      <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @if(in_array('modulebuilder_menu', $user_permissions_names))
                <li class="nav-item">
                    <a href="{{ Route('modulebuildermenu') }}" class="nav-link @if(Ch::isActive('modulebuildermenu')) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>@lang('menu.menu_title')</p>
                    </a>
                </li>
                @endif
                @if (in_array('modulebuilder_modules', $user_permissions_names))
                <li class="nav-item">
                    <a href="{{ Route('all_modules') }}" class="nav-link @if(Ch::isActive('all_modules')) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>@lang('modules.menu_title')</p>
                    </a>
                </li>
                @endif
                </ul>
            </li>
            @endif
            @if(!empty(array_intersect(array('users', 'roles_all', 'permissions'), $user_permissions_names)))                   
            <li class="nav-item @if(Ch::isActive(['users','roles','permissions'])) menu-open @endif" >                          
                <a href="#" class="nav-link @if(Ch::isActive(['users','roles','permissions'])) active @endif">
                <i class="nav-icon fa fa-users"></i>
                <p>
                      @lang('manage_users.menu_title')
                      <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @if(in_array('user_all', $user_permissions_names))
                <li class="nav-item">
                    <a href="{{ Route('users') }}" class="nav-link @if(Ch::isActive('users')) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>@lang('users.menu_title')</p>
                    </a>
                </li>
                @endif
                @if(in_array('roles_all', $user_permissions_names))
                <li class="nav-item">
                    <a href="{{ Route('roles') }}" class="nav-link @if(Ch::isActive('roles')) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>@lang('roles.menu_title')</p>
                    </a>
                </li>
                @endif
                @if (in_array('permissions_all', $user_permissions_names))
                <li class="nav-item">
                    <a href="{{ Route('permissions') }}" class="nav-link @if(Ch::isActive('permissions')) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>@lang('permissions.menu_title')</p>
                    </a>
                </li>
                @endif
                </ul>
            </li>
            @endif
            @if(!empty(array_intersect(array('filemanager'), $user_permissions_names)) && Config::get('sysconfig.filemanager'))                   
            <li class="nav-item @if(\URL::full()== url('admin/laravel-filemanager?type=Files') ) menu-open @endif" >                          
                <a href="#" class="nav-link @if(\URL::full()== url('admin/laravel-filemanager?type=Files')) active @endif">
                <i class="nav-icon fa fa-file"></i>
                <p>
                      @lang('file_manager.menu_title')
                      <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @if (in_array('filemanager', $user_permissions_names))
                <li class="nav-item">
                    <a href="{{ url('admin/laravel-filemanager') }}?type=Files" class="nav-link @if(\URL::full()== url('admin/laravel-filemanager?type=Files')) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>@lang('file_manager.menu_title')</p>
                    </a>
                </li>
                @endif
                </ul>
            </li>
            @endif
            @if(!empty(array_intersect(array('user_profile'), $user_permissions_names)))
            <li class="nav-item @if(Ch::isActive(['userprofile','general-settings'])) menu-open @endif" >                          
                <a href="#" class="nav-link @if(Ch::isActive(['userprofile','general-settings'])) active @endif">
                <i class="nav-icon fa fa-user-circle"></i>
                <p>
                @lang('account_settings.menu_title')
                      <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @if (in_array('user_profile', $user_permissions_names))
                <li class="nav-item">
                    <a href="{{ route('userprofile') }}" class="nav-link @if(Ch::isActive('userprofile')) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>@lang('user_profile.menu_title')</p>
                    </a>
                </li>
                @endif
                @if (in_array('general_settings_all', $user_permissions_names))
                <li class="nav-item">
                    <a href="{{ url('admin/general-settings') }}" class="nav-link @if(Ch::isActive('admin/general-settings')) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>@lang('general_settings.menu_title')</p>
                    </a>
                </li>
                @endif
                @if (in_array('translation-manager', $user_permissions_names))
                <li class="nav-item">
                    <a href="{{ url('admin/translations') }}" class="nav-link @if(\URL::full()==url('admin/translations')) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>@lang('translations.menu_title')</p>
                    </a>
                </li>
                @endif
                </ul>
            </li>
            @endif
            
            @if(!empty(array_intersect(array('user_profile'), $user_permissions_names)))
            <li class="nav-item @if(Ch::isActive('ApiDocumentationIndex')) menu-open @endif" >                          
                <a href="{{  Route('ApiDocumentationIndex') }}" class="nav-link @if(Ch::isActive('ApiDocumentationIndex')) active @endif">
                <i class="nav-icon fa fa fa-code"></i>
                <p>Api Documentation</p>
                </a>
            </li>
            @endif
            </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @section('content')
    This is the master content.
    @show
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
        @section('footer')
@show
<!-- icheck -->
 <script src="<?php echo asset('assets/js/icheck/icheck.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin_lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin_lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin_lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin_lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin_lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin_lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin_lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin_lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin_lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin_lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_lte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="{{ asset('admin_lte/dist/js/demo.js') }}"></script> -->
    </body>

</html>
