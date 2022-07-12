<?php
Route::group(['middleware' => ['web', 'auth','permission:Deliveryoutcome']],function(){
    Route::get('/Deliveryoutcome/',array('uses'=>'DeliveryoutcomeController@Index','as'=>'DeliveryoutcomeIndex'));
    Route::get('/Deliveryoutcome/list',array('uses'=>'DeliveryoutcomeController@All','as'=>'Deliveryoutcomelist'));
    Route::post('/Deliveryoutcome/create_or_update',array('uses'=>'DeliveryoutcomeController@CreateOrUpdate','as'=>'Deliveryoutcomecreateorupdate'));
    Route::get('/Deliveryoutcome/add',array('uses'=>'DeliveryoutcomeController@add','as'=>'Deliveryoutcomeadd'));
    Route::get('/Deliveryoutcome/edit/{id}',array('uses'=>'DeliveryoutcomeController@edit','as'=>'Deliveryoutcomeedit'));
    Route::get('/Deliveryoutcome/view/{id}',array('uses'=>'DeliveryoutcomeController@view','as'=>'Deliveryoutcomeview'));
    Route::post('/Deliveryoutcome/update/{id}',array('uses'=>'DeliveryoutcomeController@Update','as'=>'Deliveryoutcomeupdate'));
    Route::delete('/Deliveryoutcome/delete/{id}',array('uses'=>'DeliveryoutcomeController@Delete','as'=>'Deliveryoutcomedelete'));
    Route::delete('/Deliveryoutcome/delete_multiple', array('uses' => 'DeliveryoutcomeController@DeleteMultiple', 'as' => 'Deliveryoutcomedeletemultiple'));
});
