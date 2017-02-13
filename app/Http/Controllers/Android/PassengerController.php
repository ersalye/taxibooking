<?php
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/20/2016
 * Time: 11:53 AM
 */

namespace App\Http\Controllers\Android;


use App\Http\Controllers\Controller;
use App\Http\Requests\AndroidManageUser;
use App\Repositories\Android\Passenger\PassengerRepositoryContract;

class PassengerController extends  Controller{

    protected $passenger;


    public function __construct(PassengerRepositoryContract $passengerRepositoryContract)
    {
        $this->passenger = $passengerRepositoryContract;

    }


    public function searchNearestDriver(AndroidManageUser $request) {


        $this->passenger->searchNearestDriver($request->all());

    }

    public function updateMarker(AndroidManageUser $request) {

        $nearests =  $this->passenger->updateMarker($request->all());

        $respone = 0;
        if($nearests !=null) {
            $respone = 1;
        }
        return response()->json(["result"=>$respone,"nearests"=>$nearests]);


    }


    public function calculatorDistant(AndroidManageUser $request) {

        $response = $this->passenger->calculateDistant($request->all());
        return response()->json($response);

    }

    public function requestBookingDriver(AndroidManageUser $request) {
        return response()->json($this->passenger->requestBookingDriver($request->all()));
    }

    public function cancelRequestBooking(AndroidManageUser $request) {
       $driver = $this->passenger->cancelRequestBooking($request->all());
        dd($driver);
    }







}