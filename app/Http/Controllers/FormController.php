<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Form;
use App\Models\Registration;
use App\Mail\RegistrationMail;
use App\Helpers\GoogleSheetConnection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FormController extends BaseController
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

    public function view_form(Request $request,$url){
        $form=Form::where("url",$url)->where("status","active")->first();
        
        if($form === null) abort(404);
        return view("forms.dynamic")->with(compact(
            "form"
        ));
    }

    public function submit_form(Request $request){
        $conn=new GoogleSheetConnection();
        $inputs=["nationality","name","identification","year-of-birth","age","gender","email","phone","diocese","parish-full","allergy","transportation","vaccination_status","payment_terms","proof_of_payment"];
        $fields=json_decode($form->fields,true);
        $form=Form::where("id",$request->formID)->first();
        $conn->connect($form->google_sheet_url, $form->google_sheet_sheet_name);

        if(!$conn->count_rows()){
            $headers=["No"];
            $fields=json_decode($form->fields,true);
            if(isset($fields["nationality"])) $headers[]="Nationality";
            if(isset($fields["name"])) $headers[]="Name";
            if(isset($fields["identification"])) $headers[]="IC/Passport";
            if(isset($fields["year-of-birth"])) $headers[]="Year of Birth";
            if(isset($fields["age"])) $headers[]="Age Range";
            if(isset($fields["gender"])) $headers[]="Gender";
            if(isset($fields["email"])) $headers[]="Email";
            if(isset($fields["phone"])) $headers[]="Phone";
            if(isset($fields["diocese"])) $headers[]="Diocese";
            if(isset($fields["parish-full"])) $headers[]="Parish";
            if(isset($fields["allergy"])) $headers[]="Allergy/Medical Info";
            if(isset($fields["transportation"])) $headers[]="Transportation";
            if(isset($fields["vaccination_status"])) $headers[]="Vaccination Status";
            if(isset($fields["proof_of_payment"])) $headers[]="Payment";
            $headers[]="Timestamp";
            $conn->add($headers,$timestamp=false, $count=false);
        }
        $add=[];
        if(isset($fields["nationality"])) $add[]=$request->nationality;
        if(isset($fields["name"])) $add[]=$request->name;
        if(isset($fields["identification"])) $add[]=$request->ic;
        if(isset($fields["year-of-birth"])) $add[]=$request->year_of_birth;
        if(isset($fields["age"])) $add[]=$request->age;
        if(isset($fields["gender"])) $add[]=$request->gender;
        if(isset($fields["email"])) $add[]=$request->email;
        if(isset($fields["phone"])) $add[]=$this->phone($request->phone);
        if(isset($fields["diocese"])) $add[]=$request->diocese;
        if(isset($fields["parish-full"])) $add[]=$request->parish;
        if(isset($fields["allergy"])) $add[]=$request->allergy;
        if(isset($fields["transportation"])) $add[]=$request->transportation;
        if(isset($fields["vaccination_status"])) $add[]=$request->vaccination;
        if(isset($fields["proof_of_payment"])) $add[]=$request->payment;
        $conn->add($add);

       
        $header="Thank You for Registering!";
        $main_message=$form->email_body;
        
        $content=["Program (Programme)"=>$form->title];
        if(isset($fields["name"])) $content["Nama (Name)"]=$request->name;
        if(isset($fields["phone"])) $content["No. Telefon (Mobile No.)"]=$this->phone($request->phone);
        if(isset($fields["email"])) $content["E-mel (Email)"]=$request->email;

        $emails=array_map('trim',explode(",",$form->email_to));
        if($form->email_applicant) $emails[]=$request->email;
        
        Mail::to($emails)->send(new RegistrationMail($form->title, $header, $main_message, $content));
        
        return redirect("/forms/$form->url")->with([
            'modal'    => $form->response,
            'title'    => "Successful!"
        ]);
        
    }
}
