@extends("layouts.master")

@section("title", $form->title)


@php
    $fields=json_decode($form->fields,true);
    $inputs=["nationality","name","identification","year-of-birth","age","gender","email","phone","diocese","parish-full","tshirt","allergy","diet","transportation","vaccination_status","parent_info"];
@endphp

@section("content")

<div class="mb-5">
    {!! $form->body !!}
</div>


<div class="row justify-content-center">
    <div class="col-lg-8 col-12">
        <h3 class="text-center">Registration</h3>
        <form action="{{ route('forms.submit') }}" id="myform" method="POST" enctype="multipart/form-data">
            @csrf
             @foreach($inputs as $input)
                @if(isset($fields[$input])) @include("res.forms.$input", ["form"=>$form]) @endif
             @endforeach
             @if(isset($fields["payment_terms"])) @include("res.forms.payment_terms", ["form"=>$form]) @endif
             @if(isset($fields["proof_of_payment"])) 
                @include("res.forms.proof_of_payment", ["form"=>$form]) 
             @else
                @if(isset($fields["payment_details"])) 
                    @include("res.forms.payment_details", ["form"=>$form])              
                @endif
             @endif

             <input type="hidden" name="formID" value="{{$form->id}}">
             @include("res.forms.submit")
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
        @if($form->text_color)
            .container{
                color: {{$form->text_color}};
            }
        @endif
        @if($form->background_color)
            body{
                background-color:{{$form->background_color}}; 
            }
        @endif
        @if($form->link_color)
            .container a, .container a:hover{
                color: {{$form->link_color}};
            }
        @endif
        @if($form->button_color)
            #formSubmit:hover, #payment-details-button:hover {
                background: linear-gradient(to top, rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15)) {{$form->button_color}};
            }
            #formSubmit, #payment-details-button {
                background-color: {{$form->button_color}};
                border-color: rgba(0,0,0,0);
            }
        @endif
    </style>
@stop