<?php

namespace App\Repositories\Android\Driver;






use App\Models\Access\User\User;

use App\Repositories\Android\Ride\RideRepositoryContract;


class EloquentDriverRepository implements DriverRepositoryContract
{
        protected $gcm_user;
        protected $user;
        protected $ride;




        public function __construct(User $user ,RideRepositoryContract $ride)
        {
            $this->user = $user;
            $this->ride = $ride;


        }

        public function getStatus($inputs)
        {
            $driver =
                $this->gcm_user
                    ->select("*")
                    ->where("email",$inputs["email"])
                    ->with("user.transportations")
                    ->first();
            return $driver;
        }

    public function updateStatus($inputs)
    {

        $driver = $this->user->select("*")
            ->where("email",$inputs["email"])
            ->first();

        if($driver !=null){
            if(isset($inputs["available"])) {


                $driver->available = $inputs["available"];
            }

            if(isset($inputs["latitude"])) {
                $driver->latitude = $inputs["latitude"];
            }

            if(isset($inputs["longitude"])){
                $driver->longitude = $inputs["longitude"];
            }

            $driver->save();
        }

        return $driver;

    }




    public function driverUpdatePassengerMarker($inputs)
    {

        $users = User::select("*")
            ->where("latitude","!=",null)
            ->where("longitude","!=",null)
            ->whereHas("roles",function($query) use ($inputs) {
                $query->where("name","User");

            })
            ->get();
        return $users;
    }


    public function driverCancelBookingRequest($inputs)
    {


        $user_email = $inputs["email"];
        $user = User::select("*")
            ->where("email",$user_email)
            ->first();

        $ids = [];
        $ids[] = $user->app_id;





        $google_gcm = new \App\Models\Google\GCM();
        $google_push = new \App\Models\Google\Push();

        $google_push->setTitle("Driver Cancel request");
        $google_push->setFlag("103");
        $google_push->setData($user);


        $google_gcm->sendMultiple($ids,$google_push->getPush());
        return $user;


    }
    function driverConfirmBookingRequest($inputs)
    {
        $user_email = $inputs["user_email"];

        $user = User::select("*")->where("email",$user_email)->first();

        $this->ride->save($inputs);


        $ids[] = $user->app_id;
        $google_gcm = new \App\Models\Google\GCM();
        $google_push = new \App\Models\Google\Push();

        $google_push->setTitle("Driver confirm request");
        $google_push->setFlag("104");
        $google_push->setData($user);


        $google_gcm->sendMultiple($ids,$google_push->getPush());

        return $user;



    }

    public function driverMissedConfirmBookingRequest($inputs)
    {





    }




}
