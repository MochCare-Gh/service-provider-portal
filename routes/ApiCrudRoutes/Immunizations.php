<?php
Route::group(['middleware' => ['auth','permission:Immunizations']],function(){
    Route::get('/Immunizations/list',array('uses'=>'ImmunizationsController@All','as'=>'api_Immunizationslist'));
    Route::post('/Immunizations/create_or_update',array('uses'=>'ImmunizationsController@CreateOrUpdate','as'=>'api_Immunizationscreateorupdate'));
    Route::get('/Immunizations/add',array('uses'=>'ImmunizationsController@add','as'=>'api_Immunizationsadd'));
    Route::get('/Immunizations/edit/{id}',array('uses'=>'ImmunizationsController@edit','as'=>'api_Immunizationsedit'));
    Route::get('/Immunizations/view/{id}',array('uses'=>'ImmunizationsController@view','as'=>'api_Immunizationsview'));    
    Route::post('/Immunizations/update/{id}',array('uses'=>'ImmunizationsController@Update','as'=>'api_Immunizationsupdate'));
    Route::delete('/Immunizations/delete/{id}',array('uses'=>'ImmunizationsController@Delete','as'=>'api_Immunizationsdelete'));
    Route::delete('/Immunizations/delete_multiple', array('uses' => 'ImmunizationsController@DeleteMultiple', 'as' => 'Immunizationsdeletemultiple'));
});
