@php
    $range=json_decode($form->age_range,true);
@endphp

<div class="row mb-5 align-items-center">
    <div class="col-4">Umur (Age)</div>
    <div class="col-8">
        @if(isset($range["18 - 21"]))<label><input type="radio" name="age" value="18 - 21" checked>18 - 21 tahun (18 - 21 years old)</label><br>@endif
        @if(isset($range["22 - 24"]))<label><input type="radio" name="age" value="22 - 24">22 - 24 tahun (22 - 24 years old)</label><br>@endif
        @if(isset($range["25 - 29"]))<label><input type="radio" name="age" value="25 - 29">25 - 29 tahun (25 - 29 years old)</label><br>@endif
        @if(isset($range["30 - 34"]))<label><input type="radio" name="age" value="30 - 34">30 - 34 tahun (30 - 34 years old)</label><br>@endif
        @if(isset($range["35 - 39"]))<label><input type="radio" name="age" value="35 - 39">35 - 39 tahun (35 - 39 years old)</label>@endif
    </div>
</div>