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

Route::get('/', function () {
    return view('layouts.app_master_admin');
});
Route::group(['prefix'=>'admin'], function (){
    Route::group(['prefix'=>'category'], function(){
        Route::get('', 'Admin\CategoryController@index')->name('admin.category.index');
        Route::get('create', 'Admin\CategoryController@create')->name('admin.category.create');
        Route::post('create', 'Admin\CategoryController@store');
        Route::get('edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
        Route::post('edit/{id}', 'Admin\CategoryController@update');
        Route::get('delete/{id}', 'Admin\CategoryController@delete')->name('admin.category.delete');
    });
    Route::group(['prefix'=>'post'], function(){
        Route::get('', 'Admin\PostController@index')->name('admin.post.index');
        Route::get('create', 'Admin\PostController@create')->name('admin.post.create');
        Route::post('create', 'Admin\PostController@store');
        Route::get('edit/{id}', 'Admin\PostController@edit')->name('admin.post.edit');
        Route::post('edit/{id}', 'Admin\PostController@update');
        Route::get('delete/{id}', 'Admin\PostController@delete')->name('admin.post.delete');
    });
});
