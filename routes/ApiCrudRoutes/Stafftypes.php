<?php
Route::group(['middleware' => ['auth','permission:Stafftypes']],function(){
    Route::get('/Stafftypes/list',array('uses'=>'StafftypesController@All','as'=>'api_Stafftypeslist'));
    Route::post('/Stafftypes/create_or_update',array('uses'=>'StafftypesController@CreateOrUpdate','as'=>'api_Stafftypescreateorupdate'));
    Route::get('/Stafftypes/add',array('uses'=>'StafftypesController@add','as'=>'api_Stafftypesadd'));
    Route::get('/Stafftypes/edit/{id}',array('uses'=>'StafftypesController@edit','as'=>'api_Stafftypesedit'));
    Route::get('/Stafftypes/view/{id}',array('uses'=>'StafftypesController@view','as'=>'api_Stafftypesview'));    
    Route::post('/Stafftypes/update/{id}',array('uses'=>'StafftypesController@Update','as'=>'api_Stafftypesupdate'));
    Route::delete('/Stafftypes/delete/{id}',array('uses'=>'StafftypesController@Delete','as'=>'api_Stafftypesdelete'));
    Route::delete('/Stafftypes/delete_multiple', array('uses' => 'StafftypesController@DeleteMultiple', 'as' => 'Stafftypesdeletemultiple'));
});
