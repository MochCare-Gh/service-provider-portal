<?php
Route::group(['middleware' => ['auth','permission:Districts']],function(){
    Route::get('/Districts/list',array('uses'=>'DistrictsController@All','as'=>'api_Districtslist'));
    Route::post('/Districts/create_or_update',array('uses'=>'DistrictsController@CreateOrUpdate','as'=>'api_Districtscreateorupdate'));
    Route::get('/Districts/add',array('uses'=>'DistrictsController@add','as'=>'api_Districtsadd'));
    Route::get('/Districts/edit/{id}',array('uses'=>'DistrictsController@edit','as'=>'api_Districtsedit'));
    Route::get('/Districts/view/{id}',array('uses'=>'DistrictsController@view','as'=>'api_Districtsview'));    
    Route::post('/Districts/update/{id}',array('uses'=>'DistrictsController@Update','as'=>'api_Districtsupdate'));
    Route::delete('/Districts/delete/{id}',array('uses'=>'DistrictsController@Delete','as'=>'api_Districtsdelete'));
    Route::delete('/Districts/delete_multiple', array('uses' => 'DistrictsController@DeleteMultiple', 'as' => 'Districtsdeletemultiple'));
});
