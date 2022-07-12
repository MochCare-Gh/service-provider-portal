<?php
Route::group(['middleware' => ['web', 'auth','permission:Widgets']],function(){
    Route::get('/module/Widgets/{module_id}',array('uses'=>'WidgetsController@Index','as'=>'WidgetsIndex'));
    Route::get('/module/Widgets/list/{module_id}',array('uses'=>'WidgetsController@All','as'=>'Widgetslist'));
    Route::post('/module/Widgets/create_or_update',array('uses'=>'WidgetsController@CreateOrUpdate','as'=>'Widgetscreateorupdate'));
    Route::get('/module/Widgets/edit/{id}',array('uses'=>'WidgetsController@edit','as'=>'Widgetsedit'));
    Route::post('/module/Widgets/update/{id}',array('uses'=>'WidgetsController@Update','as'=>'Widgetsupdate'));
    Route::delete('/module/Widgets/delete/{id}',array('uses'=>'WidgetsController@Delete','as'=>'Widgetsdelete'));
    Route::delete('/module/Widgets/delete_multiple', array('uses' => 'WidgetsController@DeleteMultiple', 'as' => 'Widgetsdeletemultiple'));
});
