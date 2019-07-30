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

	Auth::routes();

	Route::get('/posts', 'PostsController@index')->name('posts.index');	

	Route::group(['middleware' => ['auth','checkPermissions']], function() {
    	Route::resource(
			'/posts', 'PostsController'
		)->except('index');
        Route::resource(
			'/dashboard', 'DashboardController'
		);
		Route::resource(
			'/albums/images', 'ImagesController'
		);
		Route::resource(
			'/albums', 'AlbumsController'
		);
		Route::get(
			'/logins', 'DashboardController@logins'
		);
        Route::get(
			'/logouts', 'DashboardController@logouts'
		);
        Route::get(
			'/allusers', 'DashboardController@allusers'
		); 
	});

	Route::get(
		'logout', '\App\Http\Controllers\Auth\LoginController@logout'
	);