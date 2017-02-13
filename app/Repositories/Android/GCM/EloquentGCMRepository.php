<?php

namespace App\Repositories\Android\GCM;




  use App\Models\GCM\GCM;


class EloquentGCMRepository implements GCMRepositoryContract
{




    protected $gcm_user;

    public function __construct(GCM $GCM)
    {
        $this->gcm_user = $GCM;
    }

    public function create($inputs)
    {


        $check = $this->checkEmail($inputs);
        if($check !=null){
            $gcm = $check;
            $gcm = $this->createGCMStub($gcm,$inputs);
        } else {
            $gcm = new GCM();
            $gcm = $this->createGCMStub($gcm , $inputs);
        }

         return $gcm;
    }

    private function checkEmail($inputs) {

        $gcm = $this->gcm_user->select("*")
                       ->where("email",$inputs["email"])
                       ->OrWhere("gcm_regid",$inputs["regId"])
                       ->first();
         return $gcm;
    }




    private function createGCMStub($gcm,$inputs) {

        if(isset($inputs["regId"])){
            $gcm->gcm_regid      = $inputs["regId"];
        }

        if(isset($inputs["user_id"])) {
            $gcm->user_id = $inputs["user_id"];
        }


        if(isset($inputs["driver_status"])){
            $gcm->driver_status  = $inputs["driver_status"];
        }
        if(isset($inputs["email"])){
            $gcm->email          = $inputs["email"];
        }
        if(isset($inputs["user_type"])) {
            $gcm->user_type      = $inputs["user_type"];
        }
        if(isset($inputs["latitude"])) {
            $gcm->latitude       = $inputs["latitude"];
        }
        if(isset($inputs["longitude"])) {
            $gcm->longitude       = $inputs{"longitude"};
        }

        $gcm->save();

        return $gcm;

    }

}
