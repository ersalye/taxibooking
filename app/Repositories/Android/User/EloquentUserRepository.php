<?php

namespace App\Repositories\Android\User;



  use App\Models\GCM\GCM;
  use Illuminate\Support\Facades\Crypt;
  use Illuminate\Support\Facades\DB;
  use App\Models\Access\User\User;
  use Illuminate\Support\Facades\Hash;
  use App\Models\NearestDriver\NearestDriver;






class EloquentUserRepository implements UserRepositoryContract
{

    protected $user;
    protected $gcm_user;

    public function __construct(User $user , GCM $GCM)
    {
        $this->user = $user;
        $this->gcm_user = $GCM;
    }

    public function UserUpdateAvailable($inputs)
    {

         $user = $this->select($inputs);
         if($user!=null){
             if(isset($inputs["latitude"])){
                 $user->latitude = $inputs["latitude"];
             }
             if(isset($inputs["longitude"])){
                 $user->longitude = $inputs["longitude"];
             }
             if(isset($inputs["available"])){
                 $user->available = $inputs["available"];
             }
             // update user
             $user->save();
             /// send broadcast to client
             $role = $user->roles()->first();
             if($role->name=="Driver"){
                 $users = User::select(["id","app_id"])
                     // ->where("app_id","!=","")
                     ->whereHas("roles",function($query) use($role) {
                         $query->where("name","User");
                     })
                     ->get();
                 if($users !=null) {
                     $ids = [];
                     foreach($users as $u) {
                         $ids[] = $u->app_id;
                     }
                 }
                 $google_gcm = new \App\Models\Google\GCM();
                 $google_push = new \App\Models\Google\Push();
                 $google_push->setTitle("user update driver marker");
                 $google_push->setFlag(200);
                 $google_push->setData($user);
                 $google_gcm->sendMultiple($ids,$google_push->getPush());
             }
             if($role->name=="User"){
                 $users = User::select(["id","app_id"])
                     // ->where("app_id","!=","")
                     ->whereHas("roles",function($query) use($role) {
                         $query->where("name","Driver");
                     })
                     ->get();
                 if($users !=null) {
                     $ids = [];
                     foreach($users as $u) {
                         $ids[] = $u->app_id;
                     }
                 }
                 $google_gcm = new \App\Models\Google\GCM();
                 $google_push = new \App\Models\Google\Push();
                 $google_push->setTitle("Driver update user marker");
                 $google_push->setFlag(100);
                 $google_push->setData($user);
                 $google_gcm->sendMultiple($ids,$google_push->getPush());

             }
         }

         return  $user;
    }


    public function doLogin($inputs)
    {
        // first select users
        $user = $this->select($inputs);
        if($user && Hash::check($inputs["password"],  $user->password )){
            if($user !=null) {
                // available 1
                $user->app_id = $inputs["app_id"];
                $user->status = 1;
                $user->latitude = $inputs["latitude"];
                $user->longitude= $inputs["longitude"];
                $user->save();
            }
        }



        return $user;




    }


    public function createOrUpdateApp($inputs)
    {
        // select user firs
       $user = $this->user
                ->select("app_id")
                ->where("email", $inputs["email"]);

        // if have users update app_id
       if($user !=null) {

           $user->app_id = $inputs["app_id"];
           $user->save();

       }
        return $user;
    }


    public function update($inputs)
    {
        $user = $this->user->select("*")->where("email",$inputs["email"])->first();
        if($user !=null) {
            $user->longitude = $inputs["long"];
            $user->latitude  = $inputs["lat"];
            // what is taxi that user want ...
            $user->cab_type  = $inputs["cabtype"];
            $user->save();
        }

        $gcm_user = GCM::select("*")->where("driver_status","available")->get();

        $ids = [];
        foreach($gcm_user as $gcm) {
            $ids[] = $gcm->gcm_regid;
        }
        $google_gcm = new GCM();
        $google_push = new Push();

        $google_push->setTitle("this is title");
        $google_push->setFlag(1);
        $google_push->setData(['data'=>'user object']);


        $google_gcm->sendMultiple($ids,$google_push->getPush());


    }


    public function create($inputs)
    {

        $user = $this->HaveEmail($inputs);
        if($user==null){
            $user = $this->createUserStub($inputs);

            DB::transaction(function() use ($user , $inputs) {
                if ($user->save()) {
                    if($inputs["user_type"]=="User") {
                        $user->attachRole(4);
                    } else if($inputs["user_type"]=="Driver"|| $inputs["user_type"]=="driver"){
                        $user->attachRole(3);
                        $user->attachTransportation($inputs["taxi_type"]);
                    } else {
                        $user->attachRole(4);
                    }

                }
                ///  throw new GeneralException(trans('exceptions.backend.access.users.create_error'));
            });
            return $user;
        } else {
            return "exist_email";
        }



    }


