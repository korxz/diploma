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
    return view('welcome');
});

Route::get("/accidents", "AccidentsController@show");

Route::get("/sections", "SectionsController@show");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * API 
 */

 Route::get('api/sections', [
     'as' => 'api odseki',
     'uses' => 'SectionsController@apiCall'
 ]);

 Route::get('api/accidents', [
     'as' => 'api nesrece',
     'uses' => 'AccidentsController@apiCall'
 ]);

 Route::get('api/accidents/{id_nesrece}', [
     'as' => 'api nesrece {id_nesrece}',
     'uses' => 'AccidentsController@apiCallOne'
 ]);
