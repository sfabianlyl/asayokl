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
    public function strposa($str, $needs){
        foreach($needs as $need){
            if(strpos($str, $need)!==false) return true;
        }
        return false;
    }

    public function checkin_self(Request $request){
        $conn=new GoogleSheetConnection();
        
        
        $phone=$this->phone($request->mobile);
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
            "Nationality"=>$request->input("nationality","Malaysian Citizen"),
            "Nama"=>$request->input("name",""),
            "Identification No"=>$request->input("IC",""),
            "Mobile No"=>$phone,
            "Email"=>$request->input("email",""),
            "Baptism"=> $request->input("baptism",false)? "Yes":"No",
            "Confirmation"=> $request->input("confirmation",false)? "Yes":"No",
            "Eucharist"=> $request->input("eucharist",false)? "Yes":"No",
            "From Country"=> $request->input("originCountry","Malaysia"),
            "From State"=> $request->input("originState.0","Undefined"),
            "From Diocese"=> $request->input("originDiocese.0","Undefined"),
            "From Parish"=> $request->input("originParish.0","Undefined"),
            "Migrate Country"=> $request->input("migrateCountry","Malaysia"),
            "Migrate State"=> $request->input("migrateState.0","Undefined"),
            "Migrate Diocese"=> $request->input("migrateDiocese.0","Keuskupan Agung Kuala Lumpur"),
            "Migrate District"=> $migrateDistrict,
            "Migrate Parish"=> $request->input("migrateParish.0",""),
            
        ];
        if( $request->input("campus","")){
            $content["Institution"]= $request->input("campus","");
            $content["Field of Study"]= $request->input("field","");
        }
        else{
            $content["Organization"]= $request->input("organisation","");
            $content["Occupation"]= $request->input("occupation","");
        }
        
        $content["Marital Status"]= $request->input("status","");
        $content["Assistance Required"]= implode(", ",$request->input("assist",[]));
        
        $mail=Mail::cc("fabian@asayokl.my")->cc("josephine@asayokl.my");
        
    switch($request->input("originDiocese.0","Undefined")){
        case 'Keuskupan Agung Kuala Lumpur': 
            $mail=$mail->to('josephine@asayokl.my'); 
            break;

        case 'Keuskupan Pulau Pinang': 
            $mail=$mail->to('pdyn@pgdiocese.org'); 
            $mail=$mail->to('cmo.penang.diocese@gmail.com'); 
            break;

        case 'Keuskupan Agung Kuching': 
            $mail=$mail->to('kchadyouth.office@gmail.com'); 
            break;

        case 'Keuskupan Agung Kota Kinabalu': 
            $mail=$mail->to('dypt2007@gmail.com'); 
            break;

        case 'Keuskupan Melaka-Johor': 
            $mail=$mail->to('daryltan@majodi.org'); 
            $mail=$mail->to('mattwee@majodi.org'); 
            $mail=$mail->to('malaccajohorecc@gmail.com'); 
            break;

        case 'Keuskupan Miri': 
            $mail=$mail->to('genie.maylynn@gmail.com'); 
            break;

        case 'Keuskupan Sibu': 
            $mail=$mail->to('sibudioceseyouth@gmail.com'); 
            break;

        case 'Keuskupan Keningau': 
            $mail=$mail->to('kbkkgau@gmail.com'); 
            break;

        case 'Keuskupan Sandakan': 
            $mail=$mail->to('dyasdkn@gmail.com'); 
            break;

        default: break;
    }
    
    switch($request->input("migrateDiocese.0","Keuskupan Agung Kuala Lumpur")){
        case 'Keuskupan Agung Kuala Lumpur': 
            $mail=$mail->to('josephine@asayokl.my'); 
            break;

        case 'Keuskupan Pulau Pinang': 
            $mail=$mail->to('pdyn@pgdiocese.org'); 
            $mail=$mail->to('cmo.penang.diocese@gmail.com'); 
            break;

        case 'Keuskupan Agung Kuching': 
            $mail=$mail->to('kchadyouth.office@gmail.com'); 
            break;

        case 'Keuskupan Agung Kota Kinabalu': 
            $mail=$mail->to('dypt2007@gmail.com'); 
            break;

        case 'Keuskupan Melaka-Johor': 
            $mail=$mail->to('daryltan@majodi.org'); 
            $mail=$mail->to('mattwee@majodi.org'); 
            $mail=$mail->to('malaccajohorecc@gmail.com'); 
            break;

        case 'Keuskupan Miri': 
            $mail=$mail->to('genie.maylynn@gmail.com'); 
            break;

        case 'Keuskupan Sibu': 
            $mail=$mail->to('sibudioceseyouth@gmail.com'); 
            break;

        case 'Keuskupan Keningau': 
            $mail=$mail->to('kbkkgau@gmail.com'); 
            break;

        case 'Keuskupan Sandakan': 
            $mail=$mail->to('dyasdkn@gmail.com'); 
            break;

        default: break;
    }
        
        $baptismImg=false;
        $confirmationImg=false;
        $eucharistImg=false;
        $imgExt=["jpg","tiff","png","raw","pdf","jpeg","gif","heic"];
        
        foreach($imgExt as $ext) $imgExt[]=strtoupper($ext);
    
        if($request->hasFile("baptismImg")) 
        if($request->baptismImg->isValid()) 
        if($this->strposa($request->baptismImg->extension(),$imgExt)!==false)
        $baptismImg=$request->baptismImg->storeAs("checkin-uploads",$request->name."-baptism".".".$request->baptismImg->extension());
        
        if($request->hasFile("confirmationImg")) 
        if($request->confirmationImg->isValid()) 
        if($this->strposa($request->confirmationImg->extension(),$imgExt)!==false)
        $confirmationImg=$request->confirmationImg->storeAs("checkin-uploads",$request->name."-confirmation".".".$request->confirmationImg->extension());
        
        if($request->hasFile("eucharistImg")) 
        if($request->eucharistImg->isValid()) 
        if($this->strposa($request->eucharistImg->extension(),$imgExt)!==false)
        $eucharistImg=$request->eucharistImg->storeAs("checkin-uploads",$request->name."-eucharist".".".$request->eucharistImg->extension());
        
        
        $mail->send(new CheckinMail($content,$baptismImg,$confirmationImg,$eucharistImg));

        return redirect()->route("checkin")->with([
            'modal'    => "Your registration is successful. We will reach out to you soon.",
            'title'    => "Successful!"
        ]);
    }
    
    

   
}
