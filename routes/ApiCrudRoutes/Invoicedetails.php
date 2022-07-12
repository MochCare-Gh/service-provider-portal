<?php
Route::group(['middleware' => ['auth','permission:Invoicedetails']],function(){
    Route::get('/Invoicedetails/list',array('uses'=>'InvoicedetailsController@All','as'=>'api_Invoicedetailslist'));
    Route::post('/Invoicedetails/create_or_update',array('uses'=>'InvoicedetailsController@CreateOrUpdate','as'=>'api_Invoicedetailscreateorupdate'));
    Route::get('/Invoicedetails/edit/{id}',array('uses'=>'InvoicedetailsController@edit','as'=>'api_Invoicedetailsedit'));
    Route::post('/Invoicedetails/update/{id}',array('uses'=>'InvoicedetailsController@Update','as'=>'api_Invoicedetailsupdate'));
    Route::delete('/Invoicedetails/delete/{id}',array('uses'=>'InvoicedetailsController@Delete','as'=>'api_Invoicedetailsdelete'));
    Route::delete('/Invoicedetails/delete_multiple', array('uses' => 'InvoicedetailsController@DeleteMultiple', 'as' => 'Invoicedetailsdeletemultiple'));
});
