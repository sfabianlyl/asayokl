<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Form;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Registration;
use App\Models\User;
use App\Mail\RegistrationMail;
use App\Helpers\GoogleSheetConnection;
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
        $user=auth()->user()->with("nyalakan_participants")->get();
        return view("nyalakan.form")->with(compact(
            "user"
        ));;
        
    }

    public function login_form(Request $request){
        //check if logged in, 
        //if no, return log in form, else, redirect registration form
        if(Auth::check()) return redirect()->route("nyalakan.registration.form");

        return view("nyalakan.login");
    }

    public function check_username(Request $request){
        //AJAX?
        //check if username exists and first time log in? 
        //create password, else ask for password

        $user=User::where("username",$request->username)->get();
        $status=["username"=>(bool)$user, "first_logged_in"=>(bool)$user->first_logged_in];
        return response()->json($status);
    }

    public function create_password(Request $request){
        //create password
        $user=User::where("username",$request->username)->get();
        if($user->first_logged_in) return response()->json(["status"=>"create password unsuccessful."]);
        $user->password=Hash::make($request->new_password);
        $user->save();

        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->route("nyalakan.registration.form");

    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route("nyalakan.registration.form");
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        
    }
    public function submit(Request $request){
        //save form, AJAX
    }

    
}
