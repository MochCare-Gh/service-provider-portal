<?php

//Users Controller
Route::group(['middleware' => ['auth','permission:user_all']],function(){
    Route::get('/users', array('uses' => 'UsersController@index', 'as' => 'users'));
    Route::get('/users/list', array('uses' => 'UsersController@All', 'as' => 'userslist'));
});
Route::group(['middleware' => ['auth','permission:user_edit']],function(){ 
    Route::get('/users/edit/{id}', array('uses' => 'UsersController@edit', 'as' => 'usersedit'));
});
Route::group(['middleware' => ['auth','permission:user_create_update']],function(){
    Route::post('/users/createorupdate', array('uses' => 'UsersController@CreateOrUpdate', 'as' => 'userscreateorupdate'));
});
Route::group(['middleware' => ['auth','permission:user_delete']],function(){
    Route::get('/users/delete/{id}', array('uses' => 'UsersController@Delete', 'as' => 'usersdelete'));
});
Route::group(['middleware' => ['auth','permission:user_delete_muliple']],function(){
    Route::delete('/users/delete_multiple',array('uses'=>'UsersController@DeleteMultiple','as'=>'usersdeletemultiple'));
});
//Profile
Route::group(['middleware' => ['auth','permission:user_profile']],function(){
    Route::get('/users/profile', array('uses' => 'UsersController@Profile', 'as' => 'userprofile'));
});
Route::group(['middleware' => ['auth','permission:user_profile_update']],function(){
    Route::post('/users/profileUpdate', array('uses' => 'UsersController@ProfileUpdate', 'as' => 'userprofileupdate'));
});
?>
