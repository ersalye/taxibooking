<?php



Route::resource('transportation', 'TransportationController', ['except' => ['show']]);

Route::get('transportation/get', 'TransportationController@get')->name('admin.transportation.get');

Route::get('transportation/deleted', 'TransportationController@deleted')->name('admin.transportation.deleted');

Route::get('transportation/deactivated', 'TransportationController@deactivated')->name('admin.transportation.deactivated');

Route::get('transportation/{transportation}/mark/{status}', 'TransportationController@mark')->name('admin.transportation.mark')->where(['status' => '[0,1]']);

Route::get('transportation/{deletedTransportation}/delete', 'TransportationController@delete')->name('admin.transportation.delete-permanently');

Route::get('transportation/{deletedTransportation}/restore', 'TransportationController@restore')->name('admin.transportation.restore');







