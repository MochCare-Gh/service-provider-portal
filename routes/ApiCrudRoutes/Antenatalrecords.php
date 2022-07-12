<?php
Route::group(['middleware' => ['auth','permission:Antenatalrecords']],function(){
    Route::get('/Antenatalrecords/list',array('uses'=>'AntenatalrecordsController@All','as'=>'api_Antenatalrecordslist'));
    Route::post('/Antenatalrecords/create_or_update',array('uses'=>'AntenatalrecordsController@CreateOrUpdate','as'=>'api_Antenatalrecordscreateorupdate'));
    Route::get('/Antenatalrecords/add',array('uses'=>'AntenatalrecordsController@add','as'=>'api_Antenatalrecordsadd'));
    Route::get('/Antenatalrecords/edit/{id}',array('uses'=>'AntenatalrecordsController@edit','as'=>'api_Antenatalrecordsedit'));
    Route::get('/Antenatalrecords/view/{id}',array('uses'=>'AntenatalrecordsController@view','as'=>'api_Antenatalrecordsview'));    
    Route::post('/Antenatalrecords/update/{id}',array('uses'=>'AntenatalrecordsController@Update','as'=>'api_Antenatalrecordsupdate'));
    Route::delete('/Antenatalrecords/delete/{id}',array('uses'=>'AntenatalrecordsController@Delete','as'=>'api_Antenatalrecordsdelete'));
    Route::delete('/Antenatalrecords/delete_multiple', array('uses' => 'AntenatalrecordsController@DeleteMultiple', 'as' => 'Antenatalrecordsdeletemultiple'));
});
