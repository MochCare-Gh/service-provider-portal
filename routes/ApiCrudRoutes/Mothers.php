<?php
Route::group(['middleware' => ['auth','permission:Mothers']],function(){
    Route::get('/Mothers/list',array('uses'=>'MothersController@All','as'=>'api_Motherslist'));
    Route::post('/Mothers/create_or_update',array('uses'=>'MothersController@CreateOrUpdate','as'=>'api_Motherscreateorupdate'));
    Route::get('/Mothers/add',array('uses'=>'MothersController@add','as'=>'api_Mothersadd'));
    Route::get('/Mothers/edit/{id}',array('uses'=>'MothersController@edit','as'=>'api_Mothersedit'));
    Route::get('/Mothers/view/{id}',array('uses'=>'MothersController@view','as'=>'api_Mothersview'));    
    Route::post('/Mothers/update/{id}',array('uses'=>'MothersController@Update','as'=>'api_Mothersupdate'));
    Route::delete('/Mothers/delete/{id}',array('uses'=>'MothersController@Delete','as'=>'api_Mothersdelete'));
    Route::delete('/Mothers/delete_multiple', array('uses' => 'MothersController@DeleteMultiple', 'as' => 'Mothersdeletemultiple'));
});
