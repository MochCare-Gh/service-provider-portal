<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Users Conttorller [Login,Register]
Route::post('/login', array('uses' => 'UsersController@auth'));
Route::post('/register', array('uses' => 'UsersController@RegisterPost'));

Route::group(['middleware' => ['auth:api']], function () {
        require(base_path() . '/routes/ApiCrudRoutes.php');
        require(base_path() . '/routes/api_roles.php');
        require(base_path() . '/routes/api_permissions.php');
        require(base_path() . '/routes/api_modulebuilder.php');
        require(base_path() . '/routes/api_users.php');
});

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

