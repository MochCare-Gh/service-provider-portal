<?php
Route::group(['middleware' => ['web', 'auth','permission:Facility']],function(){
    Route::get('/Facility/',array('uses'=>'FacilityController@Index','as'=>'FacilityIndex'));
    Route::get('/Facility/list',array('uses'=>'FacilityController@All','as'=>'Facilitylist'));
    Route::post('/Facility/create_or_update',array('uses'=>'FacilityController@CreateOrUpdate','as'=>'Facilitycreateorupdate'));
    Route::get('/Facility/add',array('uses'=>'FacilityController@add','as'=>'Facilityadd'));
    Route::get('/Facility/edit/{id}',array('uses'=>'FacilityController@edit','as'=>'Facilityedit'));
    Route::get('/Facility/view/{id}',array('uses'=>'FacilityController@view','as'=>'Facilityview'));
    Route::post('/Facility/update/{id}',array('uses'=>'FacilityController@Update','as'=>'Facilityupdate'));
    Route::delete('/Facility/delete/{id}',array('uses'=>'FacilityController@Delete','as'=>'Facilitydelete'));
    Route::delete('/Facility/delete_multiple', array('uses' => 'FacilityController@DeleteMultiple', 'as' => 'Facilitydeletemultiple'));
});
