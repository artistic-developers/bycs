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

Route::get('/', 'ApiController@index');
Route::get('/neo/hazardous', 'ApiController@hazardous');
Route::get('/neo/fastest', 'ApiController@fastest');
Route::get('/neo/best-year', 'ApiController@best_year');
Route::get('/neo/best-month', 'ApiController@best_month');
