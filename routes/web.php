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






















// Begin Widget Routes

Route::any('api/widget-data', 'ApiController@widgetData');

Route::get('widget/create', ['as' => 'widget.create', 'uses' => 'WidgetController@create']);

Route::get('widget/{id}-{slug?}', ['as' => 'widget.show', 'uses' => 'WidgetController@show']);

Route::resource('widget', 'WidgetController', ['except' => ['show', 'create']]);

// End Widget Routes