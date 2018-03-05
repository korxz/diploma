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

Route::get('/', [
    'as' => 'first page',
    'uses' => 'GuestController@index'
]);

Route::get("/accidents", "AccidentsController@show");

Route::get("/sections", "SectionsController@show");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * API 
 */

Route::get('api/accidents', [
     'as' => 'api nesrece',
     'uses' => 'Api\AccidentsController@index'
 ]);

Route::get('api/accidents/{id_nesrece}', [
     'as' => 'api nesrece {id_nesrece}',
     'uses' => 'Api\AccidentsController@show'
 ]);

Route::get('api/sections', [
    'as' => 'api odseki',
    'uses' => 'Api\SectionsController@index'
]);

Route::get('api/sections/{id_nesrece}', [
    'as' => 'api odsek {id_nesrece}',
    'uses' => 'Api\SectionsController@show'
]);