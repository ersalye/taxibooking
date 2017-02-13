<?php



Route::get("android/passenger/search_driver","\App\Http\Controllers\Android\PassengerController@searchNearestDriver")->name("android.passenger.search_driver");

Route::get("android/passenger/update_marker","\App\Http\Controllers\Android\PassengerController@updateMarker")->name("android.passenger.update.markers");

Route::get("android/passenger/calculator/distant","\App\Http\Controllers\Android\PassengerController@calculatorDistant")->name("android.passenger.calculator.distant");

Route::get("android/passenger/request/booking/driver","\App\Http\Controllers\Android\PassengerController@requestBookingDriver")->name("android.passenger.request.booking.driver");

Route::get("android/passenger/cancel/request/booking/driver","\App\Http\Controllers\Android\PassengerController@cancelRequestBooking")->name("android.passenger.cancel.request.booking.driver");


