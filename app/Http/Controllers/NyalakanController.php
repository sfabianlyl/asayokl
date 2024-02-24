<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Form;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\User;
use App\Mail\RegistrationMail;
use App\Helpers\GoogleSheetConnection;
use App\Models\NyalakanParticipant;
use App\Models\NyalakanWeekend;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class NyalakanController extends BaseController
{
    public function phone($phone){
        if(!$phone) return ""; 
        return ($phone[0]=="+")? $phone: "+6$phone";
    }

    public function strposa($str, $needs){
        foreach($needs as $need){
            if(strpos($str, $need)!==false) return true;
        }
        return false;
    }

    public function registration_form(Request $request){
        //check if logged in, 
        //if no, redirect log in form, else return registration form
        if(!Auth::check()) return redirect()->route("nyalakan.login.form");
        if(auth()->user()->role_id!=4){
            Auth::logout();
            return redirect()->route("nyalakan.login.form");
        }
        $user=User::where("id",auth()->user()->id)->with("district.parishes")->first();
        $weekends=NyalakanWeekend::get();
        // $parishes=$user->district->parishes;
        return view("nyalakan.form")->with(compact(
            "user",
            'weekends'
        ));
        
    }

    public function login_form(Request $request){
        //check if logged in, 
        //if no, return log in form, else, redirect registration form
        if(!Auth::check()) return view("nyalakan.login");
        if(auth()->user()->role_id!=4){
            Auth::logout();
            return view("nyalakan.login");
        }
        return redirect()->route("nyalakan.registration.form");
        
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route("nyalakan.login.form");
    }

    public function check_email(Request $request){
        //AJAX?
        //check if username exists and first time log in? 
        //create password, else ask for password

        $user=User::where("email",$request->email)->first();
        // return response()->json($user);
        $status=["email"=>(bool)$user&&($user->role_id==4), "first_logged_in"=>(bool)$user->first_logged_in];
        return response()->json($status);
    }

    public function create_password(Request $request){
        //create password
        $user=User::where("email",$request->email)->first();
        if($user->first_logged_in) return response()->json(["status"=>"create password unsuccessful."]);
        $user->password=Hash::make($request->new_password);
        $user->first_logged_in=Carbon::now();
        $user->save();

        //create 10 participants for each weekend.

        foreach(NyalakanWeekend::get() as $weekend){
            for($i=0;$i<10;$i++){
                $temp = NyalakanParticipant::create([
                    'weekend_id' => $weekend->id,
                    'senator_id' => $user->id
                ]);
            }
        }
        
        
 
        if (Auth::attempt(["email"=>$request->email, "password"=>$request->new_password],isset($request->remember))) {
            $request->session()->regenerate();
 
            return redirect()->route("nyalakan.registration.form");
        }

        
        return redirect()->route("nyalakan.login.form");

    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials,isset($request->remember))) {
            $request->session()->regenerate();
 
            return redirect()->route("nyalakan.registration.form");
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        
    }
    public function submit(Request $request){
        //save form, AJAX

        $participants=$request->participant;
        foreach($participants as $weekend_id=>$weekend){
            foreach($weekend as $no=>$participant){
                $id=$participant["id"];
                $temp=$participant;
                unset($temp["id"]);
                NyalakanParticipant::where("id",$id)->update($temp);
            }
        }

        return response()->json(["status"=>"success"]);
    }

    
}
