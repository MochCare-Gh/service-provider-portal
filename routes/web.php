<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
 Route::group(['prefix' => 'admin'], function (){
    Route::group(['middleware' => ['web']], function () {Route::group(['middleware' => ['web']], function () {

    Route::get('/CheckMigrationClass', 'ModuleBuilderController@CheckMigrationClass');
    //Route::get('auth/login', 'Auth\AuthController@getLogin');
    //Route::post('auth/login', 'Auth\AuthController@postLogin');
    //Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('/login', array('uses' => 'UsersController@Login', 'as' => 'login'));
    Route::post('/login', array('uses' => 'UsersController@auth', 'as' => 'loginPost'));
    Route::get('/register', array('uses' => 'UsersController@register', 'as' => 'register'));
    Route::post('/register', array('uses' => 'UsersController@RegisterPost', 'as' => 'registerPost'));
    Route::get('/install', array('uses' => 'InstallController@index'));
    Route::post('/install', array('uses' => 'InstallController@InstallProcess', 'as' => 'InstallProcess'));
    Route::get('/InstallstepTwo', array('uses' => 'InstallController@InstallStepTwo', 'as' => 'InstallStepTwo'));
    Route::post('/InstallMigration', array('uses' => 'InstallController@InstallMigration', 'as' => 'InstallMigration'));
    Route::get('/RegisterUserToAdmin', array('uses' => 'UsersController@RegisterUserToAdmin'));

    Route::get('privacy', 'UsersController@privacyPolicy');
    Route::get('login/facebook', array('uses' => 'UsersController@redirectToFacebookProvider', 'as' => 'facebookLogin'));
    Route::get('login/facebook/callback', 'UsersController@handleFacebookCallback');
    Route::get('login/google', array('uses' => 'UsersController@redirectToGoogleProvider', 'as' => 'googleLogin'));
    Route::get('login/google/callback', 'UsersController@handleGoogleCallback');
    Route::get('login/twitter', array('uses' => 'UsersController@redirectToTwitterProvider', 'as' => 'twitterLogin'));
    Route::get('login/twitter/callback', 'UsersController@handleTwitterCallback');
});

Route::group(['middleware' => ['web', 'auth', 'XSS']], function () {
    // List - create - Edit/id - Update/id - Delete/
    //Users Routes
    require(base_path() . '/routes/users.php');
    require(base_path() . '/routes/GeneralSettings.php');
});
Route::group(['middleware' => ['web', 'auth', 'permission:filemanager']], function () {
    Route::get('/filemanage', array('uses' => 'AdminController@FileManage'));
});
Route::group(['middleware' => ['web', 'auth', 'XSS']], function () {
    //Mange Roles
    require(base_path() . '/routes/roles.php');
});
Route::group(['middleware' => ['web', 'auth','XSS']], function () {
    //Manage Permissions 
    require(base_path() . '/routes/permissions.php');
});
Route::group(['middleware' => ['web', 'auth', 'permission:modulebuilder_modules|modulebuilder_menu', 'XSS']], function () {
    //ModuleBuilder
    require(base_path() . '/routes/modulebuilder.php');
});
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', ['uses' => 'AdminController@DashBoard','as'=>'dashboardIndex']);
    Route::get('/logout', array('uses' => 'UsersController@Logout', 'as' => 'logout'));
    //Crud Routes
    require(base_path() . '/routes/WebCrudRoutes.php');
    //Facebook
    Route::get('/facebookTest', array('uses' => 'FacebookController@facebookTest', 'as' => 'FacebookTest'));
    Route::get('/pdftest', array('uses' => 'ModuleBuilderController@GeneratePDF', 'as' => 'GeneratePDF'));
    Route::get('/api-documentation', array('uses'=>'ApiDocumentationController@index','as'=>'ApiDocumentationIndex'));
});

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
 
 Route::get('/formbuilder', 'ModuleBuilderController@getFormBuilder');
 
 Route::get('/site', 'SiteController@home')->name('site');
 Route::get('/blog-categories', 'SiteController@blogCategories');
 Route::get('/blog-categories/{id}', 'SiteController@blogCategory')->name('blogCategory');
 Route::get('/blogs/', 'SiteController@blogs')->name('blogs');
 Route::get('/blogs/{id}', 'SiteController@singleBlog')->name('singleBlog'); 
    Route::get('/CheckMigrationClass', 'ModuleBuilderController@CheckMigrationClass');
    //Route::get('auth/login', 'Auth\AuthController@getLogin');
    //Route::post('auth/login', 'Auth\AuthController@postLogin');
    //Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('/login', array('uses' => 'UsersController@Login', 'as' => 'login'));
    Route::post('/login', array('uses' => 'UsersController@auth', 'as' => 'loginPost'));
    Route::get('/register', array('uses' => 'UsersController@register', 'as' => 'register'));
    Route::post('/register', array('uses' => 'UsersController@RegisterPost', 'as' => 'registerPost'));
    Route::get('/install', array('uses' => 'InstallController@index'));
    Route::post('/install', array('uses' => 'InstallController@InstallProcess', 'as' => 'InstallProcess'));
    Route::get('/InstallstepTwo', array('uses' => 'InstallController@InstallStepTwo', 'as' => 'InstallStepTwo'));
    Route::post('/InstallMigration', array('uses' => 'InstallController@InstallMigration', 'as' => 'InstallMigration'));
    Route::get('/RegisterUserToAdmin', array('uses' => 'UsersController@RegisterUserToAdmin'));

    Route::get('privacy', 'UsersController@privacyPolicy');
    Route::get('login/facebook', array('uses' => 'UsersController@redirectToFacebookProvider', 'as' => 'facebookLogin'));
    Route::get('login/facebook/callback', 'UsersController@handleFacebookCallback');
    Route::get('login/google', array('uses' => 'UsersController@redirectToGoogleProvider', 'as' => 'googleLogin'));
    Route::get('login/google/callback', 'UsersController@handleGoogleCallback');
    Route::get('login/twitter', array('uses' => 'UsersController@redirectToTwitterProvider', 'as' => 'twitterLogin'));
    Route::get('login/twitter/callback', 'UsersController@handleTwitterCallback');
});

