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
    return view('vendor.adminlte.welcome');
});

Route::group(['middleware' => 'auth'], function () {
	//Route::auth();
	//Route::get('/home', 'HomeController@index')->name('home');

//	Route::get('admin/give-role-permissions', 'Admin\AdminController@getGiveRolePermissions');
//	Route::post('admin/give-role-permissions', 'Admin\AdminController@postGiveRolePermissions');
	Route::resource('admin/roles', 'Admin\RolesController');
//	Route::resource('admin/permissions', 'Admin\PermissionsController');
//	Route::get('admin/permissions-init', 'Admin\PermissionsController@getInitPermissions');
//	Route::post('admin/permissions-init', 'Admin\PermissionsController@postInitPermissions');
	Route::resource('admin/users', 'Admin\UsersController');
//	Route::resource('admin/pages', 'Admin\PagesController');
	Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
		'index', 'show', 'destroy'
	]);
	Route::resource('admin/settings', 'Admin\SettingsController');
//	Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
//	Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
	Route::get('profile', 'Admin\UsersController@getProfile');
	Route::post('profile', 'Admin\UsersController@postProfile');
});