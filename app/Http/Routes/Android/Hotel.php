<?php


  Route::get("api/hotel/get","\App\Http\Controllers\Android\HotelController@index")->name("api.hotel.index");


  Route::get("api/hotel/store","\App\Http\Controllers\Android\HotelController@store")->name("api.hotel.store");

  Route::get("api/hotel/show","\App\Http\Controllers\Android\HotelController@show")->name("api.hotel.show");

  Route::get("api/hotel/delete","\App\Http\Controllers\Android\HotelController@delete")->name("api.hotel.delete");

  Route::get("api/hotel/edit","\App\Http\Controllers\Android\HotelController@edit")->name("api.hotel.edit");

  Route::get("api/hotel/update","\App\Http\Controllers\Android\HotelController@update")->name("api.hotel.update");
