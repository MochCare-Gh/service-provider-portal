<?php

Route::group(['middleware' => ['web', 'auth', 'permission:permissions_all', 'XSS']], function () {
    Route::get('/users/permissions', array('uses' => 'PermissionsController@Permissions', 'as' => 'permissions'));
    Route::get('/users/getpermissions', array('uses' => 'PermissionsController@GetPermissions', 'as' => 'getpermissions'));
});
Route::group(['middleware' => ['web', 'auth', 'permission:permissions_edit', 'XSS']], function () {
    Route::get('/permissions/edit/{id}', array('uses' => 'PermissionsController@edit', 'as' => 'permissionsedit'));
});
Route::group(['middleware' => ['web', 'auth', 'permission:permissions_create_update', 'XSS']], function () {
    Route::post('/permissions/createorupdate', array('uses' => 'PermissionsController@CreateOrUpdate', 'as' => 'permissionscreateorupdate'));
});
Route::group(['middleware' => ['web', 'auth', 'permission:permissions_delete', 'XSS']], function () {
    Route::get('/permissions/delete/{id}', array('uses' => 'PermissionsController@Delete', 'as' => 'permissionsdelete'));
});
Route::group(['middleware' => ['web', 'auth', 'permission:permissions_delete_multiple', 'XSS']], function () {
    Route::delete('/permissions/deletemultiple', array('uses' => 'PermissionsController@DeleteMultiple', 'as' => 'permissionsdeletemultiple'));
});