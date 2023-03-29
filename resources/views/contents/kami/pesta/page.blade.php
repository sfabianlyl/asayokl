@extends("layouts.master")

@section("title", "K.A.M.I Kudus")


@section("content")
    <div style="min-height:60vh">
        <div class="row justify-content-center mb-5">
            <div class="col-8 col-lg-6">
                <img src="{{asset("Images/pesta-kami.png")}}" alt="Pesta K.A.M.I." class="w-100">
            </div>
        </div>
        <h3 class="text-center blue">What is Pesta K.A.M.I.?</h3>
        <p>Pesta K.A.M.I. ArchKL is the local World Youth Day celebration for young people in the Archdiocese of Kuala Lumpur. The World Youth Day (WYD) was initiated by St John Paul II in 1985.</p>
        <p>In the <a href="http://www.laityfamilylife.va/content/dam/laityfamilylife/Orientamenti/Guidelines.pdf" target="_blank" rel="noopener noreferrer">Pastoral Guidelines for the Celebration of World Youth Day in Particular Churches</a>, the “international celebrations of the event are generally held every three years in a different country each time with the participation of the Holy Father. The ordinary celebration of WYD, on the other hand, takes place every year in the particular Churches that undertake the organisation of the event.”</p>
        <p>In the past, the celebration of local WYD was held on Palm Sunday. In November 2020, the Holy Father, Pope Francis transferred local World Youth Day celebrations to the Sunday of the Solemnity of Christ the King.</p>
        
        <div class="row justify-content-around mb-5">
            <div class="col-4">
                <img src="{{asset("Images/pesta-kami-21.png")}}" alt="Pesta K.A.M.I. 2021" class="w-100" class="img-button" id="pestaKAMI21" data-content="21">
            </div>
            <div class="col-4">
                <img src="{{asset("Images/pesta-kami-22.png")}}" alt="Pesta K.A.M.I. 2022" class="w-100" class="img-button" id="pestaKAMI22" data-content="22">
            </div>
        </div>
    
        <div id="pestaKAMIContent21" class="pesta-kami-content">
            <div class="row justify-content-center mb-5">
                <div class="col-6">
                    <img src="{{asset("Images/pesta-kami-21.png")}}" alt="Pesta K.A.M.I. 2021" class="w-100">
                </div>
            </div>
            <p>Pesta K.A.M.I. ArchKL 2021 (Sambutan Hari Orang Muda) began on the18 Nov until 16 Dec 2021 with the theme of 36th World Youth Day 2021 - <span class="blue">“Stand up. I appoint you as a witness of what you have seen."</span> (cf. Acts 26:16). It was celebrated in Archdiocesan (virtual) and Parish level.</p>
        </div>
        <div id="pestaKAMIContent22" class="pesta-kami-content">
            <div class="row justify-content-center mb-5">
                <div class="col-6">
                    <img src="{{asset("Images/pesta-kami-22.png")}}" alt="Pesta K.A.M.I. 2022" class="w-100">
                </div>
            </div>
            <p>Pesta K.A.M.I. ArchKL 2022 (Sambutan Hari Orang Muda) celebrated in Parish level on the Solemnity of Christ the King (20 Nov 2022) with the theme of 37th World Youth Day - <span class="blue">“Mary arose and went with haste” (Lk 1:39)</span></p>
        </div>
    </div>
    
@stop

@section("js")
    <script>
        $(document).ready(function(){
            $(".pesta-kami-content").hide();
        })
        $("#pestaKAMI21, #pestaKAMI22").on("click",function(){
            var timeout= $("#pestaKAMI21").is(":hidden") && $("#pestaKAMI22").is(":hidden") ? 1:400; 
            $(".pesta-kami-content").hide(timeout);
            var content=$(this).attr("data-content");
            setTimeout(() => {
                $("#pestaKAMIContent"+content).show(400);
            }, timeout);
        })
    </script>
@stop

@section("css")
    <style>
        body{
            background-color:#dbf2fe !important;
        }
        nav.navbar.navbar-dark.fixed-top{
            background-color:#00447a !important;
        }
        .container{    
            color:black !important;
        }
        .container a{
            color:#f1c232 !important;
        }
        .yellow{
            color: #f1c232!important;
        }
        .blue{
            color: #00447a!important;
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
        .img-button{
            padding:0;
            border: 0px solid transparent;
            display:block;
            cursor:pointer;
        }
    </style>
@stop