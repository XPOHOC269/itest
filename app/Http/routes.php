<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return Redirect::to('auth/login');
});

Route::get('sites', 'HomeController@index');
Route::get('monitoring', 'MonitoringController@index');
Route::get('check', ['as' => 'check', function()
{
	Artisan::call('monitoring');
	return Redirect::to('monitoring');
}]);

Route::get('clear', ['as' => 'clear', function()
{
	$monitoring = \App\Monitoring::where('user_id', Auth::user()->id)->get();
	foreach($monitoring as $row){
		$row->delete();
	}
	return Redirect::to('monitoring');
}]);

Route::get('create', ['as' => 'create', 'uses' => 'HomeController@create']);
Route::post('create', 'HomeController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('update/{id}', ['as' => 'update', 'uses' => 'HomeController@update']);
Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'HomeController@destroy']);
Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'HomeController@edit']);

