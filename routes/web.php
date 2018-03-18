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
     'as' => 'api accidents',
     'uses' => 'Api\AccidentsController@index'
 ]);

Route::get('api/accidents/{id_nesrece}', [
     'as' => 'api accident {id_nesrece}',
     'uses' => 'Api\AccidentsController@show'
 ]);

Route::get('api/sections', [
    'as' => 'api sections',
    'uses' => 'Api\SectionsController@index'
]);

Route::get('api/sections/{id_nesrece}', [
    'as' => 'api section {id_nesrece}',
    'uses' => 'Api\SectionsController@show'
]);

Route::get('api/sectionsnear/x={x}&y={y}', [
    'as' => 'api nearest accidents',
    'uses' => 'Api\SectionsController@near'
]);