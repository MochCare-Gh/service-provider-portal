<?php
Route::group(['middleware' => ['auth','permission:Facility']],function(){
    Route::get('/Facility/list',array('uses'=>'FacilityController@All','as'=>'api_Facilitylist'));
    Route::post('/Facility/create_or_update',array('uses'=>'FacilityController@CreateOrUpdate','as'=>'api_Facilitycreateorupdate'));
    Route::get('/Facility/add',array('uses'=>'FacilityController@add','as'=>'api_Facilityadd'));
    Route::get('/Facility/edit/{id}',array('uses'=>'FacilityController@edit','as'=>'api_Facilityedit'));
    Route::get('/Facility/view/{id}',array('uses'=>'FacilityController@view','as'=>'api_Facilityview'));    
    Route::post('/Facility/update/{id}',array('uses'=>'FacilityController@Update','as'=>'api_Facilityupdate'));
    Route::delete('/Facility/delete/{id}',array('uses'=>'FacilityController@Delete','as'=>'api_Facilitydelete'));
    Route::delete('/Facility/delete_multiple', array('uses' => 'FacilityController@DeleteMultiple', 'as' => 'Facilitydeletemultiple'));
});
