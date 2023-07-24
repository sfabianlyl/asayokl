@extends("layouts.master")

@section("hero",asset("Images/asayokl.png"))
@section("hero-size","hero-logo")

@section("content")
    
    @include("contents.elements.instagram", ["title"=>"ArchKL Pilgrims' Updates from World Youth Day 2023", "hashtag"=>"#wydarchkl"])

    <div class="row justify-content-around my-5">
        <!-- <div class="col-lg-3 col-12 mb-5 category-nav">
            <a href="teens">
                <img src="Images/buttons_Teens.png" class="w-100">
            </a>
        </div> -->
        <div class="col-lg-3 col-12 mb-5 category-nav">
            <a href="youth-campus">
                <img src="{{asset("Images/buttons_Y_CS.png")}}" class="w-100">
            </a>
        </div>
        <div class="col-lg-3 col-12 mb-5 category-nav">
            <a href="young-adult">
                <img src="{{asset("Images/buttons_YA.png")}}" class="w-100">
            </a>
        </div>
        <div class="col-lg-3 col-12 mb-5 category-nav">
            <a href="lay-singles">
                <img src="{{asset("Images/buttons_LS.png")}}" class="w-100">
            </a>
        </div>
    </div>
@stop