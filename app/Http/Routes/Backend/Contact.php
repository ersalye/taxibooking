<?php




Route::resource('contact', 'ContactController', ['except' => ['show']]);

Route::get('contact/get', 'ContactController@get')->name('admin.contact.get');

Route::get('contact/deleted', 'ContactController@deleted')->name('admin.contact.deleted');

Route::get('contact/deactivated', 'ContactController@deactivated')->name('admin.contact.deactivated');

Route::get('contact/{contact}/mark/{status}', 'ContactController@mark')->name('admin.contact.mark')->where(['status' => '[0,1]']);

Route::get('contact/{deletedContact}/delete', 'ContactController@delete')->name('admin.contact.delete-permanently');

Route::get('contact/{deletedContact}/restore', 'ContactController@restore')->name('admin.contact.restore');







