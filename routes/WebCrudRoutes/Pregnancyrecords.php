<?php
Route::group(['middleware' => ['web', 'auth','permission:Pregnancyrecords']],function(){
    Route::get('/Pregnancyrecords/',array('uses'=>'PregnancyrecordsController@Index','as'=>'PregnancyrecordsIndex'));
    Route::get('/Pregnancyrecords/list',array('uses'=>'PregnancyrecordsController@All','as'=>'Pregnancyrecordslist'));
    Route::post('/Pregnancyrecords/create_or_update',array('uses'=>'PregnancyrecordsController@CreateOrUpdate','as'=>'Pregnancyrecordscreateorupdate'));
    Route::get('/Pregnancyrecords/add',array('uses'=>'PregnancyrecordsController@add','as'=>'Pregnancyrecordsadd'));
    Route::get('/Pregnancyrecords/edit/{id}',array('uses'=>'PregnancyrecordsController@edit','as'=>'Pregnancyrecordsedit'));
    Route::get('/Pregnancyrecords/view/{id}',array('uses'=>'PregnancyrecordsController@view','as'=>'Pregnancyrecordsview'));
    Route::post('/Pregnancyrecords/update/{id}',array('uses'=>'PregnancyrecordsController@Update','as'=>'Pregnancyrecordsupdate'));
    Route::delete('/Pregnancyrecords/delete/{id}',array('uses'=>'PregnancyrecordsController@Delete','as'=>'Pregnancyrecordsdelete'));
    Route::delete('/Pregnancyrecords/delete_multiple', array('uses' => 'PregnancyrecordsController@DeleteMultiple', 'as' => 'Pregnancyrecordsdeletemultiple'));
});
