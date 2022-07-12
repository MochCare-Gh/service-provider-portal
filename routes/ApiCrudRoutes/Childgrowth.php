<?php
Route::group(['middleware' => ['auth','permission:Childgrowth']],function(){
    Route::get('/Childgrowth/list',array('uses'=>'ChildgrowthController@All','as'=>'api_Childgrowthlist'));
    Route::post('/Childgrowth/create_or_update',array('uses'=>'ChildgrowthController@CreateOrUpdate','as'=>'api_Childgrowthcreateorupdate'));
    Route::get('/Childgrowth/add',array('uses'=>'ChildgrowthController@add','as'=>'api_Childgrowthadd'));
    Route::get('/Childgrowth/edit/{id}',array('uses'=>'ChildgrowthController@edit','as'=>'api_Childgrowthedit'));
    Route::get('/Childgrowth/view/{id}',array('uses'=>'ChildgrowthController@view','as'=>'api_Childgrowthview'));    
    Route::post('/Childgrowth/update/{id}',array('uses'=>'ChildgrowthController@Update','as'=>'api_Childgrowthupdate'));
    Route::delete('/Childgrowth/delete/{id}',array('uses'=>'ChildgrowthController@Delete','as'=>'api_Childgrowthdelete'));
    Route::delete('/Childgrowth/delete_multiple', array('uses' => 'ChildgrowthController@DeleteMultiple', 'as' => 'Childgrowthdeletemultiple'));
});
