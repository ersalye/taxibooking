<?php

namespace App\Http\Controllers\Android;


use App\Http\Controllers\Controller;
use App\Http\Requests\AndroidManageUser;

use App\Repositories\Android\GCM\GCMRepositoryContract;


class GCMController extends Controller {

    protected  $gcm_user;

    public function __construct(GCMRepositoryContract $GCMRepositoryContract)
    {

        $this->gcm_user = $GCMRepositoryContract;

    }

    public function store(AndroidManageUser $request) {


        $this->gcm_user->create($request->all());



    }




}