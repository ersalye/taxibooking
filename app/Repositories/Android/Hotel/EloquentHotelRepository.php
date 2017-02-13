<?php

namespace App\Repositories\Android\Hotel;






use App\Models\Hotel\Hotel;

class EloquentHotelRepository implements HotelRepositoryContract
{

    protected $hotel;

    public function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }


    public function index($inputs)
    {

        $hotels = $this->hotel->select("*")
            ->get();

        return $hotels;


    }

    public function update($inputs)
    {
        if(!$this->checkId($inputs)){
            return null;
        }

        $hotel = $this->hotel->select("*")
            ->where("id",$inputs["id"])
            ->first();

        if($hotel==null){
            return null;
        }


        if(isset($inputs["name"])){
            $hotel->name = $inputs["name"];
        }
        if(isset($inputs["address"])){
            $hotel->address= $inputs["address"];
        }
        if(isset($inputs["address"])){
            $hotel->price = $inputs["price"];
        }


        $hotel->save();

        return $hotel;


    }

    public function show($input)
    {
       if(!$this->checkId($input)){
           return null;
       }

       $hotel = $this->hotel->select("*")
           ->where("id",$input["id"])
           ->first();
        return $hotel;
    }

    public function edit($inputs)
    {
        $hotel = $this->hotel->select("*")
            ->where("id",$inputs["id"])
            ->first();
        return $hotel;
    }

    public function delete($inputs)
    {
        if(!$this->checkId($inputs)){
            return null;
        }

        $hotel = $this->hotel->select("*")
            ->where("id",$inputs["id"])
            ->first();

        if($hotel==null){
            return false;
        }


        if($hotel->delete()){
            return true;
        }
        return false;
    }

    public function store($inputs)
    {
        $hotel = new Hotel();
        $hotel->name = $inputs["name"];
        $hotel->price= $inputs["price"];
        $hotel->address = $inputs["address"];
        $hotel->save();

        return $hotel;
    }


    private function checkId($inputs) {
        if(!isset($inputs["id"])){
            return false;
        }
        return true;
    }

}