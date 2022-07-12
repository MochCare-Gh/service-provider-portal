<?php
Route::group(['middleware' => ['auth','permission:Pregnancyrecords']],function(){
    Route::get('/Pregnancyrecords/list',array('uses'=>'PregnancyrecordsController@All','as'=>'api_Pregnancyrecordslist'));
    Route::post('/Pregnancyrecords/create_or_update',array('uses'=>'PregnancyrecordsController@CreateOrUpdate','as'=>'api_Pregnancyrecordscreateorupdate'));
    Route::get('/Pregnancyrecords/add',array('uses'=>'PregnancyrecordsController@add','as'=>'api_Pregnancyrecordsadd'));
    Route::get('/Pregnancyrecords/edit/{id}',array('uses'=>'PregnancyrecordsController@edit','as'=>'api_Pregnancyrecordsedit'));
    Route::get('/Pregnancyrecords/view/{id}',array('uses'=>'PregnancyrecordsController@view','as'=>'api_Pregnancyrecordsview'));    
    Route::post('/Pregnancyrecords/update/{id}',array('uses'=>'PregnancyrecordsController@Update','as'=>'api_Pregnancyrecordsupdate'));
    Route::delete('/Pregnancyrecords/delete/{id}',array('uses'=>'PregnancyrecordsController@Delete','as'=>'api_Pregnancyrecordsdelete'));
    Route::delete('/Pregnancyrecords/delete_multiple', array('uses' => 'PregnancyrecordsController@DeleteMultiple', 'as' => 'Pregnancyrecordsdeletemultiple'));
});
