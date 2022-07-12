<?php
Route::group(['middleware' => ['web', 'auth','permission:Stafftypes']],function(){
    Route::get('/Stafftypes/',array('uses'=>'StafftypesController@Index','as'=>'StafftypesIndex'));
    Route::get('/Stafftypes/list',array('uses'=>'StafftypesController@All','as'=>'Stafftypeslist'));
    Route::post('/Stafftypes/create_or_update',array('uses'=>'StafftypesController@CreateOrUpdate','as'=>'Stafftypescreateorupdate'));
    Route::get('/Stafftypes/add',array('uses'=>'StafftypesController@add','as'=>'Stafftypesadd'));
    Route::get('/Stafftypes/edit/{id}',array('uses'=>'StafftypesController@edit','as'=>'Stafftypesedit'));
    Route::get('/Stafftypes/view/{id}',array('uses'=>'StafftypesController@view','as'=>'Stafftypesview'));
    Route::post('/Stafftypes/update/{id}',array('uses'=>'StafftypesController@Update','as'=>'Stafftypesupdate'));
    Route::delete('/Stafftypes/delete/{id}',array('uses'=>'StafftypesController@Delete','as'=>'Stafftypesdelete'));
    Route::delete('/Stafftypes/delete_multiple', array('uses' => 'StafftypesController@DeleteMultiple', 'as' => 'Stafftypesdeletemultiple'));
});
