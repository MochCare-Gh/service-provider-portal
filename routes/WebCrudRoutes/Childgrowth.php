<?php
Route::group(['middleware' => ['web', 'auth','permission:Childgrowth']],function(){
    Route::get('/Childgrowth/',array('uses'=>'ChildgrowthController@Index','as'=>'ChildgrowthIndex'));
    Route::get('/Childgrowth/list',array('uses'=>'ChildgrowthController@All','as'=>'Childgrowthlist'));
    Route::post('/Childgrowth/create_or_update',array('uses'=>'ChildgrowthController@CreateOrUpdate','as'=>'Childgrowthcreateorupdate'));
    Route::get('/Childgrowth/add',array('uses'=>'ChildgrowthController@add','as'=>'Childgrowthadd'));
    Route::get('/Childgrowth/edit/{id}',array('uses'=>'ChildgrowthController@edit','as'=>'Childgrowthedit'));
    Route::get('/Childgrowth/view/{id}',array('uses'=>'ChildgrowthController@view','as'=>'Childgrowthview'));
    Route::post('/Childgrowth/update/{id}',array('uses'=>'ChildgrowthController@Update','as'=>'Childgrowthupdate'));
    Route::delete('/Childgrowth/delete/{id}',array('uses'=>'ChildgrowthController@Delete','as'=>'Childgrowthdelete'));
    Route::delete('/Childgrowth/delete_multiple', array('uses' => 'ChildgrowthController@DeleteMultiple', 'as' => 'Childgrowthdeletemultiple'));
});
