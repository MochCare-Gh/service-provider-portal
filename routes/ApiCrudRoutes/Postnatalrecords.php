<?php
Route::group(['middleware' => ['auth','permission:Postnatalrecords']],function(){
    Route::get('/Postnatalrecords/list',array('uses'=>'PostnatalrecordsController@All','as'=>'api_Postnatalrecordslist'));
    Route::post('/Postnatalrecords/create_or_update',array('uses'=>'PostnatalrecordsController@CreateOrUpdate','as'=>'api_Postnatalrecordscreateorupdate'));
    Route::get('/Postnatalrecords/add',array('uses'=>'PostnatalrecordsController@add','as'=>'api_Postnatalrecordsadd'));
    Route::get('/Postnatalrecords/edit/{id}',array('uses'=>'PostnatalrecordsController@edit','as'=>'api_Postnatalrecordsedit'));
    Route::get('/Postnatalrecords/view/{id}',array('uses'=>'PostnatalrecordsController@view','as'=>'api_Postnatalrecordsview'));    
    Route::post('/Postnatalrecords/update/{id}',array('uses'=>'PostnatalrecordsController@Update','as'=>'api_Postnatalrecordsupdate'));
    Route::delete('/Postnatalrecords/delete/{id}',array('uses'=>'PostnatalrecordsController@Delete','as'=>'api_Postnatalrecordsdelete'));
    Route::delete('/Postnatalrecords/delete_multiple', array('uses' => 'PostnatalrecordsController@DeleteMultiple', 'as' => 'Postnatalrecordsdeletemultiple'));
});
