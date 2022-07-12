<?php
Route::group(['middleware' => ['web', 'auth', 'permission:roles_all', 'XSS']], function () {
    Route::get('/users/roles', array('uses' => 'RolesController@Roles', 'as' => 'roles'));
    Route::get('/users/getroles', array('uses' => 'RolesController@GetRoles', 'as' => 'getroles'));
});
Route::group(['middleware' => ['web', 'auth', 'permission:roles_edit', 'XSS']], function () {
    Route::get('/roles/edit/{id}', array('uses' => 'RolesController@edit', 'as' => 'rolesedit'));
});
Route::group(['middleware' => ['web', 'auth', 'permission:roles_create_update', 'XSS']], function () {
    Route::post('/roles/createorupdate', array('uses' => 'RolesController@CreateOrUpdate', 'as' => 'rolescreateorupdate'));
});
Route::group(['middleware' => ['web', 'auth', 'permission:roles_delete', 'XSS']], function () {
    Route::get('/roles/delete/{id}', array('uses' => 'RolesController@Delete', 'as' => 'rolesdelete'));
});
Route::group(['middleware' => ['web', 'auth', 'permission:roles_delete_multiple', 'XSS']], function () {
    Route::delete('/roles/deletemultiple', array('uses' => 'RolesController@DeleteMultiple', 'as' => 'rolesdeletemultiple'));
});