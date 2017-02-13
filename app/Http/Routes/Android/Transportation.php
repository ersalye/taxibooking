<?php


  Route::get("android/taxi/get","\App\Http\Controllers\Android\TransportationController@getTaxi")->name("android.taxi.get");
  Route::get("android/taxi/update","\App\Http\Controllers\Android\TransportationController@updateTaxi")->name("android.taxi.update");
