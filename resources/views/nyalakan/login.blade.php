@extends("layouts.master")

@section("title","Nyalakan Registration")


@section("content")
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-10 col-12">

            {{-- Display the weekends as tab buttons --}}
            <ul class="nav" style="display:none !important;">
                <li class="nav-item">
                    <a class="nav-link active" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="true">Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="create-password-tab" data-toggle="tab" href="#create-password" role="tab" aria-controls="create-password" aria-selected="false">Create Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Password</a>
                </li>
            </ul>

            {{-- Display the tabs --}}
            <div class="tab-content" id="loginContent">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <div class="row mb-5">
                        <h3>Please enter the provided email:</h3>
                        <form action="{{route("nyalakan.email.check")}}" method="POST" id="emailCheck">
                            <input type="text" class="form-control mb-3" name="email" required>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                        
                    </div>                          
                </div>
                <div class="tab-pane fade" id="create-password" role="tabpanel" aria-labelledby="create-password-tab">
                    <div class="row mb-5">
                        <h3>You may create a password. Do remember it and save it!</h3>
                        <form action="{{route("nyalakan.password.create")}}" method="post" id="passwordCreate">
                            <input type="password" class="form-control mb-3" name="new_password" required>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>                          
                </div>
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <div class="row mb-5">
                        <h3>Please enter your password:</h3>
                        <form action="{{route("nyalakan.login.authenticate")}}" method="post" id="loginAuthenticate">
                            <input type="password" class="form-control mb-3" name="password" required>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>                          
                </div>
            </div>
        </div>
    </div>
@stop

@section("js")
    <script>
        toastr.options={
            "preventDuplicates":true,
            "timeOut":"3000"
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $("#emailCheck").on("submit",function(e){
                e.preventDefault();
                $("#emailCheck input").prop("readonly",true);
                $.ajax({
                    type:"POST",
                    url:$(this).attr("action"),
                    data:$(this).serialize(),
                    success:function(data){
                        if(!data.email){
                            toastr.warning("Please check your email again.");
                            $("#emailCheck input").prop("readonly",false);
                            return;
                        }
                        toastr.success("Email found!");
                        var email=$("#emailCheck input[name='email']").clone(true).css("display","none");
                        $("#createPassword, #loginAuthenticate").prepend(email);
                        if(data.first_logged_in) $("#password").tab("show");
                        else $("#create-password").tab("show");
                        
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
@stop

@section("css")
    <style>
        table { border-collapse: collapse; }
        tr { display: block; float: left; }
        th, td { display: block; border: 1px solid white; }
    </style>
@stop