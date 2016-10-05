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









































// Begin Category Routes

Route::any('api/category-data', 'ApiController@categoryData');

Route::get('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);

Route::get('category/{id}-{slug?}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);

Route::resource('category', 'CategoryController', ['except' => ['show', 'create']]);

// End Category Routes
// Begin Subcategory Routes

Route::any('api/subcategory-data', 'ApiController@subcategoryData');

Route::get('subcategory/create', ['as' => 'subcategory.create', 'uses' => 'SubcategoryController@create']);

Route::get('subcategory/{id}-{slug?}', ['as' => 'subcategory.show', 'uses' => 'SubcategoryController@show']);

Route::resource('subcategory', 'SubcategoryController', ['except' => ['show', 'create']]);

// End Subcategory Routes







// Begin Boom Routes

Route::any('api/boom-data', 'ApiController@boomData');

Route::get('boom/create', ['as' => 'boom.create', 'uses' => 'BoomController@create']);

Route::get('boom/{id}-{slug?}', ['as' => 'boom.show', 'uses' => 'BoomController@show']);

Route::resource('boom', 'BoomController', ['except' => ['show', 'create']]);

// End Boom Routes
// Begin Boomlet Routes

Route::get('api/boomlet-data', 'ApiController@boomletData');

Route::resource('boomlet', 'BoomletController');

// End Boomlet Routes