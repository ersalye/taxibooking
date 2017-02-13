<?php

namespace App\Http\Controllers\Android;


use App\Http\Controllers\Controller;
use App\Http\Requests\AndroidManageUser;
use App\Repositories\Android\Ride\RideRepositoryContract;


class RideController extends Controller {

    protected  $ride;

    public function __construct(RideRepositoryContract $ride)
    {

            $this->ride = $ride;

    }



    public function lists(AndroidManageUser $request) {


        $rides = $this->ride->lists($request->all());
        $result = 0;

        if($rides !=null){
            $result = 1;
        }

        return response()->json(["success"=>$result,"rides"=>$rides]);

    }



}