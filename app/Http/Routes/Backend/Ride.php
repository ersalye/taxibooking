<?php


Route::resource('ride', 'RideController', ['except' => ['show']]);

Route::get('ride/get', 'RideController@get')->name('admin.ride.get');

Route::get('ride/deleted', 'RideController@deleted')->name('admin.ride.deleted');

Route::get('ride/deactivated', 'RideController@deactivated')->name('admin.ride.deactivated');

Route::get('ride/{ride}/mark/{status}', 'RideController@mark')->name('admin.ride.mark')->where(['status' => '[0,1]']);

Route::get('ride/{deletedRide}/delete', 'RideController@delete')->name('admin.ride.delete-permanently');

Route::get('ride/{deletedRide}/restore', 'RideController@restore')->name('admin.ride.restore');








