<?php
Route::group(['middleware' => ['auth','permission:Widgets']],function(){
    Route::get('/modules/{module_id}/Widgets',array('uses'=>'WidgetsController@All','as'=>'api_Widgetslist'));
    Route::post('/modules/Widgets/create_or_update',array('uses'=>'WidgetsController@CreateOrUpdate','as'=>'api_Widgetscreateorupdate'));
    Route::get('/modules/Widgets/edit/{id}',array('uses'=>'WidgetsController@edit','as'=>'api_Widgetsedit'));
    Route::post('/modules/Widgets/update/{id}',array('uses'=>'WidgetsController@Update','as'=>'api_Widgetsupdate'));
    Route::delete('/modules/Widgets/delete/{id}',array('uses'=>'WidgetsController@Delete','as'=>'api_Widgetsdelete'));
    Route::delete('/modules/Widgets/delete_multiple', array('uses' => 'WidgetsController@DeleteMultiple', 'as' => 'Widgetsdeletemultiple'));
});
