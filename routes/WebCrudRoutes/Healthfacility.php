<?php
Route::group(['middleware' => ['web', 'auth','permission:Healthfacility']],function(){
    Route::get('/Healthfacility/',array('uses'=>'HealthfacilityController@Index','as'=>'HealthfacilityIndex'));
    Route::get('/Healthfacility/list',array('uses'=>'HealthfacilityController@All','as'=>'Healthfacilitylist'));
    Route::post('/Healthfacility/create_or_update',array('uses'=>'HealthfacilityController@CreateOrUpdate','as'=>'Healthfacilitycreateorupdate'));
    Route::get('/Healthfacility/add',array('uses'=>'HealthfacilityController@add','as'=>'Healthfacilityadd'));
    Route::get('/Healthfacility/edit/{id}',array('uses'=>'HealthfacilityController@edit','as'=>'Healthfacilityedit'));
    Route::get('/Healthfacility/view/{id}',array('uses'=>'HealthfacilityController@view','as'=>'Healthfacilityview'));
    Route::post('/Healthfacility/update/{id}',array('uses'=>'HealthfacilityController@Update','as'=>'Healthfacilityupdate'));
    Route::delete('/Healthfacility/delete/{id}',array('uses'=>'HealthfacilityController@Delete','as'=>'Healthfacilitydelete'));
    Route::delete('/Healthfacility/delete_multiple', array('uses' => 'HealthfacilityController@DeleteMultiple', 'as' => 'Healthfacilitydeletemultiple'));
});
