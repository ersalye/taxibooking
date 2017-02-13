<?php

namespace App\Repositories\Android\Ride;








use App\Models\Ride\Ride;

class EloquentRideRepository implements RideRepositoryContract
{

    protected $ride;


    public function __construct( Ride $ride )
    {

        $this->ride = $ride;

    }

    public function save($inputs) {
        $ride = new Ride();
        $ride->status = 1;
        $ride->user_email = $inputs["user_email"];
        $ride->driver_email = $inputs["driver_email"];
        $ride->pickup_location = $inputs["pickup_location"];
        $ride->dropoff_location= $inputs["dropoff_location"];
        $ride->distance = $inputs["distance"];
        $ride->reach_time = $inputs["reach_time"];
        $ride->travel_time= $inputs["travel_time"];


        $ride->save();
    }


    public function lists($inputs)
    {

        $rides = $this->ride
            ->select("*")
            ->orderBy("id","desc")
            ->get();

        if(isset($inputs["role"])) {
            if($inputs["role"]=="Driver") {
                return $rides->where("driver_email",$inputs["email"]);
            } else {
                return $rides->where("user_email",$inputs["email"]);
            }
        }



        return $rides;


    }

}