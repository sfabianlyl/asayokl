@extends("layouts.master")

@section("title", "Hangout")


@php
    $sessionDates=[
        "KL"=>[
            "Study Day (Online) - Tuesdays, 8.30pm"=>[
                "12th January 2021",
                "9th March 2021",
                "11th May 2021",
                "13th July 2021",
                "14th September 2021",
                "9th November 2021"
            ],
            "Prayer Day (Online) - Tuesdays, 8.30pm"=>[
                "9th February 2021",
                "15th June 2021",
                "12th October 2021"
            ],
            "Family Day - Saturdays, 12.00pm"=>[
                "17th April 2021",
                "14th August 2021",
                "4th December 2021"
            ]
        ],
        
    ];

    $nextSessions=[
        "KL"=>"Jan 2022"
    ]
    
@endphp

@section("content")

<div class="mb-5">
    <h3 class="text-center">Catholic Young Adult Network</h3>
    <p class="text-center"><i>Join us according to your location convenience.</i></p>
</div>


<div class="row justify-content-center">
    <div class="col-lg-8 col-12">
        <form action="{{ route('cyan.registration.submit') }}" id="myform" method="POST">
            @csrf
            <div class="row mb-5 align-items-center">
                <div class="col-12">
                    
                    <div class="row justify-content-center align-items-center">
                        <div class="col-5 text-center">
                            <label for="KL">
                                <input class="hangout-radio" type="radio" id="KL" name="location" value="KL" required checked>
                                <div><img src="Images/ArchKL OYP_YANKL.png" class="w-100"></div>
                            </label>
                        </div>
                        <div class="col-5 text-center">
                            <h4>Coming Soon...</h4>
                        </div> 
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-5 text-center">
                            <h4>Coming Soon...</h4>
                        </div>
                        <div class="col-5 text-center">
                            <h4>Coming Soon...</h4>
                        </div> 
                    </div>
                    
                    
                </div>
            </div>
            <div class="row mb-5 align-items-center">
                <div class="col-12">
                    <p>Tentatively planned sessions:</p>
                    @foreach($nextSessions as $network=>$month)
                        <div id="<?=$network."Dates"?>" class="program-dates">
                            <h5>Next Session: <?=$month?></h5>
                        </div>
                    @endforeach    
                    @foreach($sessionDates as $network=>$details)
                        <div id="<?=$network."Dates"?>" class="program-dates">
                            @foreach($details as $type=>$dates)
                                <h6><?=$type?></h6>
                                    <ol>
                                        @foreach($dates as $date) <li><?=$date?></li> @endforeach
                                    </ol>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                @include("res.forms.nationality")
                @include("res.forms.name")
                @include("res.forms.year-of-birth")
                @include("res.forms.gender")
                @include("res.forms.email")
                @include("res.forms.phone")

                <div class="row mb-5 align-items-center">
                    <div class="col-4">Top 3 Frequent Parishes For Mass</div>
                    <div class="col-8">
                        <input type="text" name="parishes" class="form-control" placeholder="Put in at least 1 parish, seperate by comma." required>
                    </div>
                </div>
                <div class="row mb-5 align-items-center">
                    <div class="col-4">Tell us something interesting about yourself</div>
                    <div class="col-8">
                        <input type="text" name="talents" class="form-control" placeholder="" required>
                    </div>
                </div>

                @include("res.forms.submit")
            </div>
        </form>
    </div>
</div>


@stop

@section("js")
    
@stop

@section("css")
@stop