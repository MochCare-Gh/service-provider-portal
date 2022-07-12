<?php
Route::group(['middleware' => ['auth','permission:Individualpregnancies']],function(){
    Route::get('/Individualpregnancies/list',array('uses'=>'IndividualpregnanciesController@All','as'=>'api_Individualpregnancieslist'));
    Route::post('/Individualpregnancies/create_or_update',array('uses'=>'IndividualpregnanciesController@CreateOrUpdate','as'=>'api_Individualpregnanciescreateorupdate'));
    Route::get('/Individualpregnancies/add',array('uses'=>'IndividualpregnanciesController@add','as'=>'api_Individualpregnanciesadd'));
    Route::get('/Individualpregnancies/edit/{id}',array('uses'=>'IndividualpregnanciesController@edit','as'=>'api_Individualpregnanciesedit'));
    Route::get('/Individualpregnancies/view/{id}',array('uses'=>'IndividualpregnanciesController@view','as'=>'api_Individualpregnanciesview'));    
    Route::post('/Individualpregnancies/update/{id}',array('uses'=>'IndividualpregnanciesController@Update','as'=>'api_Individualpregnanciesupdate'));
    Route::delete('/Individualpregnancies/delete/{id}',array('uses'=>'IndividualpregnanciesController@Delete','as'=>'api_Individualpregnanciesdelete'));
    Route::delete('/Individualpregnancies/delete_multiple', array('uses' => 'IndividualpregnanciesController@DeleteMultiple', 'as' => 'Individualpregnanciesdeletemultiple'));
});