    public function getDriverStatus($inputs)
    {

        $driver =
            $this->gcm_user
                ->select("*")
                ->where("email",$inputs["email"])
                ->with("user.transportations")
                ->first();
        return $driver;

    }

    public function HaveEmail($inputs){
        $user = $this->user
            ->select("*")
            ->where("email",$inputs["email"])

            ->first();
        return $user;
    }

    public function select($inputs) {
        $user = $this->user
            ->select("*")
            ->where("email",$inputs["email"])
            ->with("roles")
            ->with("transportations")
            ->first();
        return $user;
    }

    public function logOut($inputs)
    {
        $gcm = $this->gcm_user->select("*")
        ->where("email",$inputs["email"])
        ->first();

        if($gcm !=null){
            if(isset($inputs["driver_status"])) {
                $gcm->driver_status = $inputs["driver_status"];
            }

            if(isset($inputs["latitude"])) {
                $gcm->latitude = $inputs["latitude"];
            }

            if(isset($inputs["longitude"])){
                $gcm->longitude = $inputs["longitude"];
            }

            $gcm->driver_status = "Offline";

            $gcm->save();
        }

        return $gcm;
    }


    public function updateDriverStatus($inputs)
    {



        $gcm = $this->gcm_user->select("*")
            ->where("email",$inputs["email"])
            ->first();

        if($gcm !=null){
            if(isset($inputs["driver_status"])) {
                $gcm->driver_status = $inputs["driver_status"];
            }

            if(isset($inputs["latitude"])) {
                $gcm->latitude = $inputs["latitude"];
            }

            if(isset($inputs["longitude"])){
                $gcm->longitude = $inputs["longitude"];
            }




            $gcm->save();
        }

        return $gcm;

    }

    public function updateDriverLocationAndNearest($inputs)
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

    public function storeNearestDriver($inputs)
    {
        $nearest =  new NearestDriver();


        $nearest->save();

    }


    private function checkNoEmail($email) {




    }


    private function createUserStub($input)
    {
        $user                    = new User;
        $user->app_id            = $input["app_id"];
        $user->name              = $input['full_name'];
        $user->email             = $input['email'];
        $user->password          = bcrypt($input['password']);

        $user->status            = isset($input['status']) ? 1 : 0;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed         = isset($input['confirmed']) ? 1 : 0;
        return $user;
    }

    public function getByEmail($inputs){
        return $this->user->select("*")->with("roles")->where("email",$inputs["email"])->first();
    }


    public function markerList($inputs)
    {
        $latitude = $inputs["latitude"];
        $longitude= $inputs["longitude"];
        $user =  $this->getByEmail($inputs);
        $transportation = $inputs["transportation"];
        if($user!=null){

            $role = $user->roles()->first();




            if($role->name=="Driver") {
                $users = $this->user->select(
                    DB::raw("*, ( 3959 * acos( cos( radians($latitude) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($longitude) ) + sin( radians($latitude) ) * sin( radians( latitude ))))
                        AS distance")
                )
                    ->where("latitude","!=",null)
                    ->where("longitude","!=",null)
                    ->where("available","Available")
                    //->where("available","available")
                    ->whereHas("roles",function($query) use($role) {
                        $query->where("name","User");

                    })
                    ->get();
            }

            if($role->name=="User"){



                $users = $this->user->select(
                    DB::raw("*, ( 3959 * acos( cos( radians($latitude) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($longitude) ) + sin( radians($latitude) ) * sin( radians( latitude ))))
                        AS distance")
                )
                    ->where("latitude","!=",null)
                    ->where("available","Available")
                    ->where("longitude","!=",null)
                    //->where("available","available")
                    ->whereHas("roles",function($query) use($role) {
                        $query->where("name","Driver");

                    })
                    ->whereHas("transportations",function($query) use($transportation){
                          $query->whereSlug($transportation);
                    })
                    ->get();
            }

        }
        return $users;
    }




    public function getProfile($inputs)
    {
        $user = $this->user
                ->select("*")
                ->whereEmail($inputs["email"])
                ->first();
        return $user;
    }


    public function updateProfile($inputs)
    {


         $user = $this->getByEmail($inputs);


         if(isset($inputs["password"])){
             if(!Hash::check($inputs["password"], $user->password)){
                $user->password = bcrypt($inputs["password"]);
             }

         }
         if(isset($inputs["name"])){
             $user->name = $inputs["name"];
         }


         $user->save();




        return $user;
    }

}