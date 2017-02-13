<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'test' => 'it works hard.',
        ]);


        javascript()->put([
            'test1'=>'second working..'
        ]);


        return view('frontend.index');
    }

    public function about(){
        return view("frontend.about");
    }
    public function contact(){
        return view("frontend.contact");
    }
    public function weDo(){
        return view("frontend.wedo");
    }
    public function service(){
        return view("frontend.service");
    }

}
