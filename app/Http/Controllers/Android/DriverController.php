<?php
/**
 * @Created by PhpStorm.
 * @User: phuong
 * @Date: 10/20/2016
 * @Time: 11:52 AM
 */

namespace App\Http\Controllers\Android;

use App\Http\Controllers\Controller;
use App\Http\Requests\AndroidManageUser;

use App\Models\Google\GCM;
use App\Models\Google\Push;
use App\Repositories\Android\Driver\DriverRepositoryContract;

class DriverController extends  Controller{


    protected $driver;
    public function __construct(DriverRepositoryContract $driverRepositoryContract )
    {

        $this->driver = $driverRepositoryContract;


    }


    public function getStatus(AndroidManageUser $request) {
        $driver =  $this->driver->getStatus($request->all());
        $success = 0;


        if($driver !=null) {
            $success = 1;
        }
        return response()->json(['success'=>$success,'driver'=>$driver]);
    }


    public function updateStatus(AndroidManageUser $request) {
        $driver   = $this->driver->updateStatus($request->all());
        $success = 0;


        if($driver !=null) {
            $success = 1;
        }

        return response()->json(['success'=>$success,'driver'=>$driver]);

    }

    public function storeNearestDriver(AndroidManageUser $requesst) {

        $this->driver->storeNearestDriver($requesst->all());

    }

    public function driverUpdatePassengerMarker(AndroidManageUser $request) {
      $passengers = $this->driver->driverUpdatePassengerMarker($request->all());

        $success = 0;
        if($passengers !=null) {
            $success = 1;
        }

       return response()->json(["success"=>$success,"passengers"=>$passengers]);


    }

    public function driverCancelBookingRequest(AndroidManageUser $request){
      $passenger =  $this->driver->driverCancelBookingRequest($request->all());

       return response()->json(['data'=>$passenger]);

    }

    public function driverConfirmBookingRequest(AndroidManageUser $request) {


      $user =   $this->driver->driverConfirmBookingRequest($request->all());
        $success = 0;
        if($user !=null) {
            $success = 1;
        }

        return response()->json(["success"=>$success,"status"=>true,"user"=>$user]);


    }


    public function driverMissedConfirmBookingRequest(AndroidManageUser $request) {

      $driver =  $this->driver->driverMissedConfirmBookingRequest($request->all());
        $success = 0;
        if($driver !=null) {
            $success = 1;
        }

        return response()->json(["success"=>$success,"status"=>true,"driver"=>$driver]);


    }






}