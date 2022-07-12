<?php
Route::group(['middleware' => ['auth','permission:Deliveryoutcome']],function(){
    Route::get('/Deliveryoutcome/list',array('uses'=>'DeliveryoutcomeController@All','as'=>'api_Deliveryoutcomelist'));
    Route::post('/Deliveryoutcome/create_or_update',array('uses'=>'DeliveryoutcomeController@CreateOrUpdate','as'=>'api_Deliveryoutcomecreateorupdate'));
    Route::get('/Deliveryoutcome/add',array('uses'=>'DeliveryoutcomeController@add','as'=>'api_Deliveryoutcomeadd'));
    Route::get('/Deliveryoutcome/edit/{id}',array('uses'=>'DeliveryoutcomeController@edit','as'=>'api_Deliveryoutcomeedit'));
    Route::get('/Deliveryoutcome/view/{id}',array('uses'=>'DeliveryoutcomeController@view','as'=>'api_Deliveryoutcomeview'));    
    Route::post('/Deliveryoutcome/update/{id}',array('uses'=>'DeliveryoutcomeController@Update','as'=>'api_Deliveryoutcomeupdate'));
    Route::delete('/Deliveryoutcome/delete/{id}',array('uses'=>'DeliveryoutcomeController@Delete','as'=>'api_Deliveryoutcomedelete'));
    Route::delete('/Deliveryoutcome/delete_multiple', array('uses' => 'DeliveryoutcomeController@DeleteMultiple', 'as' => 'Deliveryoutcomedeletemultiple'));
});
