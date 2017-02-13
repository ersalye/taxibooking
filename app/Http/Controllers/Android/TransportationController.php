<?php

namespace App\Http\Controllers\Android;


use App\Http\Controllers\Controller;
use App\Http\Requests\AndroidManageUser;

use App\Repositories\Android\Transportation\TransportationRepositoryContract;


class TransportationController extends Controller {

    protected  $transportation;

    public function __construct(TransportationRepositoryContract $transportation)
    {

            $this->transportation = $transportation;

    }




    public function getTaxi(AndroidManageUser $request){

        $transportation = $this->transportation->getTaxi($request->all());
        $result = 0;

        if($transportation !=null){
            $result = 1;
        }

        return response()->json(["success"=>$result,"transportation"=>$transportation]);
    }


    public function updateTaxi(AndroidManageUser $request) {


        $transportation = $this->transportation->updateTaxi($request->all());
        $result = 0;

        if($transportation !=null){
            $result = 1;
        }

        return response()->json(["success"=>$result,"transportation"=>$transportation]);

    }




}