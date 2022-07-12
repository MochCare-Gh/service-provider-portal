<?php
Route::group(['middleware' => ['web', 'auth','permission:Mothers']],function(){
    Route::get('/Mothers/',array('uses'=>'MothersController@Index','as'=>'MothersIndex'));
    Route::get('/Mothers/list',array('uses'=>'MothersController@All','as'=>'Motherslist'));
    Route::post('/Mothers/create_or_update',array('uses'=>'MothersController@CreateOrUpdate','as'=>'Motherscreateorupdate'));
    Route::get('/Mothers/add',array('uses'=>'MothersController@add','as'=>'Mothersadd'));
    Route::get('/Mothers/edit/{id}',array('uses'=>'MothersController@edit','as'=>'Mothersedit'));
    Route::get('/Mothers/view/{id}',array('uses'=>'MothersController@view','as'=>'Mothersview'));
    Route::post('/Mothers/update/{id}',array('uses'=>'MothersController@Update','as'=>'Mothersupdate'));
    Route::delete('/Mothers/delete/{id}',array('uses'=>'MothersController@Delete','as'=>'Mothersdelete'));
    Route::delete('/Mothers/delete_multiple', array('uses' => 'MothersController@DeleteMultiple', 'as' => 'Mothersdeletemultiple'));
});
