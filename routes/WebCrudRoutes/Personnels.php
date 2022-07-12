<?php
Route::group(['middleware' => ['web', 'auth','permission:Personnels']],function(){
    Route::get('/Personnels/',array('uses'=>'PersonnelsController@Index','as'=>'PersonnelsIndex'));
    Route::get('/Personnels/list',array('uses'=>'PersonnelsController@All','as'=>'Personnelslist'));
    Route::post('/Personnels/create_or_update',array('uses'=>'PersonnelsController@CreateOrUpdate','as'=>'Personnelscreateorupdate'));
    Route::get('/Personnels/add',array('uses'=>'PersonnelsController@add','as'=>'Personnelsadd'));
    Route::get('/Personnels/edit/{id}',array('uses'=>'PersonnelsController@edit','as'=>'Personnelsedit'));
    Route::get('/Personnels/view/{id}',array('uses'=>'PersonnelsController@view','as'=>'Personnelsview'));
    Route::post('/Personnels/update/{id}',array('uses'=>'PersonnelsController@Update','as'=>'Personnelsupdate'));
    Route::delete('/Personnels/delete/{id}',array('uses'=>'PersonnelsController@Delete','as'=>'Personnelsdelete'));
    Route::delete('/Personnels/delete_multiple', array('uses' => 'PersonnelsController@DeleteMultiple', 'as' => 'Personnelsdeletemultiple'));
});
