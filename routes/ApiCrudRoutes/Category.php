<?php
Route::group(['middleware' => ['auth','permission:Category']],function(){
    Route::get('/Category/list',array('uses'=>'CategoryController@All','as'=>'api_Categorylist'));
    Route::post('/Category/create_or_update',array('uses'=>'CategoryController@CreateOrUpdate','as'=>'api_Categorycreateorupdate'));
    Route::get('/Category/add',array('uses'=>'CategoryController@add','as'=>'api_Categoryadd'));
    Route::get('/Category/edit/{id}',array('uses'=>'CategoryController@edit','as'=>'api_Categoryedit'));
    Route::get('/Category/view/{id}',array('uses'=>'CategoryController@view','as'=>'api_Categoryview'));    
    Route::post('/Category/update/{id}',array('uses'=>'CategoryController@Update','as'=>'api_Categoryupdate'));
    Route::delete('/Category/delete/{id}',array('uses'=>'CategoryController@Delete','as'=>'api_Categorydelete'));
    Route::delete('/Category/delete_multiple', array('uses' => 'CategoryController@DeleteMultiple', 'as' => 'Categorydeletemultiple'));
});
