<?php

namespace App\Http\Controllers\Android;


use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Repositories\Android\Hotel\HotelRepositoryContract;
use Illuminate\Http\Request;


class HotelController extends Controller {



    protected  $hotel;


    protected  $request;



    public function __construct(HotelRepositoryContract $hotelRepositoryContract,HotelRequest $request)
    {

        $this->hotel = $hotelRepositoryContract;
        $this->request = $request;

    }




    public function index(HotelRequest $request){

        $hotels =$this->hotel->index($request->all());

        if($hotels !=null){

            $this->data = $hotels;
            $this->success = true;

        }
        return $this->toJson();


    }


    public function store(HotelRequest $request){


        $hotel =  $this->hotel->store($request->all());

        if($hotel!=null){
            $this->data = $hotel;
            $this->success = true;
        }
        return $this->toJson();

    }

    public function show(HotelRequest $request) {

        $hotel = $this->hotel->show($request->all());

        if($hotel!=null){
            $this->success = true;
            $this->data = $hotel;
        }

        return  $this->toJson();


    }

    public function delete(HotelRequest $request) {

        if($this->hotel->delete($request->all())){

            $this->success = true;

        }
        return  $this->toJson();

    }


    public function edit(HotelRequest $request) {
        $hotel = $this->hotel->edit($request->all());

        if($hotel!=null){
            $this->success = true;
            $this->data = $hotel;
        }

        return $this->toJson();
    }


    public function update(HotelRequest $request) {
        $hotel = $this->hotel->update($request->all());

        if($hotel!=null){
            $this->success = true;
            $this->data = $hotel;
        }

        return $this->toJson();
    }



}