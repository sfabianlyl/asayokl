<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckinMail;
use App\Helpers\GoogleSheetConnection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CheckinController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function phone($phone){
        return ($phone[0]=="+")? $phone: "+6$phone";
    }

    public function checkin_self(Request $request){
        $conn=new GoogleSheetConnection();
        
        
        $phone=phone($request->mobile);
        $timestamp=date("d/m/Y h:i:s A");
        $conn->connect("13QAI_yr0k7R_ZJv-Ak9bgf4VANvkMMhHkCXXcsTUYQ0", $lang);

        switch($request->input("originState.0","")){
            case "Selangor":
            case "Kuala Lumpur": $district="Undefined"; break;
            case "Pahang":
            case "Terengganu": $district="PT"; break;
            case "Negeri Sembilan": $district="NS"; break;
            case "Putrajaya": $district="KLS"; break;
            default: $district="Non ArchKL";
        }
        switch($request->input("migrateState.0","")){
            case "Selangor":
            case "Kuala Lumpur": $migrateDistrict="Undefined"; break;
            case "Pahang":
            case "Terengganu": $migrateDistrict="PT"; break;
            case "Negeri Sembilan": $migrateDistrict="NS"; break;
            case "Putrajaya": $migrateDistrict="KLS"; break;
            default: $migrateDistrict="Non ArchKL";
        }
        
        $conn->add([
            $migrateDistrict,
            $request->input("nationality","Malaysian Citizen"),
            $request->input("age",""),
            $request->input("name",""),
            $request->input("IC",""),
            $phone,
            $request->input("email",""),
            $request->input("baptism",false)? "Yes":"No",
            $request->input("confirmation",false)? "Yes":"No",
            $request->input("eucharist",false)? "Yes":"No",
            $request->input("originCountry","Malaysia"),
            $request->input("originState.0","Undefined"),
            $request->input("originDiocese.0","Undefined"),
            $district,
            $request->input("originParish.0","Undefined"),
            $request->input("migrateCountry","Malaysia"),
            $request->input("migrateDiocese.0","Keuskupan Agung Kuala Lumpur"),
            $request->input("migrateParish.0",""),
            $request->input("campus",""),
            $request->input("field",""),
            $request->input("organisation",""),
            $request->input("occupation",""),
            $request->input("status",""),
            $timestamp,
            implode(", ",$request->input("assist",[])),

        ], $timestamp=false);
        
        $content=[
            "Nationality"=>$request->nationaility,
            "Nama"=>$request->name,
            "Identification No"=>$request->IC,
            "Mobile No"=>$phone,
            "Email"=>$request->email,
            "Baptism"=>,
            "Confirmation"=>,
            "Eucharist"=>,
            "From Country"=>,
            "From State"=>,
            "From Diocese"=>,
            "From Parish"=>,
            "Migrate Country"=>,
            "Migrate State"=>,
            "Migrate Diocese"=>,
            "Migrate District"=>,
            "Migrate Parish"=>,
            
        ];
        if(){
            $content["Institution"]=;
            $content["Field of Study"]=;
        }
        else{
            $content["Organization"]=;
            $content["Occupation"]=;
        }
        
        $content["Marital Status"]=;
        $content["Assistance Required"]=;
        
        
        Mail::to($request->email)->send(new CheckinMail($content));

        return redirect()->route("hangout.registration.form")->with([
            'modal'    => "Your registration is successful. We will reach out to you soon.",
            'title'    => "Successful!"
        ]);
    }
    
    

   
}
