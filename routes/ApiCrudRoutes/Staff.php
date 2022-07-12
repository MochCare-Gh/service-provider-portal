<?php
Route::group(['middleware' => ['auth','permission:Staff']],function(){
    Route::get('/Staff/list',array('uses'=>'StaffController@All','as'=>'api_Stafflist'));
    Route::post('/Staff/create_or_update',array('uses'=>'StaffController@CreateOrUpdate','as'=>'api_Staffcreateorupdate'));
    Route::get('/Staff/add',array('uses'=>'StaffController@add','as'=>'api_Staffadd'));
    Route::get('/Staff/edit/{id}',array('uses'=>'StaffController@edit','as'=>'api_Staffedit'));
    Route::get('/Staff/view/{id}',array('uses'=>'StaffController@view','as'=>'api_Staffview'));    
    Route::post('/Staff/update/{id}',array('uses'=>'StaffController@Update','as'=>'api_Staffupdate'));
    Route::delete('/Staff/delete/{id}',array('uses'=>'StaffController@Delete','as'=>'api_Staffdelete'));
    Route::delete('/Staff/delete_multiple', array('uses' => 'StaffController@DeleteMultiple', 'as' => 'Staffdeletemultiple'));
});
