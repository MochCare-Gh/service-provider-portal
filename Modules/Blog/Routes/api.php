<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['auth','permission:Blog']],function(){
    Route::get('/Blog/list',array('uses'=>'BlogController@All','as'=>'api_Bloglist'));
    Route::post('/Blog/create_or_update',array('uses'=>'BlogController@CreateOrUpdate','as'=>'api_Blogcreateorupdate'));
    Route::get('/Blog/add',array('uses'=>'BlogController@add','as'=>'api_Blogadd'));
    Route::get('/Blog/edit/{id}',array('uses'=>'BlogController@edit','as'=>'api_Blogedit'));
    Route::get('/Blog/view/{id}',array('uses'=>'BlogController@view','as'=>'api_Blogview'));    
    Route::post('/Blog/update/{id}',array('uses'=>'BlogController@Update','as'=>'api_Blogupdate'));
    Route::delete('/Blog/delete/{id}',array('uses'=>'BlogController@Delete','as'=>'api_Blogdelete'));
    Route::delete('/Blog/delete_multiple', array('uses' => 'BlogController@DeleteMultiple', 'as' => 'Blogdeletemultiple'));
});
Route::group(['middleware' => ['auth','permission:Blog_categories']],function(){
    Route::get('/Blog_categories/list',array('uses'=>'BlogCategoriesController@All','as'=>'api_Blog_categorieslist'));
    Route::post('/Blog_categories/create_or_update',array('uses'=>'BlogCategoriesController@CreateOrUpdate','as'=>'api_Blog_categoriescreateorupdate'));
    Route::get('/Blog_categories/add',array('uses'=>'BlogCategoriesController@add','as'=>'api_Blog_categoriesadd'));
    Route::get('/Blog_categories/edit/{id}',array('uses'=>'BlogCategoriesController@edit','as'=>'api_Blog_categoriesedit'));
    Route::get('/Blog_categories/view/{id}',array('uses'=>'BlogCategoriesController@view','as'=>'api_Blog_categoriesview'));    
    Route::post('/Blog_categories/update/{id}',array('uses'=>'BlogCategoriesController@Update','as'=>'api_Blog_categoriesupdate'));
    Route::delete('/Blog_categories/delete/{id}',array('uses'=>'BlogCategoriesController@Delete','as'=>'api_Blog_categoriesdelete'));
    Route::delete('/Blog_categories/delete_multiple', array('uses' => 'BlogCategoriesController@DeleteMultiple', 'as' => 'Blog_categoriesdeletemultiple'));
});
