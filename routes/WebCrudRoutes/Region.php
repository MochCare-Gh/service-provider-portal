<?php
Route::group(['middleware' => ['web', 'auth','permission:Region']],function(){
    Route::get('/Region/',array('uses'=>'RegionController@Index','as'=>'RegionIndex'));
    Route::get('/Region/list',array('uses'=>'RegionController@All','as'=>'Regionlist'));
    Route::post('/Region/create_or_update',array('uses'=>'RegionController@CreateOrUpdate','as'=>'Regioncreateorupdate'));
    Route::get('/Region/add',array('uses'=>'RegionController@add','as'=>'Regionadd'));
    Route::get('/Region/edit/{id}',array('uses'=>'RegionController@edit','as'=>'Regionedit'));
    Route::get('/Region/view/{id}',array('uses'=>'RegionController@view','as'=>'Regionview'));
    Route::post('/Region/update/{id}',array('uses'=>'RegionController@Update','as'=>'Regionupdate'));
    Route::delete('/Region/delete/{id}',array('uses'=>'RegionController@Delete','as'=>'Regiondelete'));
    Route::delete('/Region/delete_multiple', array('uses' => 'RegionController@DeleteMultiple', 'as' => 'Regiondeletemultiple'));
});
