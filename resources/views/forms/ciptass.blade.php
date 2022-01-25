@extends("layouts.master")

@section("title", "Hangout")


@php
    $sessionDates=[
        "Terengganu"=>[
            "17th June 2021 @ 8.00pm",
        ],
        "Cheras"=>[
            "9th October 2021 @ 8.30pm",
        ],
    ];

    $tentative=[
        "Terengganu"=>"September"
    ];
    
@endphp

@section("content")

<div class="d-flex justify-content-center">
    <div class="col-8 col-lg-6">
        <img src="Images/CIPTASS.png" alt="" class="w-100">
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-lg-8 col-12">
        <form action="{{ route('ciptass.registration.submit') }}" id="myform" method="POST">
            @csrf
            <div class="row mb-5 align-items-center">
                <div class="col-12">
                    
                    <div class="row justify-content-center align-items-center">
                        <div class="col-5 text-center">
                            <label for="Terengganu">
                                <input class="ciptass-radio" type="radio" id="Terengganu" name="location" value="Terengganu" checked>
                                <div><img src="Images/CIPTASS_Terengganu.png" class="w-100"></div>
                            </label>
                        </div>
                        <div class="col-5 text-center">
                            <label for="Cheras">
                                <input class="ciptass-radio" type="radio" id="Cheras" name="location" value="Cheras">
                                <div><img src="Images/CIPTASS_Cheras.png" class="w-100"></div>
                            </label>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div id="ciptass-disclaimer" style="display:none;">
                <h5>
                    Next Session: 
                    @foreach($tentative as $state=>$month)
                        <span id="{{$state}}Tentative" class="ciptass-tentatives" style="display:none;">{{$month}}</span>
                    @endforeach
                </h5>
                <p>Registration will open 2 weeks before confirmed date.</p>
            </div>
            <div id="ciptass-registration" style="display:none;">
                <div class="row mb-5 align-items-center">
                    
                    <div class="col-12">
                        <p>Tentatively planned sessions:</p>
                        @foreach($sessionDates as $state=>$dates)
                            <div id="{{$state}}Dates" class="ciptass-dates" style="display:none;">
                                <ol>
                                    @foreach($dates as $date) <li>{{$date}}</li> @endforeach
                                </ol>
                            </div>
                        @endforeach    
                    </div>
                </div>
                
                @include("res.forms.nationality")
                @include("res.forms.name")
                @include("res.forms.age")
                @include("res.forms.gender")
                @include("res.forms.email")
                @include("res.forms.phone")
                <div class="row mb-5 align-items-center">
                    <div class="col-4">Home state (Negeri asal)</div>
                    <div class="col-8">
                        <select class="form-control" name="homeState">
                            @include("res.options.states")
                        </select>
                        
                    </div>
                </div>
                <div class="row mb-5 align-items-center">
                    <div class="col-4">State of your University (Negeri universiti anda)</div>
                    <div class="col-8">
                        <select class="form-control" name="uniState" id="uniState">
                            @include("res.options.states")
                        </select>
                    </div>
                </div>
                <div class="row mb-5 align-items-center">
                    <div class="col-4">Name of University (Nama universiti)</div>
                    <div class="col-8">
                        <div id="TerengganuUni" class="universities">
                            <label for="umtRadio">
                                <input type="radio" name="uniName" id="umtRadio" value="University Malaysia Terengganu"> University Malaysia Terengganu
                            </label><br>
                            <label for="uniszaRadio">
                                <input type="radio" name="uniName" id="uniszaRadio" value="University Sultan Zainal Abidin"> University Sultan Zainal Abidin
                            </label><br>
                            <label for="ipgdriRadio">
                                <input type="radio" name="uniName" id="ipgdriRadio" value="Institut Pendidikan Guru Kampus Dato' Razali Ismail"> Institut Pendidikan Guru Kampus Dato' Razali Ismail
                            </label><br>
                            <label for="ucsiRadio">
                                <input type="radio" name="uniName" id="ucsiRadio" value="University College Sedaya International"> University College Sedaya International
                            </label><br>
                            <label for="uitmRadio">
                                <input type="radio" name="uniName" id="uitmRadio" value="Universiti Teknologi MARA Kampus Dungun"> Universiti Teknologi MARA Kampus Dungun
                            </label>
                        </div>
                        <div id="KelantanUni" class="universities">
                            <label for="usmhcRadio">
                                <input type="radio" name="uniName" id="usmhcRadio" value="University Sains Malaysia (USM) Health Campus"> University Sains Malaysia (USM) Health Campus
                            </label><br>
                            <label for="umkRadio">
                                <input type="radio" name="uniName" id="umkRadio" value="University Malaysia Kelantan"> University Malaysia Kelantan
                            </label><br>
                            <label for="ipgkbRadio">
                                <input type="radio" name="uniName" id="ipgkbRadio" value="Institut Pendidikan Guru Kampus Kota Bharu"> Institut Pendidikan Guru Kampus Kota Bharu
                            </label><br>
                            <label for="ipgsmRadio">
                                <input type="radio" name="uniName" id="ipgsmRadio" value="Institut Pendidikan Guru Kampus Sultan Mizan"> Institut Pendidikan Guru Kampus Sultan Mizan
                            </label><br>
                            <label for="lucRadio">
                                <input type="radio" name="uniName" id="lucRadio" value="Lincoln University College"> Lincoln University College
                            </label>
                            <label for="uitmkRadio">
                                <input type="radio" name="uniName" id="uitmkRadio" value="MARA University of Technology Kelantan"> MARA University of Technology Kelantan
                            </label>
                        </div>
                        
                        <label for="othersRadio">
                            <input type="radio" name="uniName" id="othersRadio" value=""> Others: <input type="text" id="uniOthers">
                        </label>
                    </div>
                </div>
                <div class="row mb-5 align-items-center">
                    <div class="col-4">I will be...</div>
                    <div class="col-8">
                        <label><input type="radio" name="course" value="Going back to uni" required>Going back to uni</label><br>
                        <label><input type="radio" name="course" value="Continuing with online class" required>Continuing with online class</label><br>
                        <label><input type="radio" name="course" value="Going back to uni, continuing with online class" required>Both</label>
                    </div>
                </div>
                
                <div class="row mb-5">
                    <small><i>This is a One Time Registration. Subsequent activities will be notified via email. <br>One time registration is valid for the year of registration only.</i></small>
                </div>
                @include("res.forms.submit")
            </div>
        </form>
    </div>
</div>


@stop

@section("js")
    <script>
        $("#uniOthers").on("change keydown", function(){
            $("#othersRadio").val($(this).val());
        });
        $("#uniOthers").on("focus", function(){
            $("#othersRadio").trigger("click");
        });
        $("#uniState").on("change",function(){
            $(".universities").hide("slow");
            var uni=$(this).val()+"Uni";
            $("#"+uni).show("slow");
        });
        $("#uniState").trigger("change");
        
        $(".ciptass-radio").on("change",function(){
            $(".ciptass-dates").hide("slow");
            var loc=$(this).val();
            console.log(loc);
            $("#"+loc+"Dates").show("slow");
        }).trigger("change");
        
    </script>
@stop

@section("css")
@stop