<?php
Route::group(['middleware' => ['auth','permission:Region']],function(){
    Route::get('/Region/list',array('uses'=>'RegionController@All','as'=>'api_Regionlist'));
    Route::post('/Region/create_or_update',array('uses'=>'RegionController@CreateOrUpdate','as'=>'api_Regioncreateorupdate'));
    Route::get('/Region/add',array('uses'=>'RegionController@add','as'=>'api_Regionadd'));
    Route::get('/Region/edit/{id}',array('uses'=>'RegionController@edit','as'=>'api_Regionedit'));
    Route::get('/Region/view/{id}',array('uses'=>'RegionController@view','as'=>'api_Regionview'));    
    Route::post('/Region/update/{id}',array('uses'=>'RegionController@Update','as'=>'api_Regionupdate'));
    Route::delete('/Region/delete/{id}',array('uses'=>'RegionController@Delete','as'=>'api_Regiondelete'));
    Route::delete('/Region/delete_multiple', array('uses' => 'RegionController@DeleteMultiple', 'as' => 'Regiondeletemultiple'));
});
