<?php
Route::group(['middleware' => ['web', 'auth','permission:Antenatalrecords']],function(){
    Route::get('/Antenatalrecords/',array('uses'=>'AntenatalrecordsController@Index','as'=>'AntenatalrecordsIndex'));
    Route::get('/Antenatalrecords/list',array('uses'=>'AntenatalrecordsController@All','as'=>'Antenatalrecordslist'));
    Route::post('/Antenatalrecords/create_or_update',array('uses'=>'AntenatalrecordsController@CreateOrUpdate','as'=>'Antenatalrecordscreateorupdate'));
    Route::get('/Antenatalrecords/add',array('uses'=>'AntenatalrecordsController@add','as'=>'Antenatalrecordsadd'));
    Route::get('/Antenatalrecords/edit/{id}',array('uses'=>'AntenatalrecordsController@edit','as'=>'Antenatalrecordsedit'));
    Route::get('/Antenatalrecords/view/{id}',array('uses'=>'AntenatalrecordsController@view','as'=>'Antenatalrecordsview'));
    Route::post('/Antenatalrecords/update/{id}',array('uses'=>'AntenatalrecordsController@Update','as'=>'Antenatalrecordsupdate'));
    Route::delete('/Antenatalrecords/delete/{id}',array('uses'=>'AntenatalrecordsController@Delete','as'=>'Antenatalrecordsdelete'));
    Route::delete('/Antenatalrecords/delete_multiple', array('uses' => 'AntenatalrecordsController@DeleteMultiple', 'as' => 'Antenatalrecordsdeletemultiple'));
});
