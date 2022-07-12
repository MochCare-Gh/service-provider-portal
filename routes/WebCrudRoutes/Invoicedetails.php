<?php
Route::group(['middleware' => ['web', 'auth','permission:Invoicedetails']],function(){
    Route::get('/Invoicedetails/',array('uses'=>'InvoicedetailsController@Index','as'=>'InvoicedetailsIndex'));
    Route::get('/Invoicedetails/list',array('uses'=>'InvoicedetailsController@All','as'=>'Invoicedetailslist'));
    Route::post('/Invoicedetails/create_or_update',array('uses'=>'InvoicedetailsController@CreateOrUpdate','as'=>'Invoicedetailscreateorupdate'));
    Route::get('/Invoicedetails/edit/{id}',array('uses'=>'InvoicedetailsController@edit','as'=>'Invoicedetailsedit'));
    Route::post('/Invoicedetails/update/{id}',array('uses'=>'InvoicedetailsController@Update','as'=>'Invoicedetailsupdate'));
    Route::delete('/Invoicedetails/delete/{id}',array('uses'=>'InvoicedetailsController@Delete','as'=>'Invoicedetailsdelete'));
    Route::delete('/Invoicedetails/delete_multiple', array('uses' => 'InvoicedetailsController@DeleteMultiple', 'as' => 'Invoicedetailsdeletemultiple'));
});
