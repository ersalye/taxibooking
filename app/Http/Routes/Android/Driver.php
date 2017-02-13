<?php


Route::get("android/driver/status/get","\App\Http\Controllers\Android\DriverController@getStatus")->name("android.driver.status");

Route::get("android/driver/store/nearest_driver","\App\Http\Controllers\Android\DriverController@storeNearestDriver")->name("android.driver.store.nearest.driver");
Route::get("android/driver/update/passenger/marker","\App\Http\Controllers\Android\DriverController@driverUpdatePassengerMarker")->name("android.driver.update.passenger.marker");


Route::get("android/driver/cancel/request/booking/passenger","\App\Http\Controllers\Android\DriverController@driverCancelBookingRequest")->name("android.driver.cancel.booking.request.passenger");


Route::get("android/driver/confirm/request/booking/passenger","\App\Http\Controllers\Android\DriverController@driverConfirmBookingRequest")->name("android.driver.cancel.booking.request.passenger");


Route::get("android/driver/missed/confirm/request/booking/passenger","\App\Http\Controllers\Android\DriverController@driverMissedConfirmBookingRequest")->name("android.driver.missed.booking.request.passenger");
