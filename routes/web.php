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
Route::get('/', function (){
	return view('vendor.adminlte.welcome');
});
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('admin', 'Admin\AdminController@index');
	Route::resource('admin/roles', 'Admin\RolesController');
	Route::resource('admin/permissions', 'Admin\PermissionsController');
	Route::resource('admin/users', 'Admin\UsersController');
	Route::resource('admin/pages', 'Admin\PagesController');
	Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
		'index', 'show', 'destroy'
	]);
	Route::resource('admin/settings', 'Admin\SettingsController');
	Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
	Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
});

Auth::routes();

