<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title",setting("site.title")) | ASAYOKL</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("Images/sitelogo.ico")}}" />
    
    @include("layouts.js")
    @include("layouts.css")

    @yield("css")
    
</head>
<body>
    @include("layouts.nav")
    <div class="hero-banner">
        @hasSection("hero")
            <div class="@yield("hero-size","hero-logo")">
                <img src="@yield("hero")"/>
            </div>
        @endif
    </div>

    <div class="container">
        <div style="height:40px;" class="w-100"></div>
        @yield("content")

    </div>
    @include("layouts.footer")
      
    @if(session('modal'))
        <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">{!! session("modal") !!}</p>
                    </div>
                
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#notificationModal").modal("show");
            });
        </script>
    @endif

    @if( isset($popup))
        
        <div class="modal fade" id="popupModal" style="padding-right: 17px; display: block;">-->
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: transparent; border:none;">
                    <div class="modal-header" style="border-bottom:none;">
                        <button type="button" class="close" data-dismiss="modal" style="color:lightgrey;">×</button>
                    </div>
                    <div class="modal-body">
                         <a href=" {{ $link }} " target="_blank">
                            <img src="{!! $popup !!} " class="w-100">
                         </a>               
                    </div>
                </div>
            </div>
         </div>
        <script>
            $(document).ready(function(){
                $("#popupModal").modal("show");
            });
        </script>
    @endif
    
    @yield("js")
</body>
</html>