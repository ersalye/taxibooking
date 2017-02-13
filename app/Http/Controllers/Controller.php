<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
 class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;




    protected $type ="unknow";
    protected $success = false;
    protected $action  = "index";
    protected $data    =null;
    protected $url     = "unknow";
    protected $message ="unknow";
    protected  $query;
    protected $request;
     public function __construct(Request $request)
     {
         $this->request = $request;

     }




    protected function toJson(){

        $this->initJson();

        return response()->json(
            [
                "type"=>$this->type,
                "url"=>$this->url,
                "query"=>$this->query,
                "success"=>$this->success,
                "message"=>$this->message,
                "action"=>$this->action,
                "data"=>$this->data

            ]

        );

    }

     protected  function initJson(){
         $this->query = $this->request->all();


         if($this->request->has("id")){
             $this->message = $this->type." has id ".$this->request->get("id");
         }else {
             $this->message = $this->type." many missing  id";
         }




         $this->url = $this->request->url();
         $this->action = $this->request->segment(3);
     }






}