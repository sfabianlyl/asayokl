<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Event;
use App\Models\Team;
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

        $bmDeadline=strtotime("17th April 2022");
        $engDeadline=strtotime("12:01am 6th June 2022");
        $mandDeadline=strtotime("24th May 2022");
        $tamilDeadline=strtotime("12:00pm 7th May 2022");
        
        $curtime=time();
        

        return view("forms.kami.kudus")->with(compact(
            "eng",
            "bm",
            "mand",
            "tamil",
            "bmDeadline",
            "engDeadline",
            "mandDeadline",
            "tamilDeadline",
            "curtime"
        ));
    }

    public function team(){
        $archbishop=Team::where("role","Archbishop of Kuala Lumpur")->first();
        $director=Team::where("role","Director / Ecclesiastical Assistant")->first();
        $assistant_director=Team::where("role","Assistant Director / Ecclesiastical Assistant")->first();
        $admin=Team::where("role","Admin")->first();
        $staffs=Team::where("role","Youth Pastoral Workers")->orderBy("name")->get();

        return view("contents.team")->with(compact(
            "archbishop",
            "director",
            "assistant_director",
            "admin",
            "staffs",
        ));
    }
}
