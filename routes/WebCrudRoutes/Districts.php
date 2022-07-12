<?php
Route::group(['middleware' => ['web', 'auth','permission:Districts']],function(){
    Route::get('/Districts/',array('uses'=>'DistrictsController@Index','as'=>'DistrictsIndex'));
    Route::get('/Districts/list',array('uses'=>'DistrictsController@All','as'=>'Districtslist'));
    Route::post('/Districts/create_or_update',array('uses'=>'DistrictsController@CreateOrUpdate','as'=>'Districtscreateorupdate'));
    Route::get('/Districts/add',array('uses'=>'DistrictsController@add','as'=>'Districtsadd'));
    Route::get('/Districts/edit/{id}',array('uses'=>'DistrictsController@edit','as'=>'Districtsedit'));
    Route::get('/Districts/view/{id}',array('uses'=>'DistrictsController@view','as'=>'Districtsview'));
    Route::post('/Districts/update/{id}',array('uses'=>'DistrictsController@Update','as'=>'Districtsupdate'));
    Route::delete('/Districts/delete/{id}',array('uses'=>'DistrictsController@Delete','as'=>'Districtsdelete'));
    Route::delete('/Districts/delete_multiple', array('uses' => 'DistrictsController@DeleteMultiple', 'as' => 'Districtsdeletemultiple'));
});
