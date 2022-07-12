<?php
Route::group(['middleware' => ['web', 'auth','permission:Staff']],function(){
    Route::get('/Staff/',array('uses'=>'StaffController@Index','as'=>'StaffIndex'));
    Route::get('/Staff/list',array('uses'=>'StaffController@All','as'=>'Stafflist'));
    Route::post('/Staff/create_or_update',array('uses'=>'StaffController@CreateOrUpdate','as'=>'Staffcreateorupdate'));
    Route::get('/Staff/add',array('uses'=>'StaffController@add','as'=>'Staffadd'));
    Route::get('/Staff/edit/{id}',array('uses'=>'StaffController@edit','as'=>'Staffedit'));
    Route::get('/Staff/view/{id}',array('uses'=>'StaffController@view','as'=>'Staffview'));
    Route::post('/Staff/update/{id}',array('uses'=>'StaffController@Update','as'=>'Staffupdate'));
    Route::delete('/Staff/delete/{id}',array('uses'=>'StaffController@Delete','as'=>'Staffdelete'));
    Route::delete('/Staff/delete_multiple', array('uses' => 'StaffController@DeleteMultiple', 'as' => 'Staffdeletemultiple'));
});
