<?php
Route::group(['middleware' => ['web', 'auth', 'permission:general_settings_all']], function () {
    Route::get('/general-settings', array('uses' => 'GeneralSettingsController@index', 'as' => 'general-settings'));
});
Route::group(['middleware' => ['web', 'auth', 'permission:general_settings_create_update']], function () {
    Route::post('/general-settings/create_or_update', array('uses' => 'GeneralSettingsController@CreateOrUpdate', 'as' => 'GeneralSettingscreateorupdate'));
});
