@extends("layouts.master")

@section("title", $form->title)


@php
    $fields=json_decode($form->fields,true);
    $inputs=["nationality","name","identification","year-of-birth","age","gender","email","phone","diocese","parish-full","allergy","transportation","vaccination_status","payment_terms","proof_of_payment"];
@endphp

@section("content")

<div class="mb-5">
    {!! $form->body !!}
</div>


<div class="row justify-content-center">
    <div class="col-lg-8 col-12">
        <form action="{{ route('forms.submit') }}" id="myform" method="POST">
            @csrf
             @foreach($inputs as $input)
                @if(isset($fields[$input])) @include("res.forms.$input") @endif
             @endforeach
             <input type="hidden" name="formID" value="{{$form->id}}">
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
@stop