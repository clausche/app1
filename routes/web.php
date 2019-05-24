<?php

Route::get('/',

	function () {
		Flashy::message('Welcome Aboard!', 'http://your-awesome-link.com');
		// Auth::user()->notify(new PruebaNotification);
		return view('welcome');
	})->name('index');
// Route::get('posts/notification', function () {
// 		return view('posts.notification');
// 	})->name('notification');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
		Route::get('/home', 'HomeController@index')->name('home');

		Route::get('notifications', 'MessageController@index')->name('message');
		Route::post('notifications/messages', 'MessageController@store')->name('men_store');
		Route::delete('notifications/{user}/borrados', 'MessageController@readAll');

		Route::get('posts/notification', 'NotificationController@index')->name('notification');
		Route::post('posts/notification/message', 'NotificationController@store')->name('message_store');
		Route::delete('posts/notifications/{user}/borrados', 'NotificationController@readAll');

		Route::get('posts/create', 'PostController@create')->name('create_post_path');
		Route::post('posts', 'PostController@store')->name('store_post_path');
		Route::get('posts/{id}/edit', 'PostController@edit')->name('edit_post_path');
		Route::put('posts/{post}', 'PostController@update')->name('update_post_path');
		Route::delete('posts/{id}', 'PostController@destroy')->name('delete_post_path');

	});

Route::get('posts', 'PostController@index')->name('posts_path')->middleware('auth');
Route::get('posts/{id}', 'PostController@show')->name('post_path');
