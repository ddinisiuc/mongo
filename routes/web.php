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

Route::get('/', 'ElasticController@index')->name('home');
Route::post('/search', 'ElasticController@search')->name('search');
Route::post('/create', 'CategoryController@create')->name('create');
Route::post('/create-product', 'ProductController@create')->name('create_product');
Route::post('/delete', 'CategoryController@delete')->name('delete');
Route::post('/delete-product', 'ProductController@delete')->name('delete_product');

