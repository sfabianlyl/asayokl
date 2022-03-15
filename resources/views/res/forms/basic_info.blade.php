@include("res.forms.nationality")
@include("res.forms.name")
@include("res.forms.age")
@include("res.forms.gender")
@include("res.forms.email")
@include("res.forms.phone")
@include("res.forms.diocese")
@include("res.forms.parish-full")
@if(isset($includes))
    @foreach($includes as $include)
        @include($include)
    @endforeach
@endif
@include("res.forms.submit")