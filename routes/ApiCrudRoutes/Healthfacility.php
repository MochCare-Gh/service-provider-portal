<?php
Route::group(['middleware' => ['auth','permission:Healthfacility']],function(){
    Route::get('/Healthfacility/list',array('uses'=>'HealthfacilityController@All','as'=>'api_Healthfacilitylist'));
    Route::post('/Healthfacility/create_or_update',array('uses'=>'HealthfacilityController@CreateOrUpdate','as'=>'api_Healthfacilitycreateorupdate'));
    Route::get('/Healthfacility/add',array('uses'=>'HealthfacilityController@add','as'=>'api_Healthfacilityadd'));
    Route::get('/Healthfacility/edit/{id}',array('uses'=>'HealthfacilityController@edit','as'=>'api_Healthfacilityedit'));
    Route::get('/Healthfacility/view/{id}',array('uses'=>'HealthfacilityController@view','as'=>'api_Healthfacilityview'));    
    Route::post('/Healthfacility/update/{id}',array('uses'=>'HealthfacilityController@Update','as'=>'api_Healthfacilityupdate'));
    Route::delete('/Healthfacility/delete/{id}',array('uses'=>'HealthfacilityController@Delete','as'=>'api_Healthfacilitydelete'));
    Route::delete('/Healthfacility/delete_multiple', array('uses' => 'HealthfacilityController@DeleteMultiple', 'as' => 'Healthfacilitydeletemultiple'));
});
