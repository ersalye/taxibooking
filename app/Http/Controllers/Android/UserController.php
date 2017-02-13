<?php

namespace App\Http\Controllers\Android;


use App\Http\Controllers\Controller;
use App\Http\Requests\AndroidManageUser;

use App\Models\Google\GCM;
use App\Models\Google\Push;
use App\Repositories\Android\User\UserRepositoryContract;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller {

    protected  $user;

    public function __construct(UserRepositoryContract $userRepositoryContract)
    {

        $this->user = $userRepositoryContract;

    }

    public function index(AndroidManageUser $request) {

        $success = 0;
        $approved = 1;
        $user = $this->user->doLogin($request->all());
        if($user !=null){
            $success = 1;
            if($user->approved==0){
                $approved = 0;
            }

        }




         return response()->json(
             [
                 "success"=>$success,
                 "approved"=>$approved,
                 "user"=>$user
             ]
         );
        // return response()->json($this->user->doLogin($request->all()));

    }

    public function store(AndroidManageUser $request) {

        $validator = Validator::make($request->all(),
            [
                'full_name'=>'required',
                'email' => 'required',
                'password'=>'required',
                'user_type'=>'required'

            ]
        );

        if ($validator->fails())
        {
            $messages = $validator->messages();
            return response()->json(['success'=>'0','message'=>$messages->first()]);
        }


        $user = $this->user->create($request->all());

        // not success because have email
        if($user=="exist_email"){
            return response()->json(["success"=>0,'message'=>'This email address have already.']);
        }

        // register success
        if($user !=null ){
            return response()->json(["success"=>1]);
        }

        return response()->json(["success"=>0,'email'=>""]);
    }


    ## Update rider location when login success
    public function updateUser(AndroidManageUser $request) {


      /*  $google_gcm = new GCM();
        $google_push = new Push();

        $google_push->setTitle("this is title");
        $google_push->setFlag(1);
        $google_push->setData(['data'=>'user object']);

        $id = ['cxyfERS_oQw:APA91bGPnobEQgPU9TO8DGSoJC75ab6B3v9b6aH6-2j7K-xjZs13aCfipdvWg_Ffecv2FsNUphgwLPSSCPxct-t1Bojup5BeMW4S9N9_AY-NTV9PoPF5mdnVL5b7yzIrLptiGYClCTLT'];

        $google_gcm->sendMultiple($id,$google_push->getPush());*/


        $this->user->update($request->all());

        return response()->json(["success"=>1]);

    }


    public function logOut(AndroidManageUser $request){

        $gcm = $this->user->logOut($request->all());

        return response()->json(["success"=>1]);
    }



    public function createOrUpdateApp(AndroidManageUser $request) {
        dd('working..');
    }


    public function UserUpdateAvailable(AndroidManageUser $request) {
        $user = $this->user->UserUpdateAvailable($request->all());
        return response()->json(["success"=>1,'user'=> $user]);
    }


    public function markerList(AndroidManageUser $request) {

        $users = $this->user->markerList($request->all());
        $result = 0;

        if($users !=null){
            $result = 1;
        }

        return response()->json(["success"=>$result,"users"=>$users]);
    }


    public function getProfile(AndroidManageUser $request) {
        $user = $this->user->getProfile($request->all());
        $result = 0;

        if($user !=null){
            $result = 1;
        }

        return response()->json(["success"=>$result,"user"=>$user]);
    }

    public function updateProfile(AndroidManageUser $request) {

        $user = $this->user->updateProfile($request->all());
        $result = 0;

        if($user !=null){
            $result = 1;
        }

        return response()->json(["success"=>$result,"user"=>$user]);
    }





}