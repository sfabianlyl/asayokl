<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title",config("strings.title")) | ASAYOKL</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("Images/sitelogo.ico")}}" />
    
    @include("layouts.js")
    @include("layouts.css")

    @yield("css")
    
</head>
<body>
    @include("layouts.nav")

    @hasSection("hero")
        <div class="hero-banner">
            <div class="@yield("hero-size","hero-logo hero-logo-full")">
                <img src="@yield("hero")"/>
            </div>
        </div>
    @endif


    <div class="container">
        <div style="height:40px;" class="w-100"></div>
        @yield("content")

    </div>  

    @include("layouts.footer")
    
    @yield("js")
</html>