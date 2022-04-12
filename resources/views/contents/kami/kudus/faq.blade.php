@extends("layouts.master")

@section("title", "K.A.M.I Kudus FAQ")




@section("content")
    <div class="row justify-content-end">
        <div class="col-6 col-lg-3">
            <img src="{{asset("Images/kamikudus-logo.png")}}" alt="" class="w-100">
        </div>
    </div>
    <div class="mb-3">
        <h5><a href="{{route("kami.kudus.registration.form")}}">< Back</a></h5>
    </div>
    <h2>FAQ</h2>

    <h4>General Info:</h4>
    <ol>
        <li>
            What is <b>K.A.M.I. <span class="yellow">KUDUS</span></b>  - Close contact with Jesus?<br><br>
            <b>K.A.M.I. <span class="yellow">KUDUS</span></b> - Close contact with Jesus is a weekend renewal programme for young people ages from 18 to 39 years old by ASAYOKL. The Purpose of the programme is to provide space for young people to have the opportunity of a renewed encounter with Jesus and each other as a community of faith.
        </li>
        <li>
            Details of the <b>K.A.M.I. <span class="yellow">KUDUS</span></b> - Close contact with Jesus: <br><br>
            Dates:
            <ul>
                <li>30 April - 1 May 2022 (Bahasa)</li>
                <li>14 - 15 May 2022 (Tamil)</li>
                <li>28 - 29 May 2022 (Mandarin)</li>
                <li>11 - 12 June 2022 (English)</li>
            </ul>
            Venue: MBS Recreation & Training Centre, Kundang  <br>
            Minimum Donation: <br>
            <b>RM 65 per person (With Transport from pick-up point)</b> <br>
            <b>RM 55 per person (Without transportation)</b> <br>
            Places are limited to <b>100 pax</b> per language. 
        </li>
        <li>
            Who should and can attend?<br><br>
            <ul>
                <li>Any young person who is wanting an experience of faith with their peers</li>
                <li>Youth leaders and potential/future leaders</li>
                <li>Any young people wanting to explore their desire to serve and be in ministry. </li>
            </ul>
        </li>
        <li>
            Is transportation provided?<br><br>
            Yes. You will be notified of the pick-up and drop off points closer to the date. 
        </li>
        <li>
            Am I allowed to drive to the location on my own? <br><br>
            You are allowed to drive your own vehicle to MBS Recreation & Training Centre as there are plenty of parking spaces available. Do inform us and provide your car registration number if you are driving there. Participants will not be allowed to leave the premises before the end of the programme once they have checked in.
        </li>
        
    </ol>

    <h4>Registration:</h4>
    <ol>
        <li>
            When will the registration be closed? <br><br>
            The registration will be closed <b>2 weeks before each language programme begins</b> (eg: Registration for Bahasa will be closed on 17 April 2022). 
        </li>
        <li>   
            Can I register for more than one language? <br><br>
            We encourage you to register for <b>only one language</b> that you're comfortable with, and allow other young people to have the opportunity to join.
        </li>
        <li>    
            How do I know if my registration is confirmed and my spot for <b>K.A.M.I. <span class="yellow">KUDUS</span></b> secure? <br><br>
            You will receive a reply email of your confirmed registration with the chosen language (Do ensure you enter the correct email address when registering, and check your spam/junk folder if you don’t receive it).  Your spot is only secured once you have made the minimum contribution for your participation. You will receive another confirmation email with a list of things to bring and the programme itinerary.   
        </li>
        <li>   
            How can I make a contribution for the programme? <br><br>
            Contributions can be made to <b>ASAYO (Archdiocesan Single Adults and Youth Office)<br>
            Public Bank: 3180569004<br></b>
            You are required to upload the proof of transfer during registration. If you have any enquiries about the payment or are in need of assistance, feel free to contact us at <a href="mailto:{{config("contact.kamikudus")}}" target="_blank">{{config("contact.kamikudus")}}</a> or Whatsapp us at <a href="{{config("contact.whatsapp")}}" target="_blank" rel="noopener noreferrer">{{config("contact.phone")}}</a>.
        </li>
        <li>
            What if I can’t make the indicated contribution during registration? <br><br>
            You may make an initial contribution of RM20 and contact us at <a href="mailto:{{ config("contact.kamikudus") }}" target="_blank">{{ config("contact.kamikudus") }}</a> or Whatsapp us at <a href="{{ config("contact.whatsapp") }}" target="_blank" rel="noopener noreferrer">{{ config("contact.phone") }}</a> for further arrangements.

        </li>
        <li>
            What happens if I could not make it at the last minute for the programme (for personal or health reasons)? Would I be able to get the refund?<br><br>
            No refund is given, however you are allowed to find someone (of the same gender) to replace you . Please notify ASAYO KL at least <b>5 days</b> before the programme.  
        </li>
        
    </ol>

    <h4>Health Assessment and Safety</h4>

    <ol>
        <li>
            <b>Pre-Arrival Form</b><br><br>
            You will be required to fill up a Pre-Arrival Form before the programme begins to update the following; 
            <ul>
                <li>Updated MySejahtera's COVID-19 Risk Status & Vaccination Status
                    <div class="row">
                        <div class="col-12 col-lg-3 mb-3 order-lg-2">
                            <img src="{{asset("Images/vaccination_status_sample.jpg")}}" alt="" class="w-100">
                        </div>
                        <div class="col-12 col-lg-9 mb-3 order-lg-1">
                            <ul>
                                <li>Only MySejahtera's COVID-19 Risk Status with <b>Risiko Rendah (Low Risk - <span class="blue">blue</span>)</b> or <b>Kontak kasual (Casual contact - <span class="yellow">yellow</span>)</b> are allowed to join the programme and enter the premises on that day.</li>
                                <li>As long as your MySejahtera Status shows "<b>fully vaccinated</b>", you are allowed to participate in the programme.</li>
                            </ul>
                        </div>
                    </div>
                    
                </li>
                <li>
                    <div class="row">
                        <div class="col-12 col-lg-9 mb-3">
                            RTK test results 
                            <ul>
                                <li>You will be required to upload a photo of your RTK Self test results (not more than 48 hours prior to arrival). **It is one of the SOP requirements by the MBS Recreation and Training Centre. </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3 mb-3">
                            <img src="{{asset("Images/rtk-test.jpg")}}" alt="" class="w-100">
                        </div>
                    </div>
                    
                </li>
            </ul>

        </li>
        <li>
            What happens if I have COVID-19 few days before the programme or Close Contact with someone who is positive? <br><br>
            We pray that you are in good health and free from sickness always, especially the few days before the programme begins. In case of unforeseen circumstances, you are required to inform us immediately. During your registration, you are required to agree to the clause to not participate if you are projecting any symptoms of COVID-19 or close contact.
        </li>
    </ol>

    <div class="my-5">
        <h5><a href="{{route("kami.kudus.registration.form")}}">< Back</a></h5>
    </div>
@stop

@section("js")
    <script>
        $(function($) {

            var _oldShow = $.fn.show;

            $.fn.show = function(speed, oldCallback) {
            return $(this).each(function() {
                var obj         = $(this),
                    newCallback = function() {
                    if ($.isFunction(oldCallback)) {
                        oldCallback.apply(obj);
                    }
                    obj.trigger('afterShow');
                    };

                // you can trigger a before show if you want
                obj.trigger('beforeShow');

                // now use the old function to show the element passing the new callback
                _oldShow.apply(obj, [speed, newCallback]);
            });
            }
        });
        
    </script>
@stop

@section("css")
    <style>
        body{
            background-color:#F9F5E5 !important;
        }
        .container{    
            color:black !important;
        }
        .container a{
            color:rgb(0, 0, 131) !important;
        }
        .yellow{
            color: #f1c232!important;
        }
        .blue{
            color: #4a86e8!important;
        }

        .container :is(p,h2,h4,ul li, ol li, span, a){
            font-family:Montserrat !important;
        }
        ol>li{
            margin-bottom:1rem;
        }
        :is(ol,ul)>li>ul>li{
            margin-bottom:0;
        }
    </style>
@stop