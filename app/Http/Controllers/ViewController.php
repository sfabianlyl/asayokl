<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ViewController extends BaseController
{
    

    public function kamikudus(Request $request){
        $eng=Event::where("name","K.A.M.I Kudus English")->with("registrations")->first();
        $bm=Event::where("name","K.A.M.I Kudus BM")->with("registrations")->first();
        $mand=Event::where("name","K.A.M.I Kudus Mandarin")->with("registrations")->first();
        $tamil=Event::where("name","K.A.M.I Kudus Tamil")->with("registrations")->first();

        
        

        return view("forms.kami.kudus")->with(compact(
            "eng",
            "bm",
            "mand",
            "tamil"
        ));
    }
}
