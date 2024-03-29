@extends("layouts.master")

@section("title","AYPA 2019")


@section("content")
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-8 col-12">

            <!-- Finalised Statement -->
            <div class="row">
                <div class="row mb-5 justify-content-center align-items-center">
                    
                    <div class="col-6 text-right ">
                        <h3>Pernyataan AYPA 2019</h3>
                        <h5><i>AYPA 2019 Statement</i></h5>
                    </div>
                    <div class="col-lg-3 col-5">
                        <img src="{{asset("Images/aypa-logo.png")}}" class="w-100"/>
                    </div>
                </div>
                @include("res.aypa.final")
            </div>

            <!-- Download Finalised Statement -->
            <div class="row justify-content-center pad-btm-50">
                <div class="col-6 col-lg-3 mb-3">
                    <a href="{{asset("documents/AYPA_2019_STATEMENT.pdf")}}">
                        <button type="button" class="checkin-button text-center">
                            <div class="card card-download shadow">
                                <div class="card-body trans text-center px-0 py-0">
                                    <img src="{{asset("Images/pdf-logo.png")}}" class="w-100">
                                </div>
                                <div class="card-footer text-center">
                                    <span>English</span>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
                <div class="col-6 col-lg-3 mb-3">
                    <a>
                        <button type="button" class="checkin-button text-center" disabled>
                            <div class="card card-download shadow">
                                <div class="card-body trans text-center px-0 py-0">
                                    <img src="{{asset("Images/pdf-logo.png")}}" class="w-100">
                                </div>
                                <div class="card-footer text-center">
                                    <span>Translating...</span>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
                <div class="col-6 col-lg-3 mb-3">
                    <a>
                        <button type="button" class="checkin-button text-center" disabled>
                            <div class="card card-download shadow">
                                <div class="card-body trans text-center px-0 py-0">
                                    <img src="{{asset("Images/pdf-logo.png")}}" class="w-100">
                                </div>
                                <div class="card-footer text-center">
                                    <span>Translating...</span>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
                <div class="col-6 col-lg-3 mb-3">
                    <a>
                        <button type="button" class="checkin-button text-center" disabled>
                            <div class="card card-download shadow">
                                <div class="card-body trans text-center px-0 py-0">
                                    <img src="{{asset("Images/pdf-logo.png")}}" class="w-100">
                                </div>
                                <div class="card-footer text-center">
                                    <span>Translating...</span>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
            </div>

            <!-- Youtube Videos -->
            <div class="row mb-5 justify-content-center">

                <div class="col-lg-6 mb-5 col-12 text-center">
                    <h5>AYPA Day 1</h5>
                    <div class="video-container">
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/-vebenGWlkc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 col-12 text-center">
                    <h5>AYPA Day 2</h5>
                    <div class="video-container">
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/WKAj3PKF6RY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 col-12 text-center">
                    <h5>AYPA Day 3</h5>
                    <div class="video-container">
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/0GYNe3017lU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>


                <div class="col-lg-6 mb-5 col-12 text-center">
                    <h5>AYPA Recap</h5>
                    <div class="video-container">
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/lA5XBbzGCZI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <!-- Link to WATERMARKED PICTURES -->
            <div class="row mb-5 download justify-content-center">
                <div class="col-lg-6 col-10">
                    <a href="https://photos.app.goo.gl/G9cgGE4rmvq7sHPm6" target="_blank">
                        <div class="row justify-content-center align-items-center py-3 shadow rounded">
                            <div class="col-4">
                                <img src="{{asset("Images/Google Photos.png")}}" class="w-100"/>
                            </div>
                            <div class="col-7">
                                <span style="text-decoration: none !important; color:white;">Click to see pictures of AYPA 2019</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
@stop

@section("js")
    <script>
        $(".ftn").click(function($e){
            $e.preventDefault();
            var id=$(this).attr("id");
            var test=id.split("-")[0];
            var num=id.split("-")[1];
            if(test=="tn"){
                var target="#ftn-";
            }else{
                var target="#tn-";
            }
            target+=num;
            $(target)[0].scrollIntoView();
            window.scrollBy(0, -120);
        });
    </script>
@stop

@section("css")
@stop