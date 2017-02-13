<?php

Route::get("phally",function() {
   return view("frontend.sample");
});

Route::group(['middleware' => 'web'], function() {
    /**
     * Switch between the included languages
     */
    Route::group(['namespace' => 'Language'], function () {
        require (__DIR__ . '/Routes/Language/Language.php');
    });

    /**
     * Frontend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Frontend'], function () {
        require (__DIR__ . '/Routes/Frontend/Frontend.php');
        require (__DIR__ . '/Routes/Frontend/Access.php');
    });





    ## Android route



    Route::group(['namespace' => 'Android'], function () {
        require (__DIR__ . '/Routes/Android/User.php');
        require (__DIR__ . '/Routes/Android/GCM.php');
        require (__DIR__ . '/Routes/Android/Driver.php');
        require (__DIR__ . '/Routes/Android/Passenger.php');
        require (__DIR__ . '/Routes/Android/Transportation.php');
        require (__DIR__ . '/Routes/Android/Ride.php');

        require (__DIR__ . '/Routes/Android/Test.php');

        require (__DIR__). '/Routes/Android/Hotel.php';

    });








});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 * Admin middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    require (__DIR__ . '/Routes/Backend/Dashboard.php');
    require (__DIR__ . '/Routes/Backend/Access.php');
    require (__DIR__ . '/Routes/Backend/LogViewer.php');



    //  Restaurant
    require (__DIR__."/Routes/Backend/Transportation.php");

    // Menu


    require (__DIR__."/Routes/Backend/User.php");



    require (__DIR__."/Routes/Backend/Ride.php");



    require (__DIR__."/Routes/Backend/Contact.php");


});
