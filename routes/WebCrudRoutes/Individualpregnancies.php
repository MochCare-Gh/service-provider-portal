<?php
Route::group(['middleware' => ['web', 'auth','permission:Individualpregnancies']],function(){
    Route::get('/Individualpregnancies/',array('uses'=>'IndividualpregnanciesController@Index','as'=>'IndividualpregnanciesIndex'));
    Route::get('/Individualpregnancies/list',array('uses'=>'IndividualpregnanciesController@All','as'=>'Individualpregnancieslist'));
    Route::post('/Individualpregnancies/create_or_update',array('uses'=>'IndividualpregnanciesController@CreateOrUpdate','as'=>'Individualpregnanciescreateorupdate'));
    Route::get('/Individualpregnancies/add',array('uses'=>'IndividualpregnanciesController@add','as'=>'Individualpregnanciesadd'));
    Route::get('/Individualpregnancies/edit/{id}',array('uses'=>'IndividualpregnanciesController@edit','as'=>'Individualpregnanciesedit'));
    Route::get('/Individualpregnancies/view/{id}',array('uses'=>'IndividualpregnanciesController@view','as'=>'Individualpregnanciesview'));
    Route::post('/Individualpregnancies/update/{id}',array('uses'=>'IndividualpregnanciesController@Update','as'=>'Individualpregnanciesupdate'));
    Route::delete('/Individualpregnancies/delete/{id}',array('uses'=>'IndividualpregnanciesController@Delete','as'=>'Individualpregnanciesdelete'));
    Route::delete('/Individualpregnancies/delete_multiple', array('uses' => 'IndividualpregnanciesController@DeleteMultiple', 'as' => 'Individualpregnanciesdeletemultiple'));
});
