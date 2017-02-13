<?php

namespace App\Repositories\Android\Transportation;







use App\Models\Access\User\User;

class EloquentTransportationRepository implements TransportationRepositoryContract
{

    private $user;


    public function __construct( User $user )
    {
        $this->user = $user;


    }


    public function getTaxi($inputs)
    {
        $user = $this->user->select("*")
            ->where("email",$inputs["email"])
            ->with("transportations")
            ->first();
        if($user) {
            $tranportation = $user->transportations->first();
            if($tranportation!=null){
                return $tranportation;
            }

        }
        return null;

    }

    public function updateTaxi($inputs)
    {
        $user = $this->user->select("*")
            ->where("email",$inputs["email"])
            ->with("transportations")
            ->first();
        if($user) {
            $tranportation = $user->transportations->first();
            if($tranportation!=null){

                $tranportation->name = $inputs["name"];
                $tranportation->number = $inputs["number"];
                $tranportation->fare_per_hour = $inputs["fare_per_hour"];
                $tranportation->fare_per_km   = $inputs["fare_per_km"];
                $tranportation->save();

                return $tranportation;
            }

        }
        return null;

    }

}