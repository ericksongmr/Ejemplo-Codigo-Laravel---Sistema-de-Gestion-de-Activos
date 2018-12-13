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
    return view('auth.login')->with(['title' => 'Inicio de Sesión', 'active' => 'login']);
});

Auth::routes();
Route::get('/logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'auth.logout']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/', ['as' => 'admin.index', function () {
	    return view('admin.index')
	    	   ->with(['title' => 'Panel de Administración', 'active' => 'home']);
		}]);
	
	Route::group(['middleware' => 'admin'], function(){
		Route::resource('users', 'UsersController');
		Route::get('users/{user}/destroy', ['uses' => 'UsersController@destroy', 'as' => 'users.destroy']);
	});

	Route::resource('locations', 'LocationsController');
	Route::get('locations/{location}/destroy', ['uses' => 'LocationsController@destroy', 'as' => 'locations.destroy']);

	Route::resource('items', 'ItemsController');
	Route::get('items/{item}/destroy', ['uses' => 'ItemsController@destroy', 'as' => 'items.destroy']);

	Route::resource('categoriesAct', 'CategoriesActivesController');
	Route::get('categoriesAct/{categoryAct}/destroy', ['uses' => 'CategoriesActivesController@destroy', 'as' => 'categoriesAct.destroy']);

	Route::resource('actives', 'ActivesController');
	Route::post('actives/{active}', ['uses' => 'ActivesController@update', 'as' => 'actives.update']);
	Route::get('actives/{active}/destroy', ['uses' => 'ActivesController@destroy', 'as' => 'actives.destroy']);

	Route::resource('historyActives', 'HistoryActivesController');
	Route::get('historyActives/{historyActive}/destroy', ['uses' => 'HistoryActivesController@destroy', 'as' => 'historyActives.destroy']);

	Route::resource('stores', 'StoresController');
	Route::get('stores/{store}/destroy', ['uses' => 'StoresController@destroy', 'as' => 'stores.destroy']);

	Route::get('prices/{id}', ['uses' => 'PricesController@index', 'as' => 'prices.index']);
	Route::post('prices', ['uses' => 'PricesController@store', 'as' => 'prices.store']);
	Route::put('prices/{price}', ['uses' => 'PricesController@update', 'as' => 'prices.update']);
	Route::get('prices/{price}/destroy', ['uses' => 'PricesController@destroy', 'as' => 'prices.destroy']);

	Route::resource('jobs', 'JobsController');
	Route::get('jobs/{job}/destroy', ['uses' => 'JobsController@destroy', 'as' => 'jobs.destroy']);

	Route::get('jobsActives/{job}', ['uses' => 'JobsController@assign', 'as' => 'jobs.assign']);
	Route::post('jobsActives/{job}', ['uses' => 'JobsController@assign', 'as' => 'jobs.assign']);

	Route::resource('outputs', 'OutputsController');
	Route::get('outputs/{output}/destroy', ['uses' => 'OutputsController@destroy', 'as' => 'outputs.destroy']);
	Route::get('printOutput/{output}', ['uses' => 'OutputsController@printOutput', 'as' => 'outputs.print']);

	Route::group(['prefix' => 'reports'], function(){
		Route::get('actives', ['uses' => 'ReportsController@actives', 'as' => 'reports.actives']);
		Route::get('historyActives', ['uses' => 'ReportsController@historyActives', 'as' => 'reports.history']);
		Route::get('outputs', ['uses' => 'ReportsController@outputs', 'as' => 'reports.outputs']);
		Route::post('export', ['uses' => 'ReportsController@export', 'as' => 'reports.export']);
	});

});