Route::group(['middleware' => ['web', 'auth', 'XSS']], function () {
    // List - create - Edit/id - Update/id - Delete/
    //Users Routes
    require(base_path() . '/routes/users.php');
    require(base_path() . '/routes/GeneralSettings.php');
});
Route::group(['middleware' => ['web', 'auth', 'permission:filemanager']], function () {
    Route::get('/filemanage', array('uses' => 'AdminController@FileManage'));
});
Route::group(['middleware' => ['web', 'auth', 'XSS']], function () {
    //Mange Roles
    require(base_path() . '/routes/roles.php');
});
Route::group(['middleware' => ['web', 'auth','XSS']], function () {
    //Manage Permissions 
    require(base_path() . '/routes/permissions.php');
});
Route::group(['middleware' => ['web', 'auth', 'permission:modulebuilder_modules|modulebuilder_menu', 'XSS']], function () {
    //ModuleBuilder
    require(base_path() . '/routes/modulebuilder.php');
});
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', ['uses' => 'AdminController@DashBoard','as'=>'dashboardIndex']);
    Route::get('/logout', array('uses' => 'UsersController@Logout', 'as' => 'logout'));
    //Crud Routes
    require(base_path() . '/routes/WebCrudRoutes.php');
    //Facebook
    Route::get('/facebookTest', array('uses' => 'FacebookController@facebookTest', 'as' => 'FacebookTest'));
    Route::get('/pdftest', array('uses' => 'ModuleBuilderController@GeneratePDF', 'as' => 'GeneratePDF'));
    Route::get('/api-documentation', array('uses'=>'ApiDocumentationController@index','as'=>'ApiDocumentationIndex'));
});

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
 
 Route::get('/formbuilder', 'ModuleBuilderController@getFormBuilder');
 
 Route::get('/site', 'SiteController@home')->name('site');
 Route::get('/blog-categories', 'SiteController@blogCategories');
 Route::get('/blog-categories/{id}', 'SiteController@blogCategory')->name('blogCategory');
 Route::get('/blogs/', 'SiteController@blogs')->name('blogs');
 Route::get('/blogs/{id}', 'SiteController@singleBlog')->name('singleBlog'); 
 Route::group(['middleware' => ['web']], function () {

    Route::get('/CheckMigrationClass', 'ModuleBuilderController@CheckMigrationClass');
    //Route::get('auth/login', 'Auth\AuthController@getLogin');
    //Route::post('auth/login', 'Auth\AuthController@postLogin');
    //Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('/login', array('uses' => 'UsersController@Login', 'as' => 'login'));
    Route::post('/login', array('uses' => 'UsersController@auth', 'as' => 'loginPost'));
    Route::get('/register', array('uses' => 'UsersController@register', 'as' => 'register'));
    Route::post('/register', array('uses' => 'UsersController@RegisterPost', 'as' => 'registerPost'));
    Route::get('/install', array('uses' => 'InstallController@index'));
    Route::post('/install', array('uses' => 'InstallController@InstallProcess', 'as' => 'InstallProcess'));
    Route::get('/InstallstepTwo', array('uses' => 'InstallController@InstallStepTwo', 'as' => 'InstallStepTwo'));
    Route::post('/InstallMigration', array('uses' => 'InstallController@InstallMigration', 'as' => 'InstallMigration'));
    Route::get('/RegisterUserToAdmin', array('uses' => 'UsersController@RegisterUserToAdmin'));

    Route::get('privacy', 'UsersController@privacyPolicy');
    Route::get('login/facebook', array('uses' => 'UsersController@redirectToFacebookProvider', 'as' => 'facebookLogin'));
    Route::get('login/facebook/callback', 'UsersController@handleFacebookCallback');
    Route::get('login/google', array('uses' => 'UsersController@redirectToGoogleProvider', 'as' => 'googleLogin'));
    Route::get('login/google/callback', 'UsersController@handleGoogleCallback');
    Route::get('login/twitter', array('uses' => 'UsersController@redirectToTwitterProvider', 'as' => 'twitterLogin'));
    Route::get('login/twitter/callback', 'UsersController@handleTwitterCallback');
});

