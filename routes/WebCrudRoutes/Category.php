<?php
Route::group(['middleware' => ['web', 'auth','permission:Category']],function(){
    Route::get('/Category/',array('uses'=>'CategoryController@Index','as'=>'CategoryIndex'));
    Route::get('/Category/list',array('uses'=>'CategoryController@All','as'=>'Categorylist'));
    Route::post('/Category/create_or_update',array('uses'=>'CategoryController@CreateOrUpdate','as'=>'Categorycreateorupdate'));
    Route::get('/Category/add',array('uses'=>'CategoryController@add','as'=>'Categoryadd'));
    Route::get('/Category/edit/{id}',array('uses'=>'CategoryController@edit','as'=>'Categoryedit'));
    Route::get('/Category/view/{id}',array('uses'=>'CategoryController@view','as'=>'Categoryview'));
    Route::post('/Category/update/{id}',array('uses'=>'CategoryController@Update','as'=>'Categoryupdate'));
    Route::delete('/Category/delete/{id}',array('uses'=>'CategoryController@Delete','as'=>'Categorydelete'));
    Route::delete('/Category/delete_multiple', array('uses' => 'CategoryController@DeleteMultiple', 'as' => 'Categorydeletemultiple'));
});
