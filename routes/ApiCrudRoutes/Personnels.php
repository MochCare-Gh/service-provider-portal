<?php
Route::group(['middleware' => ['auth','permission:Personnels']],function(){
    Route::get('/Personnels/list',array('uses'=>'PersonnelsController@All','as'=>'api_Personnelslist'));
    Route::post('/Personnels/create_or_update',array('uses'=>'PersonnelsController@CreateOrUpdate','as'=>'api_Personnelscreateorupdate'));
    Route::get('/Personnels/add',array('uses'=>'PersonnelsController@add','as'=>'api_Personnelsadd'));
    Route::get('/Personnels/edit/{id}',array('uses'=>'PersonnelsController@edit','as'=>'api_Personnelsedit'));
    Route::get('/Personnels/view/{id}',array('uses'=>'PersonnelsController@view','as'=>'api_Personnelsview'));    
    Route::post('/Personnels/update/{id}',array('uses'=>'PersonnelsController@Update','as'=>'api_Personnelsupdate'));
    Route::delete('/Personnels/delete/{id}',array('uses'=>'PersonnelsController@Delete','as'=>'api_Personnelsdelete'));
    Route::delete('/Personnels/delete_multiple', array('uses' => 'PersonnelsController@DeleteMultiple', 'as' => 'Personnelsdeletemultiple'));
});