Route::group(['middleware' => ['web', 'auth', 'XSS']], function () {
    // List - create - Edit/id - Update/id - Delete/
    //Users Routes
    require(base_path() . '/routes/users.php');
    require(base_path() . '/routes/GeneralSettings.php');
});
Route::group(['middleware' => ['web', 'auth', 'permission:filemanager']], function () {
    Route::get('/filemanage', array('uses' => 'AdminController@FileManage'));
});
Route::group(['middleware' => ['web', 'auth', 'XSS']], function () {
    //Mange Roles
    require(base_path() . '/routes/roles.php');
});
Route::group(['middleware' => ['web', 'auth','XSS']], function () {
    //Manage Permissions 
    require(base_path() . '/routes/permissions.php');
});
Route::group(['middleware' => ['web', 'auth', 'permission:modulebuilder_modules|modulebuilder_menu', 'XSS']], function () {
    //ModuleBuilder
    require(base_path() . '/routes/modulebuilder.php');
});
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', ['uses' => 'AdminController@DashBoard','as'=>'dashboardIndex']);
    Route::get('/logout', array('uses' => 'UsersController@Logout', 'as' => 'logout'));
    //Crud Routes
    require(base_path() . '/routes/WebCrudRoutes.php');
    //Facebook
    Route::get('/facebookTest', array('uses' => 'FacebookController@facebookTest', 'as' => 'FacebookTest'));
    Route::get('/pdftest', array('uses' => 'ModuleBuilderController@GeneratePDF', 'as' => 'GeneratePDF'));
    Route::get('/api-documentation', array('uses'=>'ApiDocumentationController@index','as'=>'ApiDocumentationIndex'));
});

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
 
 Route::get('/formbuilder', 'ModuleBuilderController@getFormBuilder');
});

 Route::get('/', 'SiteController@home')->name('site');
 Route::get('/blog-categories', 'SiteController@blogCategories');
 Route::get('/blog-categories/{id}', 'SiteController@blogCategory')->name('blogCategory');
 Route::get('/blogs/', 'SiteController@blogs')->name('blogs');
 Route::get('/blogs/{id}', 'SiteController@singleBlog')->name('singleBlog');