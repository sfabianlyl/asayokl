<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use App\Helpers\GoogleSheetConnection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class RegistrationController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function hangout(Request $request){
        $conn=new GoogleSheetConnection();
        
        $languages=$request->language;
        $phone=($request->phone[0]=="+")? $request->phone: "+6".$request->phone;
        foreach($languages as $language){
            
            $parts=explode(" ",$language);
            $date=array_pop($parts);
            $lang=implode(" ",$parts);
            $conn->connect("1_3eQTaT0dk4oDxn_gmT0V5Es2MHdrHi1pkm0s11fK3U", $lang);
            $conn->add([
                $date,
                $request->nationality,
                $request->name,
                $request->age,
                $request->gender,
                $request->email,
                $phone,
                $request->diocese,
                $request->parish
            ]);
            
            $temp=explode("@",$date);
            $datePart=explode("/",$temp[0]);
            $day=$datePart[0];
            $month=$datePart[1];
            $str=date("d/m/Y - g:ia",strtotime("$month/$day 8.45pm"));
            $sessions[]="$lang @ $str";
        }
        if(isset($sessions)){
            $subject="Online Hangout with ASAYOKL"; 
            $header="Thank You for Registering!";
            $main_message="Terima kasih atas pendaftaran anda. Kami akan menghubungi anda melalui e-mel atau telefon (Whatsapp) untuk kod mesyuarat **2 jam sebelum kita mulakan. Dalam masa yang sama, anda boleh:";
            $main_message.="<br>[Thank you for your registration. We will contact you via email or phone (Whatsapp) for meeting code **2 hours before we start. In the meantime, you can]:<";
            
            $content=[
                "Sesi (Session)"=>$sessions,
                "Nama (Name)"=>$request->name,
                "No. Telefon (Mobile No.)"=>$phone,
                "E-mel (Email)"=>$request->email
            ];
            
        }
        
        Mail::to($request->email)->send(new RegistrationMail($subject, $header, $main_message, $content, ""));

        return redirect()->route("hangout.registration.form")->with([
            'modal'    => "Your registration is successful. Please check your email for further instructions.",
            'title'    => "Successful!"
        ]);
        
    }
}
