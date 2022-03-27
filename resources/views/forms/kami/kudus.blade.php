@extends("layouts.master")

@section("title", "K.A.M.I. Kudus Registration")

@section("content")

    <div class="row mb-3">
        <div class="col-lg-5 col-11">
            <img src="{{asset("Images/kamikudus-poster.png")}}" alt="" class="w-100">
        </div>
    </div>
    <div class="mb-5">
        <h3 class="text-center">K.A.M.I. Kudus 2022</h3>
        <p class="text-center"><i>Join us according to your preferred language</i></p>
    </div>

    <div class="mb-5">
        <h5 class="text-center"><a href="{{route("kami.kudus.faq")}}">Click here for FAQ</a></h5>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-12">
            <form action="{{ route('kami.kudus.registration.submit') }}" id="myform" method="POST" enctype="multipart/form-data">
                @csrf

                <div id="hangout-registration-form">
                    <div class="row mb-5">
                        <div class="col-3 col-lg-4">Sesi (Session)</div>
                        <div class="col-9 col-lg-8">
                            
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        <label><input type="radio" name="language" value="BM"> BM, 30th April 2022 - 1st May 2022 </label><br>
                                        <label><input type="radio" name="language" value="Tamil"> Tamil, 14th - 15th May 2022 </label><br>
                                        <label><input type="radio" name="language" value="Mandarin"> Mandarin, 28th - 29th May 2022 </label><br>
                                        <label><input type="radio" name="language" value="English"> English, 11th - 12th June 2022 </label><br>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    @include("res.forms.identification")
                    @include("res.forms.basic_info", [
                        "includes" => [
                            "res.forms.transportation",
                            "res.forms.allergy",
                            "res.forms.vaccination_status",
                            "res.forms.health_declaration",
                            "res.forms.proof_of_payment",
                            "res.forms.payment_terms"
                        ],
                        "context" => [
                            "payment_details"=>"<p>RM65 per person (with transportation) <br>RM55 per person (own transportation)</p>"
                        ]
                    ])

                    <div class="my-5">
                        <p>Check out last year's K.A.M.I. KUDUS Prayer Conference (virtual)!</p>
                        <div class="video-container">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/videoseries?list=PL1GEZHjLaCL1n6AGarqLozYFAApa7kl1g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
            background-color:;
            color:;
        }
    </style>
@stop