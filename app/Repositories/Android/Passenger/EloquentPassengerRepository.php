<?php

namespace App\Repositories\Android\Passenger;


 use App\Models\GCM\GCM;
 use App\Models\Access\User\User;
 use App\Models\NearestDriver\NearestDriver;
 use App\Models\Transportation\Transportation;
 use Illuminate\Support\Facades\DB;


 class EloquentPassengerRepository implements PassengerRepositoryContract
{

     protected  $user;

     public function __construct(User $user)
     {
         $this->user = $user;
     }


     public function searchNearestDriver($inputs)
    {



        $user = User::select("*")->where("email",$inputs["email"])->first();



        if($user !=null) {

            $gcm_user = GCM::select("*")->where("driver_status","available")->get();

            $ids = [];
            foreach($gcm_user as $gcm) {
                $ids[] = $gcm->gcm_regid;
            }
            $google_gcm = new \App\Models\Google\GCM();
            $google_push = new \App\Models\Google\Push();

            $google_push->setTitle("Request from driver");
            $google_push->setFlag(1);
            $google_push->setData($user);

            $google_gcm->sendMultiple($ids,$google_push->getPush());

        }
    }

    public function updateMarker($inputs)
    {

        $lat =$inputs["lat"];
        $long= $inputs["long"];
        $user_email = $inputs["email"];
        $cabtype    = $inputs["cabtype"];


        /*
         SELECT * , ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($long) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) "
        . "AS distance FROM nearest_driver HAVING distance < 250 and user_email='$email' and driver_status = 'available' and cab_type ='$p_cab_type' ORDER BY distance
         * */

        $results = NearestDriver::select(
            DB::raw("*, ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($long) ) + sin( radians($lat) ) * sin( radians( latitude ))))
                        AS distance"))

            ->having("distance", "<", "250")
            ->where("user_email", $user_email)
            ->where("cab_type", $cabtype)
            ->orderBy("distance")
            ->get();

        return $results;

    }

    public function calculateDistant($inputs)
    {
        $latitude          = $inputs["lat"];
        $longitude         = $inputs["long"];
        $user_email   = $inputs["email"];
        $distance     = $inputs["distance"];

  /*      $nearest = User::select(
            DB::raw("*, ( 3959 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($long) ) + sin( radians($lat) ) * sin( radians( latitude ))))
                        AS distance"))

            ->where("email",$user_email)
            ->having("distance", "<", "250")
            ->orderBy("distance")

            ->first();*/

        $role = "Driver";
        $driver = $this->user->select(
            DB::raw("*, ( 3959 * acos( cos( radians($latitude) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($longitude) ) + sin( radians($latitude) ) * sin( radians( latitude ))))
                        AS distance")
        )
            ->with("transportations")
           /* ->where("latitude","!=",null)
            ->where("longitude","!=",null)*/
            //->where("available","available")
           ->whereHas("roles",function($query) use($role) {
               $query->where("name",$role);

           })
            ->first();


         $taxi = $driver->transportations->first();





        $distance = round($distance,2);  //distance in miles
        $avg_speed = 18.64;  // 30kmphr
        $reach_time = round(($distance/$avg_speed)*60 ,2);


        $fare_price = $taxi->fare_per_km;

        $estimated_fare = $fare_price * $distance ;

        $driver_details['distance'] = "$distance";
        $driver_details['reach_time'] = "$reach_time";
        $driver_details['name'] = $driver->name;
        $driver_details["email"]= $user_email;
        $driver_details['number'] =  $driver->mobile;
        $driver_details['cab_number'] =$taxi->number;
        $driver_details['fare'] = "$estimated_fare";
        $driver_details['fare_per_unit'] = "$estimated_fare";
        $driver_details["driver_email"]  = $driver->email;
        $driver_details["currency_type"] = $taxi->currency_type;




        return $driver_details;




    }



     public function cancelRequestBooking($inputs)
     {
         $driverEmail = $inputs["email"];

         $driver = $this->user->select("*")->where("email",$driverEmail)->first();

         $ids = [];

         $ids[] = $driver->app_id;

         $google_gcm = new \App\Models\Google\GCM();
         $google_push = new \App\Models\Google\Push();

         $google_push->setTitle(" ".$driver->name ." cancel driver now. Please confirm");
         $google_push->setFlag(102);
         $google_push->setData($driver);

         $google_gcm->sendMultiple($ids,$google_push->getPush());



         return $driver;

     }


     public function requestBookingDriver($inputs)
     {

             $driver_email = $inputs["driver_email"];
             $user_email   = $inputs["email"];
             $pick_address = $inputs["pick_address"];
             $dest_address = $inputs["dest_address"];
             $pick_time    = $inputs["pick_time"];
             $pick_date    = $inputs["pick_date"];
             $reach_time   = $inputs["reach_time"];
             $travel_time  = $inputs["travel_time"];

       /*  query:{pick_time=4:7, pick_address=Kraing Mkak Commune ,
         cab_number=999999, email=user@user.com, pick_date=2016-12-7,
         fare_per_unit=1, distance=19.7 km, dest_address=Roka Kaoh ,
         driver_email=driver@driver.com}*/
            $driver = User::select("*")->where("email",$driver_email)->first();
            $user   = User::select("*")->where("email",$user_email)->first();




            if($driver !=null) {

                $response["pick_address"] = $pick_address;
                $response["dest_address"] = $dest_address;
                $response["passenger_phone"] = $user->mobile;
                $response["passenger_name"]  = $user->name;
                $response["pick_time"] = $pick_time;
                $response["pick_date"] = $pick_date;
                $response["passenger_email"] = $user->email;
                $response["cab_number"]= $inputs["cab_number"];
                $response["distance"] = $inputs["distance"];
                $response["fare_per_unit"] = $inputs["fare_per_unit"];
                $response["travel_time"] = $travel_time;
                $response["reach_time"]  = $reach_time;

                $ids = [];

                $ids[] = $driver->app_id;

                $google_gcm = new \App\Models\Google\GCM();
                $google_push = new \App\Models\Google\Push();

                $google_push->setTitle(" ".$driver->name ." needs driver now. Please confirm");
                $google_push->setFlag(101);
                $google_push->setData($response);

                $google_gcm->sendMultiple($ids,$google_push->getPush());

            }

         return $response;




     }


 }
