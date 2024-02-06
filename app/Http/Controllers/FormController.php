<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Form;
use Illuminate\Support\Facades\Log;
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
        $form=Form::where("id",$request->formID)->first();
        $fields=json_decode($form->fields,true);
        $conn->connect($form->google_sheet_url, $form->google_sheet_sheet_name);

        if(!$conn->count_rows()){
            $headers=["No"];
            $fields=json_decode($form->fields,true);
            if(isset($fields["nationality"])) $headers[]="Nationality";
            if(isset($fields["name"])) {$headers[]="Name";$headers[]="Baptismal Name";}
            if(isset($fields["identification"])) $headers[]="IC/Passport";
            if(isset($fields["year-of-birth"])) $headers[]="Date of Birth";
            if(isset($fields["age"])) $headers[]="Age Range";
            if(isset($fields["gender"])) $headers[]="Gender";
            if(isset($fields["email"])) $headers[]="Email";
            if(isset($fields["phone"])) $headers[]="Phone";
            if(isset($fields["diocese"])) $headers[]="Diocese";
            if(isset($fields["parish-full"])) $headers[]="Parish";
            if(isset($fields["tshirt"])) $headers[]="T-shirt Size";
            if(isset($fields["allergy"])) $headers[]="Allergy/Medical Info";
            if(isset($fields["diet"])) $headers[]="Dietary Requirements";
            if(isset($fields["transportation"])) $headers[]="Transportation";
            if(isset($fields["vaccination_status"])) $headers[]="Vaccination Status";
            if(isset($fields["parent_info"])) {$headers[]="Parent/Guardian/Emergency Name"; $headers[]="Relationship";$headers[]="Parent/Guardian/Emergency Contact";}
            if(isset($fields["proof_of_payment"])) $headers[]="Payment";
            $headers[]="Timestamp";
            $conn->add($headers,$timestamp=false, $count=false);
        }
        if(isset($fields["proof_of_payment"])){
            $imgExt=["jpg","tiff","png","raw","pdf","jpeg","gif","heic"];
            foreach($imgExt as $ext) $imgExt[]=strtoupper($ext);
            if($request->hasFile("payment")) 
            if($request->payment->isValid()) 
            if($this->strposa($request->payment->extension(),$imgExt)!==false)
            $payment_file=$request->payment->store("payments","public");
        }

        $add=[];
        if(isset($fields["nationality"])) $add[]=$request->nationality;
        if(isset($fields["name"])) {$add[]=$request->name; $add[]=$request->baptismal_name;}
        if(isset($fields["identification"])) $add[]=$request->ic;
        if(isset($fields["year-of-birth"])) $add[]=$request->year_of_birth;
        if(isset($fields["age"])) $add[]=$request->age;
        if(isset($fields["gender"])) $add[]=$request->gender;
        if(isset($fields["email"])) $add[]=$request->email;
        if(isset($fields["phone"])) $add[]=$this->phone($request->phone);
        if(isset($fields["diocese"])) $add[]=$request->diocese;
        if(isset($fields["parish-full"])) $add[]=$request->parish;
        if(isset($fields["tshirt"])) $add[]=$request->size;
        if(isset($fields["allergy"])) $add[]=$request->allergy;
        if(isset($fields["diet"])) $add[]=$request->diet;
        if(isset($fields["transportation"])) $add[]=$request->transportation;
        if(isset($fields["vaccination_status"])) $add[]=$request->vaccination;
        if(isset($fields["parent_info"])) {$add[]=$request->emergency_name; $add[]=$request->emergency_relationship; $add[]=$request->emergency_contact;}
        if(isset($fields["proof_of_payment"])) $add[]= isset($payment_file)? asset("storage/$payment_file") : "invalid upload";
        $conn->add($add);

        $registrationArray=["form_id"=>$form->id];
        $other_details=[];
        if(isset($fields["nationality"])) $registrationArray["nationality"]=$request->nationality;
        if(isset($fields["name"])) {$registrationArray["name"]=$request->name; $other_details["baptismal_name"]=$request->baptismal_name;}
        if(isset($fields["year-of-birth"])) $other_details["year_of_birth"]=$request->year_of_birth;
        if(isset($fields["age"])) $registrationArray["age"]=$request->age;
        if(isset($fields["gender"])) $registrationArray["gender"]=$request->gender;
        if(isset($fields["email"])) $registrationArray["email"]=$request->email;
        if(isset($fields["phone"])) $registrationArray["phone"]=$this->phone($request->phone);
        if(isset($fields["diocese"])) $registrationArray["diocese"]=$request->diocese;
        if(isset($fields["parish-full"])) $registrationArray["parish"]=$request->parish;
        if(isset($fields["vaccination_status"])) $registrationArray["vaccination"]=$request->vaccination;
        if(isset($fields["proof_of_payment"])) $registrationArray["payment"]= $payment_file ?? "invalid upload";
        if(isset($fields["identification"])) $other_details["identification"]=$request->ic;
        if(isset($fields["allergy"])) $other_details["allergy"]=$request->allergy;
        if(isset($fields["diet"])) $other_details["diet"]=$request->diet;
        if(isset($fields["tshirt"])) $other_details["size"]=$request->size;
        if(isset($fields["parent_info"])) $other_details["parent_info"]=[
            "name"=>$request->emergency_name,
            "relationship"=>$request->emergency_relationship,
            "contact"=>$request->emergency_contact,
        ];
        if(isset($fields["transportation"])) $other_details["transportation"]=$request->transportation;
        $registrationArray["other_details"]=json_encode($other_details);
        $registration=Registration::create($registrationArray);

       
        $header="Thank You for Registering!";
        $main_message=$form->email_body;
        
        $content=["Program (Programme)"=>$form->title];
        if(isset($fields["name"])) $content["Nama (Name)"]=$request->name;
        if(isset($fields["phone"])) $content["No. Telefon (Mobile No.)"]=$request->phone;
        if(isset($fields["email"])) $content["E-mel (Email)"]=$request->email;

        
        if($form->email_to) $emails=array_map('trim',explode(",",$form->email_to));
        if($form->email_applicant) $emails[]=$request->email;
        if(!empty($emails))

        Mail::to($emails)->send(new RegistrationMail($form->title, $header, $main_message, $content));
        
        return redirect("/forms/$form->url")->with([
            'modal'    => $form->response,
            'title'    => "Successful!"
        ]);
        
    }
}
