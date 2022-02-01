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
            
        $subject="New Census Form"; 
        $header="Thank You for Registering!";
        $main_message="Terima kasih atas pendaftaran anda. Kami akan menghubungi anda melalui e-mel atau telefon (Whatsapp) untuk kod mesyuarat **2 jam sebelum kita mulakan. Dalam masa yang sama, anda boleh:";
        $main_message.="<br>[Thank you for your registration. We will contact you via email or phone (Whatsapp) for meeting code **2 hours before we start. In the meantime, you can]:<";
        
        $content=[
            "Sesi (Session)"=>$sessions,
            "Nama (Name)"=>$request->name,
            "No. Telefon (Mobile No.)"=>$phone,
            "E-mel (Email)"=>$request->email
        ];
        
        Mail::to($request->email)->send(new RegistrationMail($subject, $header, $main_message, $content));

        return redirect()->route("hangout.registration.form")->with([
            'modal'    => "Your registration is successful. Please check your email for further instructions.",
            'title'    => "Successful!"
        ]);
    }
    
    

   
}
