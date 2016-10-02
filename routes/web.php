<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');



























// Begin :::upperCaseModelName::: Routes

Route::get('api/boom-data', 'ApiController@boomData');

Route::resource(':::modelPath:::', ':::upperCaseModelName:::Controller');

// End :::upperCaseModelName::: Routes
// Begin :::upperCaseModelName::: Routes

Route::get('api/boom-data', 'ApiController@boomData');

Route::resource(':::modelPath:::', ':::upperCaseModelName:::Controller');

// End :::upperCaseModelName::: Routes
// Begin :::upperCaseModelName::: Routes

Route::get('api/boom-data', 'ApiController@boomData');

Route::resource(':::modelPath:::', ':::upperCaseModelName:::Controller');

// End :::upperCaseModelName::: Routes



// Begin Widget Routes

Route::get('api/widget-data', 'ApiController@widgetData');

Route::resource('widget', 'WidgetController');

// End Widget Routes