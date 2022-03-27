<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use App\Helpers\GoogleSheetConnection;
// use App\Helpers\GoogleDriveConnection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class RegistrationController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function phone($phone){
        if(!$phone) return ""; 
        return ($phone[0]=="+")? $phone: "+6$phone";
    }
    
    public function hangout(Request $request){
        $conn=new GoogleSheetConnection();
        
        $languages=$request->language;
        $phone=$this->phone($request->phone);
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
            ], $timestamp=false);
            
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
        
        Mail::to($request->email)->send(new RegistrationMail($subject, $header, $main_message, $content));
        
        return redirect()->route("hangout.registration.form")->with([
            'modal'    => "Your registration is successful. Please check your email for further instructions.",
            'title'    => "Successful!"
        ]);
        
    }

    public function ciptass(Request $request){
        $conn=new GoogleSheetConnection();
        switch($request->location){
            case "Terengganu": $id ='12M31szNdtaF5HlWbq55ShMPvboc311p8lNwARtzpTHE'; break;
            case "Cheras": $id ='1wilFbTxNNuPPxvMxRGyDT1Xl0QY5bBR8td2Lkjp7xh0'; break;
            default: return redirect()->route("ciptass.registration.form")->with([
                'modal'    => implode("<br>",[
                    "Error in registration",
                    "Please select a valid location"
                ]),
                'title'    => "Error"
            ]);
        }

        $conn->connect($id, "Registration");
        $conn->add([
            $request->nationality,
            $request->name,
            $request->age,
            $request->gender,
            $this->phone($request->phone),
            $request->email,
            $request->homeState,
            $request->uniState,
            $request->uniName,
            $request->course
        ]);
        
        $subject="CIPTASS ASAYOKL"; 
        $header="Thank You for Registering!";
        $main_message=implode("<br>",[
            "Terima Kasih atas pendaftaran anda.  anda akan diberitahu melalui e-mel atau WhatsApp mengenai Aktiviti dan perjumpaan Pelajar IPTA / IPTS Katolik yang dihoskan ASAYOKL (ArchKL).",
            "Jika anda memerlukan bantuan iringan pastoral yang lain, jangan ragu-ragu untuk menghubungi nama-nama di bawah.",
            "<i>Thank you for registering. you will be notified  via email or WhatsApp about Catholic IPTA/IPTS Students Activities and gatherings hosted ASAYOKL (ArchKL).</i>",
            "<i>If you are in need of any other pastoral accompaniment assistance please do not hesitate to contact the names below.</i>",
        ]);

        $outro_message=implode("",[
            "<h4>ASAYOKL (Archdiocese of Kuala Lumpur)</h4>",
            "<p>Selangor<br>Fabian Lee<br><a href='mailto:fabian@asayokl.my'>fabian@asayokl.my</a></p>",
            "<p>Pahang<br>Gregory Pravin Rajah<br><a href='mailto:gregpravin@asayokl.my'>gregpravin@asayokl.my</a></p>",
            "<p>Negeri Sembilan<br>Fabian Lee<br><a href='mailto:fabian@asayokl.my'>fabian@asayokl.my</a></p>",
            "<p>Wilayah Persekutuan Kuala Lumpur<br>Gregory Pravin Rajah<br><a href='mailto:gregpravin@asayokl.my'>gregpravin@asayokl.my</a></p>",
            "<p>Terengganu<br>Fabian Lee<br><a href='mailto:fabian@asayokl.my'>fabian@asayokl.my</a></p>",
            "<h4>PDYN (Diocese of Penang)</h4>",
            "<p>Perlis<br>Kedah<br>Kelantan<br>Pulau Pinang<br>Perak</p>",
            "<p>Jason Tioh<br><a href='mailto:jasontioh@gmail.com'>jasontioh@gmail.com</a><br>+6010-5364138</p>",
            "<h4>MJDYPN (Diocese of Melaka-Johor)</h4>",
            "<p>Melaka<br>Karen Chan<br><a href='mailto:karenchan@mjdiocese.my'>karenchan@mjdiocese.my</a></p>",
            "<p>Johor<br>Aloysius Irenaeus<br><a href='mailto:aloysius@mjdiocese.my'>aloysius@mjdiocese.my</a></p>",
        ]);
        
            
        
        Mail::to($request->email)->send(new RegistrationMail($subject= $subject, $main_heading=$header, $intro_message= $main_message, $content=[], $outro_message=$outro_message));

        return redirect()->route("ciptass.registration.form")->with([
            'modal'    => implode("<br>",[
                "Thank you for registering!",
                "We will contact you as soon as possible.",
                "Please check your email for a summary of your registration."
            ]),
            'title'    => "Successful!"
        ]);
    }

    public function cyan(Request $request){
        $conn=new GoogleSheetConnection();
        switch($request->location){
            case "KL": $id ='1g0bAIEOQjh-3WYV0Dud_lDgEkJyQKL1-ADJ2yKHagGE'; break;
            case "Tamil": $id='1nb-kxh2NR5q73aRG3w6ZNZowHpsHreYB9N7f3qemQnI'; break;
            default: return redirect()->route("cyan.registration.form")->with([
                'modal'    => implode("<br>",[
                    "Error in registration",
                    "Please select a valid network"
                ]),
                'title'    => "Error"
            ]);
        }

        $conn->connect($id, "Registration");
        $conn->add([
            $request->location,
            $request->name,
            $request->age,
            $request->gender,
            $request->nationality,
            $request->email,
            $this->phone($request->phone),
            $request->parishes,
            $request->talents
        ]);
        
        $subject="Catholic Young Adult Network ASAYOKL"; 
        $header="Thank You for Registering!";
        $main_message=implode("<br>",[
            "Terima kasih atas pendaftaran anda. Kami akan menghubungi anda melalui e-mel atau telefon (Whatsapp).",
            "<i>[Thank you for your registration. We will contact you via email or phone (Whatsapp).]</i>",
        ]);
        $content=[
            "Network"=> $request->location,
            "Nama (Name): "=>$request->name,
            "Tahun Lahir (Year of Birth): "=>$request->age,
            "Jantina (Gender): "=>$request->gender,
            "Kewarganegaraan (Nationality): "=>$request->nationality,
            "No. Telefon (Mobile No.): "=> $this->phone($request->phone),
            "E-mel (Email): "=>$request->email,
        ];

        $outro_message=implode("",[
            "In the meantime, do join our <a href='https://t.me/asayoklcyan' target='_blank'>Telegram Channel</a> to receive updates on our monthly gatherings.",
        ]);
        
            
        
        Mail::to($request->email)->send(new RegistrationMail($subject= $subject, $main_heading=$header, $intro_message= $main_message, $content=$content, $outro_message=$outro_message));

        return redirect()->route("cyan.registration.form")->with([
            'modal'    => implode("<br>",[
                "Thank you for registering!",
                "We will contact you as soon as possible.",
                "Please check your email for a summary of your registration."
            ]),
            'title'    => "Successful!"
        ]);
    }

    public function s2s(Request $request){
        $conn=new GoogleSheetConnection();
        $id="1iAr2N-y7aAwWLZHPibwq8f5S4dg2tAoGOz7s0HDgD4Q";
        [$language,$date]=explode(" ",$request->choice);
        
        $conn->connect($id, $language);
        $conn->add([
            $request->date,
            $request->name,
            $request->age,
            $request->gender,
            $request->nationality,
            $request->email,
            $this->phone($request->phone),
            $request->parish,
            $request->diocese
        ]);
        
        $subject="Sinners 2 Saints Online Session"; 
        $header="Thank You for Registering!";
        $main_message=implode("<br>",[
            "Terima kasih atas pendaftaran anda. Kami akan menghubungi anda melalui e-mel atau telefon (Whatsapp).",
            "<i>[Thank you for your registration. We will contact you via email or phone (Whatsapp).]</i>",
        ]);
        $content=[
            "Nama (Name): "=>$request->name,
            "Umur (Age): "=>$request->age,
            "Jantina (Gender): "=>$request->gender,
            "Kewarganegaraan (Nationality): "=>$request->nationality,
            "No. Telefon (Mobile No.): "=> $this->phone($request->phone),
            "E-mel (Email): "=>$request->email,
        ];

        
        
            
        
        Mail::to($request->email)->send(new RegistrationMail($subject= $subject, $main_heading=$header, $intro_message= $main_message, $content=$content, $outro_message=""));

        return redirect()->route("s2s.registration.form")->with([
            'modal'    => implode("<br>",[
                "Thank you for registering!",
                "We will contact you as soon as possible.",
                "Please check your email for a summary of your registration."
            ]),
            'title'    => "Successful!"
        ]);
    }

    public function lnl(Request $request){
        $conn=new GoogleSheetConnection();
        $id="1tap9FsnY7SljTH0ppzwG9RPAkuKVtVkY49GdSvlBWLM";
        [$language,$date]=explode(" ",$request->choice);
        
        $conn->connect($id,"Registration");
        $conn->add([
            $request->lnlDate,
            $request->name,
            $request->age,
            $request->gender,
            $request->nationality,
            $request->email,
            $this->phone($request->phone),
            $request->parish,
            $request->diocese
        ]);
        
        $subject="Love&Life Get Together ASAYOKL"; 
        $header="Thank You for Registering!";
        $main_message=implode("<br>",[
            "Terima kasih atas pendaftaran anda. Kami akan menghubungi anda melalui e-mel atau telefon (Whatsapp).",
            "<i>[Thank you for your registration. We will contact you via email or phone (Whatsapp).]</i>",
        ]);
        $content=[
            "Nama (Name): "=>$request->name,
            "Umur (Age): "=>$request->age,
            "Jantina (Gender): "=>$request->gender,
            "Kewarganegaraan (Nationality): "=>$request->nationality,
            "No. Telefon (Mobile No.): "=> $this->phone($request->phone),
            "E-mel (Email): "=>$request->email,
        ];

        
        
            
        
        Mail::to($request->email)->send(new RegistrationMail($subject= $subject, $main_heading=$header, $intro_message= $main_message, $content=$content, $outro_message=""));

        return redirect()->route("lnl.registration.form")->with([
            'modal'    => implode("<br>",[
                "Thank you for registering!",
                "We will contact you as soon as possible.",
                "Please check your email for a summary of your registration."
            ]),
            'title'    => "Successful!"
        ]);
    }

    public function kamikudus(Request $request){
        $sheet=new GoogleSheetConnection();
        $sheet_id="1tap9FsnY7SljTH0ppzwG9RPAkuKVtVkY49GdSvlBWLM";
        
        $sheet->connect($sheet_id,$request->language);
        


        $imgExt=["jpg","tiff","png","raw","pdf","jpeg","gif","heic"];
        foreach($imgExt as $ext) $imgExt[]=strtoupper($ext);
        if($request->hasFile("payment")) 
        if($request->payment->isValid()) 
        if($this->strposa($request->payment->extension(),$imgExt)!==false)
        $payment_filename="Kami_KUDUS".$request->name."-payment".".".$request->payment->extension();
        $payment_file=$request->payment->storeAs("payments",$payment_filename);

        $sheet->add([
            $request->name,
            $request->ic,
            $request->age,
            $request->gender,
            $request->nationality,
            $request->email,
            $this->phone($request->phone),
            $request->parish,
            $request->diocese,
            $request->transportation,
            $request->input("allergy","N/A"),
            $request->vaccination_status,
            $payment_file
        ]);

        $event_id=Event::where("name", "K.A.M.I Kudus ".$request->language)->first()->id;

        $registration=Registration::create([
            "event_id"=>$event_id,
            "name"=>$request->name,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "nationality"=>$request->nationality,
            "email"=>$request->email,
            "phone"=> $this->phone($request->phone),
            "diocese"=>$request->diocese,
            "parish"=>$request->parish,
            "payment"=>$request->payment,
            "vaccination"=>$request->vaccination,
            "other_details"=>json_encode([
                "transportation"=>$request->transportation,
                "allergy"=>$request->input("allergy","N/A"),
                "identification"=>$request->ic
            ]),

        ]);

        $header="Thank You for Registering!";

        $main_message=implode("",[
            "<p>Hooray! You have completed your registration for K.A.M.I. Kudus - Close Contact with Jesus. We will verify your registration and will send you a follow-up email about K.A.M.I. Kudus via <a href='mailto:kamikudus@asayokl.my'>kamikudus@asayokl.my</a></p>",
            "<p>Do ensure your information below is correct. Any clarification or enquire, you may contact via <a href='mailto:kamikudus@asayokl.my'>kamikudus@asayokl.my</a> or whatsapp us at <a href='https://wa.me/60185903889' target='_blank'>+60185903889</a></p>",
        ]);

        switch($request->language){
            case "BM":$session="BM (30/04/2022 - 01/05/2022)"; break;
            case "Tamil":$session="Tamil (14/05/2022 - 15/05/2022)"; break;
            case "Mandarin":$session="Mandarin (28/09/2022 - 29/05/2022)"; break;
            case "English":$session="English (11/06/2022 - 12/06/2022)"; break;
        }

        $content=[
            "Sesi (Session)"=>$session,
            "Nama (Name)"=>$request->name,
            "No. Kad Pengenalan / Pasport (IC / Passport Number)"=>$request->ic,
            "No. Telefon (Mobile No.)"=>$this->phone($request->phone),
            "E-mel (Email)"=>$request->email,
            "Perlukan Pengangkutan (Need Transportation)"=>$request->transportation
        ];

        Mail::to($request->email)->send(new RegistrationMail($subject= "K.A.M.I Kudus Registration", $main_heading=$header, $intro_message= $main_message, $content=$content, $outro_message=""));

        return redirect()->route("kami.kudus.registration.form")->with([
            'modal'    => implode("<br>",[
                "Thank you for registering for K.A.M.I. Kudus - Close Contact with Jesus.",
                "Do ensure you have received a reply email (check your spam / junk folder) about your registration."
            ]),
            'title'    => "Successful!"
        ]);
    }
}
