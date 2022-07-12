<?php
Route::group(['middleware' => ['auth','permission:Invoices']],function(){
    Route::get('/Invoices/list',array('uses'=>'InvoicesController@All','as'=>'api_Invoiceslist'));
    Route::post('/Invoices/create_or_update',array('uses'=>'InvoicesController@CreateOrUpdate','as'=>'api_Invoicescreateorupdate'));
    Route::get('/Invoices/edit/{id}',array('uses'=>'InvoicesController@edit','as'=>'api_Invoicesedit'));
    Route::post('/Invoices/update/{id}',array('uses'=>'InvoicesController@Update','as'=>'api_Invoicesupdate'));
    Route::delete('/Invoices/delete/{id}',array('uses'=>'InvoicesController@Delete','as'=>'api_Invoicesdelete'));
    Route::delete('/Invoices/delete_multiple', array('uses' => 'InvoicesController@DeleteMultiple', 'as' => 'Invoicesdeletemultiple'));
});
