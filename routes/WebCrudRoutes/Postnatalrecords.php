<?php
Route::group(['middleware' => ['web', 'auth','permission:Postnatalrecords']],function(){
    Route::get('/Postnatalrecords/',array('uses'=>'PostnatalrecordsController@Index','as'=>'PostnatalrecordsIndex'));
    Route::get('/Postnatalrecords/list',array('uses'=>'PostnatalrecordsController@All','as'=>'Postnatalrecordslist'));
    Route::post('/Postnatalrecords/create_or_update',array('uses'=>'PostnatalrecordsController@CreateOrUpdate','as'=>'Postnatalrecordscreateorupdate'));
    Route::get('/Postnatalrecords/add',array('uses'=>'PostnatalrecordsController@add','as'=>'Postnatalrecordsadd'));
    Route::get('/Postnatalrecords/edit/{id}',array('uses'=>'PostnatalrecordsController@edit','as'=>'Postnatalrecordsedit'));
    Route::get('/Postnatalrecords/view/{id}',array('uses'=>'PostnatalrecordsController@view','as'=>'Postnatalrecordsview'));
    Route::post('/Postnatalrecords/update/{id}',array('uses'=>'PostnatalrecordsController@Update','as'=>'Postnatalrecordsupdate'));
    Route::delete('/Postnatalrecords/delete/{id}',array('uses'=>'PostnatalrecordsController@Delete','as'=>'Postnatalrecordsdelete'));
    Route::delete('/Postnatalrecords/delete_multiple', array('uses' => 'PostnatalrecordsController@DeleteMultiple', 'as' => 'Postnatalrecordsdeletemultiple'));
});
