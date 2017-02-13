<?php



Route::resource('user', 'UserController', ['except' => ['show']]);

Route::get('user/get', 'UserController@get')->name('admin.user.get');

Route::get('user/deleted', 'UserController@deleted')->name('admin.user.deleted');

Route::get('user/deactivated', 'UserController@deactivated')->name('admin.user.deactivated');

Route::get('user/{user}/mark/{status}', 'UserController@mark')->name('admin.user.mark')->where(['status' => '[0,1]']);

Route::get('user/{deletedUser}/delete', 'UserController@delete')->name('admin.user.delete-permanently');

Route::get('user/{deletedUser}/restore', 'UserController@restore')->name('admin.user.restore');







