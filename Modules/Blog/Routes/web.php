<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'admin'],function(){    
    Route::group(['middleware' => ['web', 'auth','permission:Blog']],function(){
        Route::get('/Blog/',array('uses'=>'BlogController@Index','as'=>'BlogIndex'));
        Route::get('/Blog/list',array('uses'=>'BlogController@All','as'=>'Bloglist'));
        Route::post('/Blog/create_or_update',array('uses'=>'BlogController@CreateOrUpdate','as'=>'Blogcreateorupdate'));
        Route::get('/Blog/add',array('uses'=>'BlogController@add','as'=>'Blogadd'));
        Route::get('/Blog/edit/{id}',array('uses'=>'BlogController@edit','as'=>'Blogedit'));
        Route::get('/Blog/view/{id}',array('uses'=>'BlogController@view','as'=>'Blogview'));
        Route::post('/Blog/update/{id}',array('uses'=>'BlogController@Update','as'=>'Blogupdate'));
        Route::delete('/Blog/delete/{id}',array('uses'=>'BlogController@Delete','as'=>'Blogdelete'));
        Route::delete('/Blog/delete_multiple', array('uses' => 'BlogController@DeleteMultiple', 'as' => 'Blogdeletemultiple'));
    });

    Route::group(['middleware' => ['web', 'auth','permission:Blog_categories']],function(){
        Route::get('/Blog_categories/',array('uses'=>'BlogCategoriesController@Index','as'=>'Blog_categoriesIndex'));
        Route::get('/Blog_categories/list',array('uses'=>'BlogCategoriesController@All','as'=>'Blog_categorieslist'));
        Route::post('/Blog_categories/create_or_update',array('uses'=>'BlogCategoriesController@CreateOrUpdate','as'=>'Blog_categoriescreateorupdate'));
        Route::get('/Blog_categories/add',array('uses'=>'BlogCategoriesController@add','as'=>'Blog_categoriesadd'));
        Route::get('/Blog_categories/edit/{id}',array('uses'=>'BlogCategoriesController@edit','as'=>'Blog_categoriesedit'));
        Route::get('/Blog_categories/view/{id}',array('uses'=>'BlogCategoriesController@view','as'=>'Blog_categoriesview'));
        Route::post('/Blog_categories/update/{id}',array('uses'=>'BlogCategoriesController@Update','as'=>'Blog_categoriesupdate'));
        Route::delete('/Blog_categories/delete/{id}',array('uses'=>'BlogCategoriesController@Delete','as'=>'Blog_categoriesdelete'));
        Route::delete('/Blog_categories/delete_multiple', array('uses' => 'BlogCategoriesController@DeleteMultiple', 'as' => 'Blog_categoriesdeletemultiple'));
    });    
});
