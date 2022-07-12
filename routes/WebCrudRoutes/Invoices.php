<?php
Route::group(['middleware' => ['web', 'auth','permission:Invoices']],function(){
    Route::get('/Invoices/',array('uses'=>'InvoicesController@Index','as'=>'InvoicesIndex'));
    Route::get('/Invoices/list',array('uses'=>'InvoicesController@All','as'=>'Invoiceslist'));
    Route::post('/Invoices/create_or_update',array('uses'=>'InvoicesController@CreateOrUpdate','as'=>'Invoicescreateorupdate'));
    Route::get('/Invoices/edit/{id}',array('uses'=>'InvoicesController@edit','as'=>'Invoicesedit'));
    Route::post('/Invoices/update/{id}',array('uses'=>'InvoicesController@Update','as'=>'Invoicesupdate'));
    Route::delete('/Invoices/delete/{id}',array('uses'=>'InvoicesController@Delete','as'=>'Invoicesdelete'));
    Route::delete('/Invoices/delete_multiple', array('uses' => 'InvoicesController@DeleteMultiple', 'as' => 'Invoicesdeletemultiple'));
    Route::get('/Invoices/invoice-details/{id}', array('uses' => 'InvoicesController@invoiceDetails', 'as' => 'Invoices_invoice_details'));
});
