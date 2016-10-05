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




// Begin Boom Routes

Route::any('api/boom-data', 'ApiController@boomData');

Route::get('boom/create', ['as' => 'boom.create', 'uses' => 'BoomController@create']);

Route::get('boom/{id}-{slug?}', ['as' => 'boom.show', 'uses' => 'BoomController@show']);

Route::resource('boom', 'BoomController', ['except' => ['show', 'create']]);

// End Boom Routes
































// Begin Category Routes

Route::get('api/category-data', 'ApiController@categoryData');

Route::resource('category', 'CategoryController');

// End Category Routes
// Begin Subcategory Routes

Route::get('api/subcategory-data', 'ApiController@subcategoryData');

Route::resource('subcategory', 'SubcategoryController');

// End Subcategory Routes