<?php
Route::group(['middleware' => ['web', 'auth','permission:Immunizations']],function(){
    Route::get('/Immunizations/',array('uses'=>'ImmunizationsController@Index','as'=>'ImmunizationsIndex'));
    Route::get('/Immunizations/list',array('uses'=>'ImmunizationsController@All','as'=>'Immunizationslist'));
    Route::post('/Immunizations/create_or_update',array('uses'=>'ImmunizationsController@CreateOrUpdate','as'=>'Immunizationscreateorupdate'));
    Route::get('/Immunizations/add',array('uses'=>'ImmunizationsController@add','as'=>'Immunizationsadd'));
    Route::get('/Immunizations/edit/{id}',array('uses'=>'ImmunizationsController@edit','as'=>'Immunizationsedit'));
    Route::get('/Immunizations/view/{id}',array('uses'=>'ImmunizationsController@view','as'=>'Immunizationsview'));
    Route::post('/Immunizations/update/{id}',array('uses'=>'ImmunizationsController@Update','as'=>'Immunizationsupdate'));
    Route::delete('/Immunizations/delete/{id}',array('uses'=>'ImmunizationsController@Delete','as'=>'Immunizationsdelete'));
    Route::delete('/Immunizations/delete_multiple', array('uses' => 'ImmunizationsController@DeleteMultiple', 'as' => 'Immunizationsdeletemultiple'));
});
