<?php


// url for update user available and location
Route::get("android/user/update/available","\App\Http\Controllers\Android\UserController@UserUpdateAvailable")->name("android.user.update.available");

// url for select list marker pasenger or driver .. both can used.
Route::get("android/user/maker/list","\App\Http\Controllers\Android\UserController@markerList")->name("android.user.marker.lists");



Route::get("android/user/login","\App\Http\Controllers\Android\UserController@index")->name("android.user.login");
    Route::get("android/user/register","\App\Http\Controllers\Android\UserController@store")->name("android.user.register");
    Route::get("android/user/update_rider_location","\App\Http\Controllers\Android\UserController@updateUser")->name("android.user.updateUser");
    Route::get("android/user/logOut","\App\Http\Controllers\Android\UserController@logOut")->name("android.user.logOut");

    Route::get("android/user/createOrUpdate/app/id","\App\Http\Controllers\Android\UserController@createOrUpdateApp")->name("android.user.createOrUpdateApp");

    Route::get("android/user/profile/get","\App\Http\Controllers\Android\UserController@getProfile")->name("android.user.get.profile");
    Route::get("android/user/profile/update","\App\Http\Controllers\Android\UserController@updateProfile")->name("android.user.update.profile");

Route::get("android/user/send/email/and/location/to/driver","\App\Http\Controllers\Android\UserController@updateDriverLocationAndNearest")->name("android.user.location.and.nearest");