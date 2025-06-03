<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title",setting("site.title")) | ASAYOKL</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("Images/sitelogo.ico")}}" />
    
    
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/cooper-hewitt" type="text/css"/> 
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/toastr.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("css/myStyle.css")}}" type="text/css">
    <script src="{{asset("js/jquery-3.5.1.js")}}"></script>
    <script src="{{asset("js/toastr.min.js")}}"></script>
        
</head>
<body>
   
    <nav class="navbar navbar-dark fixed-top" style="background-color:#006837">
        <a href="#" class="navbar-brand"><img src="{{ asset("Images/asayokl-banner.png") }}" height=70 width=auto/></a>
    </nav>
    <div style="margin-top: 100px; padding: 10px;"></div>
    <div class="container pt-5">
        
        <h4 class="mb-3">Submit your questions here...</h4>
        <form action="{{route("qna.submit")}}" method="POST">
            @csrf
            <textarea name="question" rows="10" class="form-control mb-5" required></textarea>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
   @if(session('status'))
        <script>
            $(document).ready(function(){
                toastr.success("{{session('status')}}");
            });
        </script>
    @endif
</body>
</html>