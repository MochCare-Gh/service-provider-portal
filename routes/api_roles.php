<?php
Route::group(['middleware' => ['auth','permission:roles_all']],function(){
    Route::get('/users/getroles', array('uses' => 'RolesController@GetRoles', 'as' => 'getroles'));
    });
Route::group(['middleware' => ['auth','permission:roles_edit']],function(){
    Route::get('/roles/edit/{id}', array('uses' => 'RolesController@edit', 'as' => 'rolesedit'));
    });
Route::group(['middleware' => ['auth','permission:roles_create_update']],function(){
    Route::post('/roles/createorupdate', array('uses' => 'RolesController@CreateOrUpdate', 'as' => 'rolescreateorupdate'));
    });
Route::group(['middleware' => ['auth','permission:roles_delete']],function(){
    Route::get('/roles/delete/{id}', array('uses' => 'RolesController@Delete', 'as' => 'rolesdelete'));
});
Route::group(['middleware' => ['auth','permission:roles_delete_multiple']],function(){
    Route::delete('/roles/deletemultiple', array('uses' => 'RolesController@DeleteMultiple', 'as' => 'rolesdeletemultiple'));
});